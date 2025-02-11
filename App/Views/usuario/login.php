<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login2.css">
</head>
<body>
    <div class="login-container">
        <h2>Faça seu Login</h2>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Seu email" required>

            <label for="password">Senha</label>
            <input type="password" id="password" name="password" placeholder="Senha" required>

            <button type="submit">Entre</button>
            <a href="recuperar_senha.php">Esqueceu sua senha?</a>
        </form>
    </div>
</body>
</html>
