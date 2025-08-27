<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Sustainfy - Login</title>

</head>

<body>
    <!-- Verifica se há uma mensagem de sucesso na sessão -->

    <div class="leaf-decoration leaf-1">
        <svg width="150" height="150" viewBox="0 0 24 24" fill="#2e8b57">
            <path d="M12 3c-3.9 0-7 3.1-7 7 0 2.4 1.2 4.6 3.1 5.8-0.3 1.3-0.7 2.6-1.1 3.8-0.3 0.9-0.1 1.8 0.5 2.5 0.6 0.7 1.5 1 2.5 1 3.3 0 6-2.7 6-6 0-0.6-0.1-1.2-0.2-1.8 1.8-1.3 3.2-3.3 3.2-5.7 0-3.9-3.1-7-7-7z" />
        </svg>
    </div>

    <div class="login-container">
        <div class="logo">
            <h1>
                Sustainfy
            </h1>

            <p>Conecte-se à sua conta e continue sua jornada ecológica</p>
        </div>

        <form class="login-form" action="<?= base_url('Autenticar/autenticar_login') ?>" method="POST">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="seu@email.com" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="••••••••" required>
            </div>


            <button type="submit" class="login-btn" name="btns">Entrar</button>

            <div class="divider"></div>


            <div class="register-link">
                Não tem uma conta? <a href="<?= base_url('main/cadastro') ?>">Cadastre-se</a>
            </div>
            <div class="register-link">
                <a href="<?= base_url('main/index') ?>">Retornar ao inicio</a>
            </div>
        </form>
    </div>

    <div class="leaf-decoration leaf-2">
        <svg width="150" height="150" viewBox="0 0 24 24" fill="#2e8b57">
            <path d="M17 8C8 10 5.9 16.2 4 19.9c-0.5 1-0.3 2.2 0.5 3 0.7 0.7 1.7 1 2.7 0.8 3.6-0.7 6.8-3.2 8.8-6.1 1.1-1.6 2.6-2.9 4.2-3.7 1.6-0.8 3.3-1.2 5-1.2v-4.8l-4.5 1.7-0.7-1.7 6.2-2.3v6.8c-1.7 0-3.4 0.4-4.9 1.2-1.5 0.8-2.8 2-3.8 3.4-1.7 2.5-4.4 4.5-7.4 5.1 1.3-2.9 2.8-7.4 0.6-11.1 2.6 1.5 5.3 2.1 7.9 1.8 2.6-0.3 5-1.4 6.5-3.2-1.4 0.5-2.9 0.7-4.4 0.5z" />
        </svg>
    </div>


    <!-- Toast container no canto inferior direito -->
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


    <!-- Bootstrap JS (com Popper incluído) -->
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