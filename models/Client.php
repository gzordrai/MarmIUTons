<?php
require_once("./conf/Connexion.php");

class Client {
    /**
     * Check if the client is already register
     * @param string $email Client email
     * @param string $pwd Client password
     * @return boolean Return if the client is register
     */
    public static function isRegister($email, $pwd) {
        $request = "SELECT password FROM client WHERE email = :email";
        $preparedRequest = Connexion::pdo()->prepare($request);
        $values = array(
            "email" => $email
        );

        try {
            $preparedRequest->execute($values);
            $results = $preparedRequest->fetch();

            if(isset($results[0])) {
                if(password_verify($pwd, $results[0]))
                    return true;
            }
            
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

    /**
     * Get the client pseudo by client email
     * @param string $email Client email
     * @return string Return the client pseudo
     */
    public static function getPseudoByEmail($email) {
        $request = "SELECT pseudo FROM client WHERE email = :email";
        $preparedRequest = Connexion::pdo()->prepare($request);
        $values = array(
            "email" => $email
        );

        try {
            $preparedRequest->execute($values);
            return $preparedRequest->fetch()["pseudo"];
        } catch(PDOException $err) {
            echo "Error: " . $err->getMessage() . "<br>";
        }
    }

    /**
     * Get the client recipes list
     * @param string $email Client email
     * @return Array<Recipe> Return the client recipes array
     */
    public static function getRecipesByEmail($email) {
        $request = "SELECT * FROM recipe WHERE id_client = '$email'";

        try {
			$results = Connexion::pdo()->query($request);
			$results->setFetchMode(PDO::FETCH_CLASS, 'Recipe');
			return $results->fetchAll();
		} catch(PDOException $err) {
            echo "Error: " . $err->getMessage() . "<br>";
        }
    }
}
?>