<?php 
  echo "<!-- Git this is not Hack language but php file... -->";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <link rel="stylesheet" type="text/css" href="./styles/connect_style.css">
    <title>Se connecter</title>
</head>

<body>
    <div class="left_bloc"></div>

    <div class="content">
        <div class="connect_bloc">
        <div class="header">
            <h1>Se connecter</h1>
        </div>
        <div class="content">
            <form method="GET" action="index.php">
            <input type="hidden" name="action" value="connectedClient">

            <div class="mail_div">
                <input type="email" name="email" placeholder="Adresse e-mail..." required>
            </div>

            <div class="pass_div">
                <input type="password" name="pwd" placeholder="Mot de passe..." required>
            </div>

            <div class="help_div">
                <a href="index.php?action=createClient">S'inscrire</a>
                <a href="#">Mots de passe oublié</a>
            </div>

            <div class="submit_div">
                <input type="submit" name="submit" value="Connexion...">
            </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>