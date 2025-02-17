<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="<?= URL ?>/public/css/auth.css">
</head>
<body>
    <div class="auth-container">
        <h2>Cadastro</h2>
        <form action="<?= URL ?>/usuarios/cadastro" method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" required>
            <select name="tipo" required>
                <option value="apreciador">Apreciador</option>
                <option value="artista">Artista</option>
            </select>
            <button type="submit">Cadastrar</button>
        </form>
        <a href="<?= URL ?>/usuarios/login" class="switch-link">Já tem uma conta? Faça login</a>
        <a href="<?= URL ?>" class="back-home-btn">Voltar para o início</a>
    </div>
</body>
</html>
