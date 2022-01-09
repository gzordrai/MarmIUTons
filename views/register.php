<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/connect_style.css">
    <title>S'inscrire</title>
</head>

<body>
    <div class="left_bloc"></div>

    <div class="content">
        <div class="connect_bloc">

            <div class="header">
                <h1>S'inscrire</h1>
            </div>

            <div class="content">
                <form method="GET" action="index.php">
                    <input type="hidden" name="action" value="createdClient">

                    <div class="mail_div">
                        <input type="email" name="email" placeholder="Adresse e-mail..." required>
                    </div>

                    <div class="row">
                        <div class="pass_div">
                            <input type="password" name="pwd" placeholder="Mot de passe..." required>
                        </div>

                        <div class="pass_div confirm_div">
                            <input type="password" name="pwd" placeholder="Confirmation..." required>
                        </div>
                    </div>

                    <div class="pseudo_div">
                        <input type="text" name="pseudo" placeholder="Pseudo..." required>
                    </div>

                    <div class="help_div">
                        <a href="../view/connect.php">Se connecter</a>
                    </div>

                    <div class="submit_div">
                        <input type="submit" name="submit" value="Confirmer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>