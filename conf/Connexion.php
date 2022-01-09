<?php
class Connexion {
    private static $hostname = "localhost";
    private static $database = "";
    private static $login = "";
    private static $password = "";
    private static $tabUTF8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    private static $pdo;

    /**
     * Return PDO instance
     * @return mixed PDO instance
     */
    public static function pdo() {
        return self::$pdo;
    }

    /**
     * Connection to the database
     * @return void
     */
    public static function connect() {
        $h = self::$hostname;
        $d = self::$database;
        $l = self::$login;
        $p = self::$password;
        $t = self::$tabUTF8;
        self::$pdo = new PDO("mysql:host=$h;dbname=$d", $l, $p, $t);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
?>