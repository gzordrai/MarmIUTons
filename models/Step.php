<?php
require_once("./conf/Connexion.php");

class Step {

	public int $id_step;
	public String $num;
	public String $txt_step;
	public int $id_recipe;

    public static function addStep($txt_step, $num, $id_recipe) {
		$requetePreparee = "INSERT INTO step (num, txt_step, id_recipe) VALUES (:num,:txt_step,:id_recipe);";
        $req_prep = Connexion::pdo()->prepare($requetePreparee);
		$valeurs = array(
			"num" => $num,
			"txt_step" => $txt_step,
			"id_recipe" => $id_recipe
		);
		try {
			$req_prep->execute($valeurs);
		} catch (PDOException $e) {
			echo "erreur : ".$e->getMessage()."<br>";
		}
	}
}
?>