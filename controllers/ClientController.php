<?php
/**
 * TODO:
 *    - page homme version connecté
 *    - fonction de recherche
*/
require_once("./conf/Connexion.php");
require_once("./models/Client.php");

class ClientController {
    public static function home() {
        return require("./views/home.php");
    }

    public static function createClient() {
        return require("./views/register.php");
    }

    public static function createdClient() {
        $email = $_GET["email"];
        $pseudo = $_GET["pseudo"];
        $pwd = $_GET["pwd"];

        if(Client::isRegister($email, $pwd)) return;
            return header("Location: index.php?action=connectClient");

        Client::add($email, $pseudo, $pwd);

        $_SESSION["email"] = $email;
        $_SESSION["pseudo"] = $pseudo;

        return header("Location: index.php");
    }

    public static function connectClient() {
        return require("./views/connect.php");
    }

    public static function connectedClient() {
        $email = $_GET["email"];
        $pwd = $_GET["pwd"];

        if(!Client::isRegister($email, $pwd))
            return header("Location: index.php?action=connectClient");

        $_SESSION["email"] = $email;
        $_SESSION["pseudo"] = Client::getPseudoByEmail($email);
        echo $_SESSION["pseudo"];
    }

    public static function disconnection() {
        session_destroy();
        return header("Location: index.php");
    }

    public static function update() {

    }

    public static function updated() {
        
    }

    public static function profile() {
        return require("./views/profile.php");
    }
}
