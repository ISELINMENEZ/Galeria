<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?= URL ?>/public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= URL ?>/public/css/home.css">
</head>
<body class="d-flex flex-column justify-content-center align-items-center vh-100 bg-light">
    <div class="container d-flex justify-content-center align-items-center">
        <!-- Container para os botões e imagem ao lado -->
        <div class="row align-items-center">
            <!-- Coluna para os botões -->
            <div class="col-md-6 text-center mb-4 mb-md-0 p-5 bg-white rounded custom-shadow">
                <h2 class="mb-4">Como você deseja entrar?</h2>
                <a href="<?= URL ?>/usuarios/cadastrar" class="btn btn-primary btn-lg mb-3">Cadastre-se</a>
                <p>Já possui uma conta? <a href="<?= URL ?>/usuarios/login" class="text-primary">Login</a></p>
            </div>
            
            <!-- Coluna para a imagem -->
            <div class="col-md-6 text-center rounded ">
                <img src="images/home.png" alt="Descrição da imagem" class="img-fluid rounded-circle">
            </div>
        </div>
    </div>

    <!-- Adicionando o script do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
