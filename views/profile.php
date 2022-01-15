<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/profile_style.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/book_style.css">

    <script src="https://kit.fontawesome.com/95f48b9c6d.js" crossorigin="anonymous"></script>
    <title>Mon profile</title>
</head>

<body>
    <div class="container_profile">
        <div class="informations-bar">
            <ul>
                <li class="li"><a href='index.php?action=home'>Accueil</a></li>
                <li class="li">Mes recettes</li>
            </ul>

            <div class="profile">
                <img src="./images/logo/user_icon.png">
                <p class="name">@<?php echo $_SESSION["pseudo"] ?></p>
            </div>
        </div>
    </div>

    <div class="content_profile">
        <?php
            include "./includes/book_2.php";
        ?>
    </div>
</body>

</html>