<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/homePage.css') ?>">
    <title>Sustainfy - Conectando você à natureza</title>

</head>

<body>
    <section class="hero">
        <h1>Bem-vindo ao Sustainfy</h1>
        <p>Conecte-se com a natureza e descubra a beleza da vida selvagem e das plantas que tornam nosso planeta especial.</p>
        <div class="scroll-down" onclick="document.querySelector('.nature-section').scrollIntoView({ behavior: 'smooth' })">
            ↓
        </div>
    </section>

    <section class="nature-section">
        <h2 class="section-title">Explore a Biodiversidade</h2>

        <div class="gallery">
            <div class="gallery-item">
                <img src="https://123ecos.com.br/wp-content/uploads/2024/09/floresta-tropical.jpg" alt="Florestas tropical">
                <div class="caption">
                    <h3>Florestas Tropicais</h3>
                    <p>Descubra os ecossistemas mais diversos do planeta, lar de inúmeras espécies de plantas e animais.</p>
                </div>
            </div>

            <div class="gallery-item">
                <img src="https://wallpapers.com/images/hd/wild-animals-background-ls56lyecnkxqqyzz.jpg" alt="Animais selvagens">
                <div class="caption">
                    <h3>Vida Animal</h3>
                    <p>Conheça as incríveis criaturas que compartilham nosso mundo, desde os menores insetos até os maiores mamíferos.</p>
                </div>
            </div>

            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Plantas exóticas">
                <div class="caption">
                    <h3>Plantas Exóticas</h3>
                    <p>Explore a incrível variedade de plantas que purificam nosso ar e embelezam nosso ambiente.</p>
                </div>
            </div>
        </div>

        <div class="gallery">
            <div class="gallery-item">
                <img src="https://www.infoescola.com/wp-content/uploads/2016/09/ecossistema-marinho-211006552.jpg" alt="Oceanos">
                <div class="caption">
                    <h3>Ecossistemas Aquáticos</h3>
                    <p>Mergulhe na beleza dos oceanos, rios e lagos que cobrem a maior parte do nosso planeta.</p>
                </div>
            </div>

            <div class="gallery-item">
                <img src="https://blog.cobasi.com.br/wp-content/uploads/2023/10/tipos-de-aves-capa.webp" alt="Áves coloridas">
                <div class="caption">
                    <h3>Aves Coloridas</h3>
                    <p>Admire a diversidade e beleza das aves que enchem nossos céus de cores e sons.</p>
                </div>
            </div>

            <div class="gallery-item">
                <img src="https://biodieselbrasil.com.br/wp-content/uploads/2022/07/protecao-as-florestas.jpg" alt="Conservação">
                <div class="caption">
                    <h3>Conservação</h3>
                    <p>Aprenda como você pode ajudar a proteger esses tesouros naturais para as gerações futuras.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="cta-container">
            <h2 class="cta-title">Junte-se à Nossa Comunidade Ecológica</h2>
            <p class="cta-text">Cadastre-se para receber atualizações, participar de discussões e contribuir para a preservação do nosso planeta.</p>

            <div class="buttons">
                <a href="<?= base_url('main/cadastro') ?>" class="btn btn-primary">Cadastre-se</a>
                <a href="<?= base_url('main/login') ?>" class="btn btn-secondary">Login</a>
            </div>
        </div>
    </section>
</body>

</html>