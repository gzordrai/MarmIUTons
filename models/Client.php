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
     * add a client to the database
     * @param string $email
     * @param string $pseudo
     * @param string $pwd
     * @return void
     */
    public static function add($email, $pseudo, $pwd) {
        $request = "INSERT INTO client VALUES(:email, :pseudo, :pwd);";
        $preparedRequest = Connexion::pdo()->prepare($request);
        $values = array(
            "email" => $email,
            "pseudo" => $pseudo,
            "pwd" => $pwd
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