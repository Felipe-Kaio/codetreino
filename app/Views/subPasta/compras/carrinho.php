  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="<?= base_url('css/carrinho.css') ?>">
      <title>Sustainfy - Carrinho de Compras</title>

      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  </head>

  <body>

      <div class="promo-banner">
          <p>🌱 Frete grátis em compras acima de R$ 150 | Use o cupom ECO10 para 10% de desconto</p>
      </div>

      <nav class="navbar">
          <a class="logo">Sustainfy</a>

          <ul class="nav-links">
              <li><a href="<?= base_url('main/loja') ?>">Início</a></li>
              <li><a href="<?= base_url('main/tlsbmais') ?>">Sobre</a></li>
              <li><a href="<?= base_url('main/tlnoticias') ?>">Blog</a></li>
          </ul>

          <div class="nav-icons">
              <a href="<?= base_url('main/carrinho') ?>"><i class="fas fa-shopping-bag"></i></a>
          </div>
      </nav>

      <!-- Conteúdo do Carrinho -->
      <div class="cart-container">
          <div class="cart-header">
              <h1>Seu Carrinho</h1>
              <p>Revise seus itens antes de finalizar a compra</p>
          </div>


  </body>

  </html>