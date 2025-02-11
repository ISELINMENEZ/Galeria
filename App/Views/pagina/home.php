<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
   
<body>
<div class="main-container">
    <h2>Como você deseja entrar?</h2>
    
        <div class="content">
            <div class="buttons">
                <button class="button button-artist">Artista</button>
                <button class="button button-appreciator">Apreciador</button>
            </div>
            <a href="<?=URL?>/usuarios/cadastrar">
                <button type="submit" class="buttonn button-register" >Cadastre-se</button>
                </a>
            <p>Já possui uma conta? <a href="<?=URL?>/usuarios/login">Login</a></p>
        </div>
    </div>
    <div class="image">
            <img src="images/home.png" alt="Descrição da imagem" class="background-image">
        </div>
 

</body>

   
</html>