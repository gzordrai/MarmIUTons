<?php
/**
 * TODO:
 *    - page homme version connecté
 *    - fonction de recherche
*/
require_once("./conf/Connexion.php");
Connexion::connect();

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

        //$client = new Client($email, $pseudo, $pwd);

        $_SESSION["email"] = $email;
        return header("Location: index.php");
    }

    public static function connectClient() {
        return require("./views/connect.php");
    }

    public static function connectedClient() {

    }

    public static function disconnection() {
        session_destroy();
        return header("Location: index.php");
    }

    public static function update() {

    }

    public static function updated() {
        
    }
}
