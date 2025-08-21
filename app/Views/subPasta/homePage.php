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
                <img src="https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Floresta tropical">
                <div class="caption">
                    <h3>Florestas Tropicais</h3>
                    <p>Descubra os ecossistemas mais diversos do planeta, lar de inúmeras espécies de plantas e animais.</p>
                </div>
            </div>

            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1550358864-518f202c02ba?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Animais selvagens">
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
                <img src="https://images.unsplash.com/photo-1523348837708-15d4a09cfac2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Oceanos">
                <div class="caption">
                    <h3>Ecossistemas Aquáticos</h3>
                    <p>Mergulhe na beleza dos oceanos, rios e lagos que cobrem a maior parte do nosso planeta.</p>
                </div>
            </div>

            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1542600176-4fc72c252bd0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Pássaros">
                <div class="caption">
                    <h3>Aves Coloridas</h3>
                    <p>Admire a diversidade e beleza das aves que enchem nossos céus de cores e sons.</p>
                </div>
            </div>

            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1458966480358-ff6d496a1b03?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Conservação">
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