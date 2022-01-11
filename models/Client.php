<?php
require_once("./conf/Connexion.php");
Connexion::connect();

class Client {
    private $id;
    private $email;
    private $pseudo;
    private $pwd;
    private $inscriptionDate;

    public function __construct($email, $pseudo, $pwd) {
        $this->email = $email;
        $this->pseudo =$pseudo;
        $this->pwd = $pwd;
    }

    /**
     * Check if the client is already register
     * @param string $email Client email
     * @param string $pseudo Client pseudo
     * @param string $pwd Client password
     * @return boolean Return if the client is register
     */
    public static function isRegister($email, $pseudo, $pwd) {
        $request = "SELECT COUNT(email) FROM client WHERE email = :email AND pseudo = :pseudo AND password = :pwd";
        $preparedRequest = Connexion::pdo()->prepare($request);
        $values = array(
            "email" => $email,
            "pseudo" => $pseudo,
            "pwd" => $pwd,
        );

        try {
            $bool = $preparedRequest->execute($values);
            if($bool == 1)
                return true;
            return false;
        } catch(PDOException $err) {
            echo "Error: " . $err->getMessage() . "<br>";
        }
    }

    /**
     * Add a client to the database
     * @param string $email Client email
     * @param string $pseudo Client pseudo
     * @param string $pwd Client password
     * @return void
     */
    public static function add($email, $pseudo, $pwd) {
        $request = "INSERT INTO client(email, pseudo, password) VALUES(:email, :pseudo, :pwd);";
        $preparedRequest = Connexion::pdo()->prepare($request);
        $values = array(
            "email" => $email,
            "pseudo" => $pseudo,
            "pwd" => $pwd,
        );

        try {
            $preparedRequest->execute($values);
        } catch(PDOException $err) {
            echo "Error: " . $err->getMessage() . "<br>";
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function getInscriptionDate() {
        return $this->inscriptionDate;
    }
}
?>