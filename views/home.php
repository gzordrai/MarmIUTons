<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/navbar_style.css">
        <link rel="stylesheet" href="./styles/style.css">
        <link rel="stylesheet" href="./styles/title_style.css">
        <link rel="stylesheet" href="./styles/research_style.css">
        <link rel="stylesheet" href="./styles/book_style.css">
        <link rel="stylesheet" href="./styles/add_recipe_style.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Raleway:wght@300&display=swap" rel="stylesheet"> 

        
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet"> 
        <script type="application/javascript" src="./scripts/home.js"></script>
        <script type="application/javascript" src="https://kit.fontawesome.com/95f48b9c6d.js" crossorigin="anonymous"></script>

        <title>Wortel</title>
    </head>
    <body>
        <ul>
            <li><a class="active" href="index.php?action=book_2">Livre de recettes</a></li>
            <li><a href="#">Recherche</a></li>
            <?php
                if(!isset($_SESSION["email"])) {
            ?>
                    <li class='connect'><a href='index.php?action=connectClient'>Se connecter</a></li>
                    <li class='connect'><a href='index.php?action=createClient'>S'inscrire</a></li>
            <?php
                } else {
            ?>
                    <li class='connect'><a href='index.php?action=profile'>Profil</a></li>
                    <li class='connect'><a href='index.php?action=disconnection'>Deconnexion</a></li>
            <?php
                }
            ?>
        </ul>
        
        <section id="paralax">
            <h2 id="text">Wortel</h2>
            <img src="./images/paralax/background.png" id="background">
            <img src="./images/paralax/etoile.png" id="etoile">
            <img src="./images/paralax/lune.png" id="lune">
            <img src="./images/paralax/nuages.png" id="nuages">
            <img src="./images/paralax/colline_rose.png" id="colline_rose">
            <img src="./images/paralax/colline_verte.png" id="colline_verte">
            <img src="./images/paralax/colline_marron.png" id="colline_marron">
            <img src="./images/paralax/colline_rouge.png" id="colline_rouge">
            <img src="./images/paralax/colline_bleue.png" id="colline_bleue">
            <img src="./images/paralax/sol.png" id="sol">
        </section>

        <!-- content  -->
        <div class="main">
            <?php
                include "./includes/book_2.php";
            ?>
        </div>
    </body>
</html>