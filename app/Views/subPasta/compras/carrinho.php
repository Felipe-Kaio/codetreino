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
      <!-- Banner Promocional -->
      <div class="promo-banner">
          <p>🌱 Frete grátis em compras acima de R$ 150 | Use o cupom ECO10 para 10% de desconto</p>
      </div>

      <!-- Navbar Premium -->
      <nav class="navbar">
          <a class="logo">Sustainfy</a>

          <ul class="nav-links">
              <li><a href="#categories">Categorias</a></li>
              <li><a href="#products">Produtos</a></li>
              <li><a href="<?php base_url('main/tlsbmais') ?>">Sobre</a></li>
              <li><a href="<?php base_url('main/noticias') ?>">Blog</a></li>
          </ul>

          <div class="nav-icons">
              <a href="carrinho.php"><i class="fas fa-shopping-bag"></i></a>
          </div>
      </nav>

      <!-- Conteúdo do Carrinho -->
      <div class="cart-container">
          <div class="cart-header">
              <h1>Seu Carrinho</h1>
              <p>Revise seus itens antes de finalizar a compra</p>
          </div>

          <?php if (isset($_SESSION['erro_compra'])): ?>
              <div class="erro-login" style="color: red; text-align: center; margin-top: 10px;">
                  <p><?php echo $_SESSION['erro_compra'];
                        unset($_SESSION['erro_compra']); ?></p>
              </div>
          <?php endif; ?>

          <div class="cart-content">
              <div class="cart-items">
                  <?php
                    $produtos = obterProdutosCarrinho();
                    $subtotal = 0;

                    if (!empty($produtos)):
                        foreach ($produtos as $produto):
                            $item_total = $produto['preco'] * $produto['quantidade'];
                            $subtotal += $item_total;
                    ?>
                          <div class="cart-item">
                              <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>" class="cart-item-img">
                              <div class="cart-item-details">
                                  <h3 class="cart-item-title"><?php echo htmlspecialchars($produto['nome']); ?></h3>
                                  <span class="cart-item-category"><?php echo htmlspecialchars($produto['categoria']); ?></span>
                                  <div class="cart-item-price">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></div>
                                  <div class="cart-item-actions">
                                      <form method="post" action="atualizar_carrinho.php" class="quantity-form">
                                          <input type="hidden" name="produto_id" value="<?php echo $produto['id']; ?>">
                                          <div class="quantity-control">
                                              <button type="button" class="quantity-btn minus">-</button>
                                              <input type="number" name="quantidade" value="<?php echo $produto['quantidade']; ?>" min="1" class="quantity-input">
                                              <button type="button" class="quantity-btn plus">+</button>
                                          </div>
                                          <button type="submit" class="update-btn">Atualizar</button>
                                      </form>
                                      <a href="remover_carrinho.php?id=<?php echo $produto['id']; ?>" class="remove-btn">
                                          <i class="fas fa-trash-alt"></i> Remover
                                      </a>
                                  </div>
                              </div>
                          </div>
                      <?php endforeach; ?>
                  <?php else: ?>
                      <div class="empty-cart">
                          <i class="fas fa-shopping-bag"></i>
                          <h2>Seu carrinho está vazio</h2>
                          <p>Parece que você ainda não adicionou nenhum item ao seu carrinho</p>
                          <a href="loja.php" class="empty-cart-btn">Continuar comprando</a>
                      </div>
                  <?php endif; ?>
              </div>

              <?php if (!empty($produtos)): ?>
                  <div class="cart-summary">
                      <h3 class="summary-title">Resumo do Pedido</h3>

                      <div class="summary-row">
                          <span>Subtotal</span>
                          <span>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></span>
                      </div>

                      <div class="summary-row">
                          <span>Frete</span>
                          <span>Grátis</span>
                      </div>

                      <?php
                        $desconto = 0;
                        if (isset($_SESSION['cupom']) && $_SESSION['cupom'] === 'ECO10') {
                            $desconto = $subtotal * 0.1;
                            echo '<div class="summary-row">';
                            echo '<span>Desconto (ECO10)</span>';
                            echo '<span>-R$ ' . number_format($desconto, 2, ',', '.') . '</span>';
                            echo '</div>';
                        }
                        ?>

                      <div class="summary-row summary-total">
                          <span>Total</span>
                          <span>R$ <?php echo number_format($subtotal - $desconto, 2, ',', '.'); ?></span>
                      </div>

                      <form method="post" action="aplicar_cupom.php" class="cupom-form">
                          <input type="text" name="cupom" placeholder="Código do cupom" class="cupom-input">
                          <button type="submit" class="cupom-btn">Aplicar</button>
                      </form>

                      <form method="post" action="finalizar_compra.php">
                          <button type="submit" class="checkout-btn">
                              Finalizar Compra
                              <i class="fas fa-arrow-right"></i>
                          </button>
                      </form>

                      <a href="loja.php" class="continue-shopping">
                          <i class="fas fa-chevron-left"></i> Continuar comprando
                      </a>
                  </div>
              <?php endif; ?>
          </div>
      </div>

      <script>
          // Funcionalidade dos botões de quantidade
          document.querySelectorAll('.quantity-btn').forEach(button => {
              button.addEventListener('click', function() {
                  const form = this.closest('.quantity-form');
                  const input = form.querySelector('.quantity-input');
                  let value = parseInt(input.value);

                  if (this.classList.contains('minus') && value > 1) {
                      input.value = value - 1;
                  } else if (this.classList.contains('plus')) {
                      input.value = value + 1;
                  }
              });
          });

          // Funcionalidade do botão remover
          document.querySelectorAll('.remove-btn').forEach(button => {
              button.addEventListener('click', function(e) {
                  if (!confirm('Tem certeza que deseja remover este item do carrinho?')) {
                      e.preventDefault();
                  }
              });
          });
      </script>
      <script>
          // Script para atualizar quantidades
          document.querySelectorAll('.quantity-btn').forEach(button => {
              button.addEventListener('click', function() {
                  const form = this.closest('form');
                  const input = form.querySelector('.quantity-input');
                  let value = parseInt(input.value);

                  if (this.classList.contains('minus') && value > 1) {
                      input.value = value - 1;
                  } else if (this.classList.contains('plus')) {
                      input.value = value + 1;
                  }

                  // Enviar formulário automaticamente
                  form.submit();
              });
          });
      </script>
  </body>

  </html>