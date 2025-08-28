<?php

namespace App\Controllers;

use App\Models\ProdutoModel;

class Carrinho extends BaseController
{
    public function index()
    {
        $model = new ProdutoModel();
        $dados['produtos'] = $model->findAll();

        return view('produtos', $dados);
    }

    public function adicionarAoCarrinho()
    {
        $produtoId = $this->request->getPost('produto_id');
        $model = new ProdutoModel();
        $produto = $model->find($produtoId);

        if ($produto) {
            $carrinho = session()->get('carrinho') ?? [];

            if (isset($carrinho[$produtoId])) {
                $carrinho[$produtoId]['quantidade'] += 1;
            } else {
                $carrinho[$produtoId] = [
                    'id' => $produto['id'],
                    'nome' => $produto['nome'],
                    'preco' => $produto['preco'],
                    'quantidade' => 1
                ];
            }

            session()->set('carrinho', $carrinho);
            return redirect()->back()->with('mensagem', 'Produto adicionado!');
        }

        return redirect()->back()->with('mensagem', 'Produto não encontrado.');
    }

    public function carrinho()
    {
        $dados['carrinho'] = session()->get('carrinho') ?? [];
        return view('carrinho', $dados);
    }

    public function alterarQuantidade($id, $acao)
    {
        $carrinho = session()->get('carrinho') ?? [];

        if (isset($carrinho[$id])) {
            if ($acao == 'mais') {
                $carrinho[$id]['quantidade']++;
            } elseif ($acao == 'menos' && $carrinho[$id]['quantidade'] > 1) {
                $carrinho[$id]['quantidade']--;
            }
        }

        session()->set('carrinho', $carrinho);
        return redirect()->to('/loja/carrinho');
    }

    public function remover($id)
    {
        $carrinho = session()->get('carrinho') ?? [];
        unset($carrinho[$id]);
        session()->set('carrinho', $carrinho);
        return redirect()->to('/loja/carrinho');
    }

    public function finalizarCompra()
    {
        session()->remove('carrinho');
        return redirect()->to('/loja/carrinho')->with('mensagem', 'Compra finalizada com sucesso!');
    }
}
