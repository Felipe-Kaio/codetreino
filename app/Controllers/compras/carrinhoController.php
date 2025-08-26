<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class CarrinhoController extends BaseController
{
    // Adiciona produto ao carrinho
    public function adicionarCarrinho($produto_id, $quantidade = 1)
    {
        $session = session();
        $carrinho = $session->get('carrinho') ?? [];

        if (isset($session[$produto_id])) {
            $carrinho[$produto_id] += $quantidade;
        } else {
            $carrinho[$produto_id] = $quantidade;
        }

        $session->set('carrinho', $carrinho);
    }

    // Remove produto
    public function removerCarrinho($produto_id)
    {
        $session = session();
        $carrinho = $session->get('carrinho') ?? [];

        if (isset($carrinho[$produto_id])) {
            unset($carrinho[$produto_id]);
        }

        $session->set('carrinho', $carrinho);
    }

    // Atualiza quantidade
    public function atualizarQuantidade($produto_id, $quantidade)
    {
        $session = session();
        $carrinho = $session->get('carrinho') ?? [];

        if ($quantidade > 0) {
            $carrinho[$produto_id] = $quantidade;
        } else {
            unset($carrinho[$produto_id]);
        }

        $session->set('carrinho', $carrinho);
    }

    // Obter produtos do carrinho
    public function obterProdutosCarrinho()
    {
        $session = session();
        $carrinho = $session->get('carrinho') ?? [];
        $produtos = [];

        if (!empty($carrinho)) {
            $db = Database::connect();
            $builder = $db->table('produtos');
            $builder->whereIn('id', array_keys($carrinho));
            $query = $builder->get();

            foreach ($query->getResultArray() as $produto) {
                $produto['quantidade'] = $carrinho[$produto['id']];
                $produtos[] = $produto;
            }
        }

        return $produtos;
    }

    // Finalizar compra no banco
    public function finalizarCompraInterna($usuario_id)
    {
        $session = session();
        $db = Database::connect();
        $carrinho = $session->get('carrinho');

        if (empty($carrinho)) return false;

        $produtos = $this->obterProdutosCarrinho();
        $subtotal = array_reduce($produtos, fn($total, $p) => $total + $p['preco'] * $p['quantidade'], 0);

        $desconto = 0;
        if ($session->get('cupom') === 'ECO10') {
            $desconto = $subtotal * 0.1;
        }

        $totalFinal = $subtotal - $desconto;

        $db->transStart();

        try {
            $db->query("INSERT INTO pedidos (usuario_id, data_pedido, total, desconto) VALUES (?, NOW(), ?, ?)", [
                $usuario_id,
                $totalFinal,
                $desconto
            ]);

            $pedido_id = $db->insertID();

            foreach ($produtos as $produto) {
                $db->query("INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, preco_unitario) VALUES (?, ?, ?, ?)", [
                    $pedido_id,
                    $produto['id'],
                    $produto['quantidade'],
                    $produto['preco']
                ]);
            }

            $db->transComplete();

            if (!$db->transStatus()) {
                throw new \Exception('Erro na transação');
            }

            $session->remove('carrinho');
            $session->remove('cupom');

            return $pedido_id;

        } catch (\Exception $e) {
            $db->transRollback();
            return false;
        }
    }

    // Ações públicas para rotas

    public function postAdicionarCarrinho()
    {
        $produto_id = intval($_POST['produto_id'] ?? 0);
        $quantidade = intval($_POST['quantidade'] ?? 1);

        if ($produto_id > 0 && $quantidade > 0) {
            $this->adicionarCarrinho($produto_id, $quantidade);
        }

        return redirect()->to('/main/loja');
    }

    public function getRemoverCarrinho()
    {
        $produto_id = intval($_GET['id'] ?? 0);
        if ($produto_id > 0) {
            $this->removerCarrinho($produto_id);
        }

        return redirect()->to('/main/carrinho');
    }

    public function postAtualizarCarrinho()
    {
        $produto_id = intval($_POST['produto_id'] ?? 0);
        $quantidade = intval($_POST['quantidade'] ?? 0);

        if ($produto_id > 0) {
            $this->atualizarQuantidade($produto_id, $quantidade);
        }

        return redirect()->to('/main/carrinho');
    }

    public function postAplicarCupom()
    {
        $session = session();
        $cupom = strtoupper(trim($_POST['cupom'] ?? ''));

        if ($cupom === 'ECO10') {
            $session->set('cupom', 'ECO10');
            $session->setFlashdata('mensagem_cupom', 'Cupom aplicado com sucesso! 10% de desconto.');
        } else {
            $session->setFlashdata('erro_cupom', 'Cupom inválido ou expirado.');
        }

        return redirect()->to('/main/carrinho');
    }

    public function finalizarCompra()
    {
        $session = session();

        if (!$session->has('email')) {
            $session->setFlashdata('erro_compra', 'Faça login para finalizar a compra.');
            return redirect()->to('/main/login');
        }

        $email = $session->get('email');
        $db = Database::connect();
        $usuario = $db->query("SELECT id FROM usuarios WHERE email = ?", [$email])->getRowArray();

        if ($usuario) {
            $pedido_id = $this->finalizarCompraInterna($usuario['id']);

            if ($pedido_id) {
                $session->setFlashdata('sucesso_compra', "Compra finalizada com sucesso! Pedido #$pedido_id");
                return redirect()->to('/main/sucesso_compra');
            }
        }

        $session->setFlashdata('erro_compra', 'Erro ao finalizar a compra. Tente novamente.');
        return redirect()->to('/main/carrinho');
    }
}
