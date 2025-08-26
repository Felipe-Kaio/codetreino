<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/tlnoticias.css') ?>">
    <title>Sustainfy - Blog & Notícias</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/tlnoticias.css') ?>">

</head>

<body>
    <div class="promo-banner">
        <p>🌱 Frete grátis em compras acima de R$ 150 | Use o cupom ECO10 para 10% de desconto</p>
    </div>

    <nav class="navbar">
        <a class="logo">Sustainfy</a>
        <ul class="nav-links">
            <li><a href="<?= base_url('main/loja') ?>">Início</a></li>
            <li><a href="loja.php#categories">Categorias</a></li>
            <li><a href="loja.php#products">Produtos</a></li>
            <li><a href="<?= base_url('main/tlsbmais') ?>">Sobre</a></li>
        </ul>
        <div class="nav-icons">

        </div>
    </nav>

    <section class="blog-hero">
        <div class="hero-content">
            <h1 style=" color: black;">Blog Sustainfy: Notícias e Inspirações Verdes</h1>
            <p style=" color: #28a745;">Mantenha-se atualizado com as últimas notícias, dicas e projetos sobre sustentabilidade e áreas verdes que transformam o mundo.</p>
        </div>
    </section>

    <section class="blog-content">
        <div class="main-blog-posts">
            <div class="blog-post-card">
                <img src="https://images.unsplash.com/photo-1454165205744-bdcdfd277259?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Parque Urbano">
                <div class="blog-post-info">
                    <div class="post-meta">
                        <i class="far fa-calendar-alt"></i> 29 Junho, 2025 |
                        <i class="far fa-user"></i> Por Ana Silva |

                    </div>
                    <h3>Construindo Parques Urbanos Sustentáveis: O Futuro das Cidades Verdes</h3>
                    <p>Descubra como a Sustainfy está colaborando com projetos inovadores para transformar espaços urbanos em oásis verdes, promovendo biodiversidade e bem-estar para a comunidade.</p>

                </div>
            </div>

            <div class="blog-post-card">
                <img src="https://images.unsplash.com/photo-1510444342203-c35f793b827e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Jardim Vertical">
                <div class="blog-post-info">
                    <div class="post-meta">
                        <i class="far fa-calendar-alt"></i> 09 Julho, 2025 |
                        <i class="far fa-user"></i> Por João Pereira |

                    </div>
                    <h3>Jardins Verticais: Soluções Criativas para Espaços Pequenos</h3>
                    <p>Pequenos apartamentos e grandes ideias! Conheça o impacto dos jardins verticais na qualidade do ar e na estética urbana, e como você pode ter um em casa.</p>

                </div>
            </div>

            <div class="blog-post-card">
                <img src="https://images.unsplash.com/photo-1542601900-a5482386a347?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Comunidade Plantando">
                <div class="blog-post-info">
                    <div class="post-meta">
                        <i class="far fa-calendar-alt"></i> 10 Agosto, 2025 |
                        <i class="far fa-user"></i> Por Carla Mendes |

                    </div>
                    <h3>O Poder das Hortas Comunitárias: Conectando Pessoas e Natureza</h3>
                    <p>Explore os benefícios sociais e ambientais das hortas comunitárias e como a Sustainfy apoia iniciativas locais para promover a segurança alimentar e o engajamento.</p>

                </div>
            </div>
        </div>

        <div class="sidebar">


            <h4 style="margin-top: 40px;">Posts Recentes</h4>
            <div class="recent-post">
                <img src="https://images.unsplash.com/photo-1621377514333-e1d5a7d6e5c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Post Recente 1">
                <div class="recent-post-info">
                    <h5>Reciclagem Criativa: Dê Nova Vida aos Objetos</h5>
                    <span><i class="far fa-calendar-alt"></i> 01 Junho, 2025</span>
                </div>
            </div>
            <div class="recent-post">
                <img src="https://images.unsplash.com/photo-1588661601007-ec301135c345?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Post Recente 2">
                <div class="recent-post-info">
                    <h5>Energia Solar em Casa: Um Guia Completo</h5>
                    <span><i class="far fa-calendar-alt"></i> 10 Maio, 2025</span>
                </div>
            </div>
            <div class="recent-post">
                <img src="https://images.unsplash.com/photo-1549495333-8902517d9a9f?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Post Recente 3">
                <div class="recent-post-info">
                    <h5>Desafios da Mobilidade Sustentável</h5>
                    <span><i class="far fa-calendar-alt"></i> 20 Maio, 2025</span>
                </div>
            </div>
        </div>
    </section>


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
                    <li><a href="saiba-mais.html">Nossa História</a></li>
                    <li><a href="#">Política de Sustentabilidade</a></li>
                    <li><a href="#">Trabalhe Conosco</a></li>
                    <li><a href="#">Fornecedores</a></li>
                    <li><a href="#">Impacto Ambiental</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Ajuda</h3>
                <ul class="footer-links">
                    <li>Central de Ajuda</li>
                    <li>Política de Entrega</li>
                    <li>Trocas e Devoluções</li>
                    <li>Pagamentos</li>
                    <li>Dúvidas Frequentes</li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Contato</h3>
                <ul class="footer-links">
                    <li><a href="mailto:contato@sustainfy.com">Sustainfy@gmail.com</a></li>
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
</body>

</html>