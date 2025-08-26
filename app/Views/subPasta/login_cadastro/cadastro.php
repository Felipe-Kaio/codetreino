<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/cadastro.css') ?>">
    <title>Sustainfy - Cadastro</title>

</head>

<body>
    <div class="leaf-decoration leaf-1">
        <svg width="150" height="150" viewBox="0 0 24 24" fill="#2e8b57">
            <path d="M12 3c-3.9 0-7 3.1-7 7 0 2.4 1.2 4.6 3.1 5.8-0.3 1.3-0.7 2.6-1.1 3.8-0.3 0.9-0.1 1.8 0.5 2.5 0.6 0.7 1.5 1 2.5 1 3.3 0 6-2.7 6-6 0-0.6-0.1-1.2-0.2-1.8 1.8-1.3 3.2-3.3 3.2-5.7 0-3.9-3.1-7-7-7z" />
        </svg>
    </div>

    <div class="login-container">
        <div class="logo">
            <h1 class="link-offset-2 link-underline link-underline-opacity-0">Sustainfy</h1>
            <p>Crie sua conta e comece sua jornada ecológica</p>
        </div>

        <form class="login-form" action="<?= base_url('Autenticar/NovoCliente') ?>" method="POST">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" placeholder="Seu nome completo" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite um CPF no formato 000.000.000-00">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" maxlength="50" placeholder="seu@email.com" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" maxlength="15" required pattern="(\d{2}\) \d{5}\.\d{4}\" placeholder="(00) 00000-0000" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" maxlength="12" placeholder="••••••••" required minlength="6">
            </div>

            <button type="submit" class="login-btn" name="btn">Cadastrar</button>

            <div class="divider"></div>

            <div class="register-link">
                Já tem uma conta?
                <a href="<?= base_url('main/login') ?>">Faça login</a>
            </div>
            <div class="register-link">
                <a href="<?= base_url('main/index') ?>">Retornar ao inicio</a>
            </div>
        </form>

        <?php
        if (isset($_SESSION['cadastro_erros'])) {
            echo '<div class="erro-login" style="color: red; margin-top: 10px;">';
            foreach ($_SESSION['cadastro_erros'] as $erro) {
                echo "<p>$erro</p>";
            }
            echo '</div>';
            unset($_SESSION['cadastro_erros']);
        }
        ?>

    </div>

    <div class="leaf-decoration leaf-2">
        <svg width="150" height="150" viewBox="0 0 24 24" fill="#2e8b57">
            <path d="M17 8C8 10 5.9 16.2 4 19.9c-0.5 1-0.3 2.2 0.5 3 0.7 0.7 1.7 1 2.7 0.8 3.6-0.7 6.8-3.2 8.8-6.1 1.1-1.6 2.6-2.9 4.2-3.7 1.6-0.8 3.3-1.2 5-1.2v-4.8l-4.5 1.7-0.7-1.7 6.2-2.3v6.8c-1.7 0-3.4 0.4-4.9 1.2-1.5 0.8-2.8 2-3.8 3.4-1.7 2.5-4.4 4.5-7.4 5.1 1.3-2.9 2.8-7.4 0.6-11.1 2.6 1.5 5.3 2.1 7.9 1.8 2.6-0.3 5-1.4 6.5-3.2-1.4 0.5-2.9 0.7-4.4 0.5z" />
        </svg>
    </div>

    <script>
        // Máscaras para CPF e Telefone
        document.getElementById('cpf').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            e.target.value = value;
        });

        document.getElementById('telefone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
            }
            if (value.length > 10) {
                value = value.replace(/(\d{5})(\d)/, '$1-$2');
            } else if (value.length > 6) {
                value = value.replace(/(\d{4})(\d)/, '$1-$2');
            }
            e.target.value = value;
        });
    </script>
</body>

</html>