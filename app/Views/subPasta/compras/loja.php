<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Css -->
    <link rel="stylesheet" href="<?= base_url('css/loja.css') ?>">


    <title>Sustainfy - Estilo de Vida Sustentável</title>


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!--------------------------------------- Banner Promorcional ------------------------------------>
    <div class="promo-banner">
        <p>🌱 Frete grátis em compras acima de R$ 150 | Use o cupom ECO10 para 10% de desconto</p>
    </div>

    <!--------------------------------------- NavBar  ------------------------------------>
    <nav class="navbar">
        <a class="logo">

            Sustainfy
        </a>

        <ul class="nav-links">
            <li><a href="#categories">Categorias</a></li>
            <li><a href="#products">Produtos</a></li>
            <li><a href="<?= base_url('main/tlsbmais') ?>">Sobre</a></li>
            <li><a href="<?= base_url('main/tlnoticias') ?>">Blog</a></li>
        </ul>

        <div class="nav-icons">
            <a href="<?= base_url('main/carrinho') ?>"><i class="fas fa-shopping-bag"></i></a>
        </div>
    </nav>

    <!--------------------------------------- Seção do topo ------------------------------------>
    <section class="hero">
        <div class="hero-content">
            <h1>Viva em Harmonia com a Natureza</h1>
            <p>Descubra produtos sustentáveis que transformam seu dia a dia sem comprometer o futuro do planeta. Qualidade premium com responsabilidade ambiental.</p>
            <button class="hero-btn">
                Explorar Coleção
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </section>

    <!--------------------------------------- Seção de categorias ------------------------------------>
    <section id="categories" class="categories">
        <div class="section-header">
            <h2 class="section-title">Nossas Categorias</h2>
            <p class="section-subtitle">Explore nossas linhas de produtos cuidadosamente selecionados para um estilo de vida sustentável</p>
        </div>

        <div class="categories-grid">
            <div class="category-card">
                <img src="https://www.aarquiteta.com.br/blog/wp-content/uploads/2019/01/casa-autossuficiente-a-arquiteta-8.jpg" alt="Casa Sustentável" class="category-img">
                <div class="category-overlay">
                    <h3 class="category-title">Casa Sustentável</h3>
                    <a href="#" class="category-link">
                        Ver produtos
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="category-card">
                <img src="https://lucianagarbelini.com.br/wp-content/uploads/2021/07/belezanatural.jpg" alt="Beleza Natural" class="category-img">
                <div class="category-overlay">
                    <h3 class="category-title">Beleza Natural</h3>
                    <a href="#" class="category-link">
                        Ver produtos
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="category-card">
                <img src="https://admin.cnnbrasil.com.br/wp-content/uploads/sites/12/2023/03/qual-o-conceito-de-moda-sustentavel.jpg?w=1200&h=675&crop=1" alt="Moda Consciente" class="category-img">
                <div class="category-overlay">
                    <h3 class="category-title">Moda Consciente</h3>
                    <a href="#" class="category-link">
                        Ver produtos
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="category-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQIaNhOOSH_j56f5BkBZ_-pocdoHu43fdU-A&s" alt="Cuidados Pessoais" class="category-img">
                <div class="category-overlay">
                    <h3 class="category-title">Cuidados Pessoais</h3>
                    <a href="#" class="category-link">
                        Ver produtos
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--------------------------------------- Seção de produtos ------------------------------------>
    <section id="products" class="products">
        <div class="section-header">
            <h2 class="section-title">Nossos Produtos</h2>
            <p class="section-subtitle">Seleção premium de produtos ecológicos que fazem a diferença</p>
        </div>

        <div class="products-grid">

            <!--------------------------------------- Produtos ------------------------------------>
            <?php foreach ($produtos as $produto) : ?>
                <form action="<?= base_url('main/Adicionar_Carrinho') ?>" method="POST">

                    <div class="product-card" data-id="<?= $produto['id'] ?>">
                        <span class="product-badge">Novidade</span>
                        <img src="><?= esc($produto['imagem']) ?>" alt="><?= esc($produto['nome']) ?>" class="product-img">
                        <div class="product-info">
                            <span class="product-category"><?= esc($produto['categoria']) ?></span>
                            <h3 class="product-title"><?= esc($produto['nome']) ?></h3>
                            <p class="product-description"><?= esc($produto['descricao']) ?></p>
                            <div class="product-footer">
                                <span class="product-price"><strong>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></strong></span>
                                <button class="add-to-cart">
                                    <i class="fas fa-shopping-cart"></i>
                                    Adicionar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </section>


    <!--------------------------------------- Rodapé ------------------------------------>
    <footer>
        <div class="footer-grid">
            <div class="footer-column footer-about">
                <h3>Sobre a Sustainfy</h3>
                <p>Nossa missão é oferecer produtos que unam design, qualidade e sustentabilidade, provando que é possível consumir com consciência sem abrir mão do estilo e conforto.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer-column">
                <h3>Links Úteis</h3>
                <ul class="footer-links">
                    <li><a href="#">Nossa História</a></li>
                    <li><a href="#">Política de Sustentabilidade</a></li>
                    <li><a href="#">Trabalhe Conosco</a></li>
                    <li><a href="#">Fornecedores</a></li>
                    <li><a href="#">Impacto Ambiental</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Ajuda</h3>
                <ul class="footer-links">
                    <li><a href="#">Central de Ajuda</a></li>
                    <li><a href="#">Política de Entrega</a></li>
                    <li><a href="#">Trocas e Devoluções</a></li>
                    <li><a href="#">Pagamentos</a></li>
                    <li><a href="#">Dúvidas Frequentes</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Contato</h3>
                <ul class="footer-links">
                    <li><a href="mailto:contato@ecoharmony.com">Sustainfy@gmail.com</a></li>
                    <li><a href="tel:+5511999999999">(85) 99259-1642</a></li>
                    <li>Av. Sustentável, 123 - São Gonçalo do Amarante</li>
                    <li>Segunda a Sexta, 9h às 18h</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2025 Sustainfy. Todos os direitos reservados. </p>
        </div>
    </footer>


    <!--------------------------------------- Adicionar ao carrinho ------------------------------------>
     <script>
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productCard = this.closest('.product-card');
                const productId = productCard.dataset.id;

                fetch('<?= base_url('carrinhoController/Adicionar_Carrinho') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `produto_id=${productId}&quantidade=1`
                    })
                    .then(response => {
                        // Feedback visual
                        const cartIcon = document.querySelector('.fa-shopping-bag');
                        if (cartIcon) {
                            cartIcon.classList.add('animate-bounce');
                            setTimeout(() => cartIcon.classList.remove('animate-bounce'), 1000);
                        }
                        alert(data.mensagem || 'Produto adicionado ao carrinho!');
                    })
                    .catch(error => {
                        alert(error.message);
                    });
            });
        });
    </script>

    <!--------------------------------------- Toast no canto superior esquerdo ------------------------------------>
    <div class="position-fixed top-0 start-0 p-3" style="z-index: 11" data-bs-delay="10000">
        <div id="liveToast" class="toast align-items-center text-white border-0  <?= session()->getFlashdata('tipo') ?>" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?= session()->getFlashdata('mensagem') ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Fechar"></button>
            </div>
        </div>
    </div>

    <!--------------------------------------- Bootstrap com js ------------------------------------>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastEl = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastEl);

            <?php if (session()->getFlashdata('mensagem')) : ?>
                toast.show();
            <?php endif ?>
        });
    </script>
</body>

</html>