<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/loja.css') ?>">
    <title>Sustainfy - Compra realizada</title>

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

        <div class="nav-icons">
            <a href="carrinho.php"><i class="fas fa-shopping-bag"></i></a>
        </div>
    </nav>

    <!-- Conteúdo de Sucesso -->
    <div class="cart-container">
        <div class="cart-header">
            <h1>Compra realizada com sucesso!</h1>
            <p>Obrigado por escolher a Sustainfy</p>
        </div>

        <div class="cart-content" style="justify-content: center;">
            <div class="success-message" style="text-align: center; max-width: 600px; padding: 2rem;">
                <div class="success-icon" style="font-size: 5rem; color: #4CAF50; margin-bottom: 1.5rem;">
                    <i class="fas fa-check-circle"></i>
                </div>

                <?php if (isset($_SESSION['sucesso_compra'])): ?>
                    <p style="font-size: 1.1rem; margin-bottom: 1.5rem;"><?php echo $_SESSION['sucesso_compra'];
                                                                            unset($_SESSION['sucesso_compra']); ?></p>
                <?php else: ?>
                    <p style="font-size: 1.1rem; margin-bottom: 1.5rem;">Sua compra foi processada com sucesso!</p>
                <?php endif; ?>

                <p style="margin-bottom: 2rem;">Você receberá um e-mail com os detalhes do seu pedido em breve.</p>

                <div class="success-actions" style="display: flex; gap: 1rem; justify-content: center;">
                    <a href="loja.php" class="checkout-btn" style="background-color: #4CAF50;">
                        <i class="fas fa-shopping-bag"></i> Continuar comprando
                    </a>
                    <a href="index.php" class="checkout-btn" style="background-color: #2196F3;">
                        <i class="fas fa-home"></i> Página inicial
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Mantendo o mesmo estilo do carrinho -->
    <style>
        .success-message {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .success-icon i {
            animation: scaleIn 0.5s ease-out;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</body>

</html>