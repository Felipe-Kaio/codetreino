<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function adicionar_carrinho()
    {
        session_start();
        include_once('code/conexao.php');
        include_once('code/carrinho_functions.php');

        if (isset($_POST['produto_id'])) {
            $produto_id = intval($_POST['produto_id']);
            $quantidade = isset($_POST['quantidade']) ? intval($_POST['quantidade']) : 1;

            if ($quantidade > 0) {
                adicionarAoCarrinho($produto_id, $quantidade);
            }
        }

        // Redirecionar de volta
        header("Location: " . ($_SERVER['HTTP_REFERER'] ?? 'loja.php'));
        exit();
    }

    public function remover_carrinho()
    {
        session_start();
        include_once("code/carrinho_functions.php");

        if (isset($_GET['id'])) {
            $produto_id = intval($_GET['id']);
            removerDoCarrinho($produto_id);
        }

        header("Location: carrinho.php");
        exit();
    }

    public function atualizar_carrinho()
    {
        session_start();
        include_once("code/carrinho_functions.php");

        if (isset($_POST['produto_id']) && isset($_POST['quantidade'])) {
            $produto_id = intval($_POST['produto_id']);
            $quantidade = intval($_POST['quantidade']);

            if ($quantidade > 0) {
                atualizarQuantidade($produto_id, $quantidade);
            } else {
                removerDoCarrinho($produto_id);
            }
        }

        header("Location: carrinho.php");
        exit();
    }
}
