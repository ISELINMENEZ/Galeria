<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= URL ?>/public/css/auth.css">
</head>
<body>
    <div class="auth-container">
        <h2>Login</h2>
        <form action="<?= URL ?>/usuarios/login" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <a href="<?= URL ?>/usuarios/cadastrar" class="switch-link">Criar uma conta</a>
        <a href="<?= URL ?>" class="back-home-btn">Voltar para o início</a>
    </div>
</body>
</html>
