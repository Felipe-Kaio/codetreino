<?php

namespace App\Controllers;

use App\Models\ProdutoModel;

class Autenticar extends BaseController
{
    public function Adicionar_Carrinho()
    {
        $session = session();
        $produtoModel = new ProdutoModel();
        $produto = $produtoModel->find($this->request->getPost('id'));

        if (!$produto) {
            session()->setFlashData('tipo', 'bg-danger');
            session()->setFlashData('mensagem', 'Produto não encontrado!');
            return redirect()->to(base_url());
        }

        $carrinho = $session->get('carrinho') ?? [];

        if (isset($carrinho[$produto['id']])) {
            $carrinho[$produto['id']]['quantidade'] += 1;
        } else {
            $carrinho[$produto['id']] = [
                'id' => $produto['id'],
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'quantidade' => 1
            ];
        }

        $session->set('carrinho', $carrinho);

        session()->setFlashData('tipo', 'bg-success');
        session()->setFlashData('mensagem', 'Produto adicionado ao carrinho com sucesso!');
        return redirect()->to(base_url('main/loja'));
    }

    public function Visualizar_Carrinho()
    {
        $session = session();
        $carrinho = $session->get('carrinho') ?? [];
        return view('Vizualizar_Carrinho', ['carrinho' => $carrinho]);
        session()->setFlashData('tipo', 'bg-success');
        session()->setFlashData('mensagem', 'Carrinho visualizado com sucesso!');
        return redirect()->to(base_url('main/loja'));
    }

    public function Remover_Carrinho($productId)
    {
        $session = session();
        $produtoModel = new ProdutoModel();
        $produto = $produtoModel->find($this->request->getPost('id'));
        $carrinho = $session->get('carrinho') ?? [];

        if (isset($carrinho[$produto['id']])) {
            unset($carrinho[$produto['id']]);
            $session->set('carrinho', $carrinho);
            session()->setFlashData('tipo', 'bg-success');
            session()->setFlashData('mensagem', 'Produto removido do carrinho com sucesso!');
            return redirect()->to(base_url('main/loja'));
        }
    }

    public function Limpa_Carrinho()
    {
        session()->remove('carrinho');
        session()->setFlashData('tipo', 'bg-success');
        session()->setFlashData('mensagem', 'Carrinho limpo com sucesso!');
        return redirect()->to(base_url('main/loja'));
    }
}
