<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Obras</title>
    <link rel="stylesheet" href="<?= URL ?>/public/css/categoria.css">
</head>
<body>

<!-- Cabeçalho -->
<header class="navbar">
    <div class="nav-links">
        <a href="<?= URL ?>/pagina/menu">Menu</a>
        <a href="#">Artistas</a>
    </div>
    
    <div class="search-container">
        <input type="text" placeholder="Buscar...">
        <img src="images/lupa.png" alt="Lupa" class="icon-search">
    </div>
    
    <div class="icon-container">
        <img src="images/chat.png" alt="Chat" class="icon">
        <img src="images/carrinho.png" alt="Carrinho" class="icon">
        <img src="images/perfil.png" alt="Perfil" class="icon">
    </div>
</header>

<!-- Conteúdo Principal -->
<main>
    <div class="preferences">
        <h3>Preferências:</h3>
        <div class="tag">Publicidade <span class="close-btn" onclick="removeTag(this)">✖</span></div>
        <div class="tag">Ilustrações <span class="close-btn" onclick="removeTag(this)">✖</span></div>
        <div class="tag">Logotipos <span class="close-btn" onclick="removeTag(this)">✖</span></div>
        <div class="tag">Digital <span class="close-btn" onclick="removeTag(this)">✖</span></div>
        <div class="tag">À mão <span class="close-btn" onclick="removeTag(this)">✖</span></div>
    </div>

    <div class="gallery">
        <div class="gallery-item square"></div>
        <div class="gallery-item circle"></div>
        <div class="gallery-item rectangle wide"></div>
        <div class="gallery-item rectangle tall"></div>
        <div class="gallery-item square"></div>
        <div class="gallery-item circle"></div>
        <div class="gallery-item rectangle wide"></div>
        <div class="gallery-item rectangle"></div>
        <div class="gallery-item square"></div>
        <div class="gallery-item rectangle wide"></div>
        <div class="gallery-item circle"></div>
        <div class="gallery-item rectangle"></div>
    </div>
</main>

<!-- Rodapé -->
<footer class="footer">
    <p>&copy; 2024 Galeria - Integrantes: Adriano, Antonio, Alliny, Ana Julia e Victória</p>
</footer>

<script src="script.js"></script>
</body>
</html>
