<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link rel="stylesheet" href="<?= URL ?>/public/css/style.css">
</head>
<body>
    <div class="menu-container">
        <h2>Bem-vindo, <?= $_SESSION['usuario_nome'] ?>!</h2>
        <p>Você é um <strong><?= $_SESSION['usuario_tipo'] ?></strong>.</p>

        <nav>
            <ul>
                <li><a href="<?= URL ?>/pagina/categoria">Acessar a Galeria</a></li>
                <!-- Adicione mais links conforme necessário -->
            </ul>
        </nav>

        <form action="<?= URL ?>/usuarios/logout" method="POST">
            <button type="submit" class="logout-btn">Sair</button>
        </form>
    </div>
</body>
</html>
