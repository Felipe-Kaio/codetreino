<?php
include_once("code/conexao.php");
function adicionarAoCarrinho($produto_id, $quantidade = 1)
{
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    if (isset($_SESSION['carrinho'][$produto_id])) {
        $_SESSION['carrinho'][$produto_id] += $quantidade;
    } else {
        $_SESSION['carrinho'][$produto_id] = $quantidade;
    }
}

// Função para remover produto do carrinho
function removerDoCarrinho($produto_id)
{
    if (isset($_SESSION['carrinho'][$produto_id])) {
        unset($_SESSION['carrinho'][$produto_id]);
    }
}

// Função para atualizar quantidade no carrinho
function atualizarQuantidade($produto_id, $quantidade)
{
    if (isset($_SESSION['carrinho'][$produto_id]) && $quantidade > 0) {
        $_SESSION['carrinho'][$produto_id] = $quantidade;
    }
}

// Função para obter produtos do carrinho
function obterProdutosCarrinho()
{
    $produtos = [];

    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        include_once("code/conexao.php");
        global $conexao;

        $ids = array_keys($_SESSION['carrinho']);
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $tipos = str_repeat('i', count($ids));

        $stmt = $conexao->prepare("SELECT * FROM produtos WHERE id IN ($placeholders)");
        $stmt->bind_param($tipos, ...$ids);
        $stmt->execute();
        $resultado = $stmt->get_result();

        while ($produto = $resultado->fetch_assoc()) {
            $produto['quantidade'] = $_SESSION['carrinho'][$produto['id']];
            $produtos[] = $produto;
        }
    }

    return $produtos;
}

// Função para finalizar a compra
function finalizarCompra($usuario_id)
{
    include_once("code/conexao.php");
    global $conexao;

    if (empty($_SESSION['carrinho'])) {
        return false;
    }

    $produtos = obterProdutosCarrinho();
    $subtotal = 0;

    foreach ($produtos as $produto) {
        $subtotal += $produto['preco'] * $produto['quantidade'];
    }

    $desconto = 0;
    if (isset($_SESSION['cupom']) && $_SESSION['cupom'] === 'ECO10') {
        $desconto = $subtotal * 0.1;
    }
    $total_final = $subtotal - $desconto;

    $conexao->begin_transaction();

    try {
        // Cria o pedido
        $stmt = $conexao->prepare("INSERT INTO pedidos (usuario_id, data_pedido, total, desconto) VALUES (?, NOW(), ?, ?)");
        $stmt->bind_param("idd", $usuario_id, $total_final, $desconto);
        $stmt->execute();
        $pedido_id = $conexao->insert_id;

        // Adiciona itens do pedido
        foreach ($produtos as $produto) {
            $stmt = $conexao->prepare("INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, preco_unitario) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiid", $pedido_id, $produto['id'], $produto['quantidade'], $produto['preco']);
            $stmt->execute();
        }

        // Limpa carrinho
        unset($_SESSION['carrinho']);
        unset($_SESSION['cupom']);

        $conexao->commit();
        return $pedido_id;
    } catch (Exception $e) {
        $conexao->rollback();
        return false;
    }
}
