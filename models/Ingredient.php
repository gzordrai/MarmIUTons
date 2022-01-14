<?php
require_once("./conf/Connexion.php");

class Ingredient {

	public int $id_ingr;
	public String $lib_ingr;
	public String $quentity;
	public int $id_recipe;

	public static function addIngr($lib_ingr, $quentity, $id_recipe) {
		$requetePreparee = "INSERT INTO ingredient (lib_ingr, quentity, id_recipe) VALUES (:lib_ingr,:quentity,:id_recipe);";
        $req_prep = Connexion::pdo()->prepare($requetePreparee);
		$valeurs = array(
			"lib_ingr" => $lib_ingr,
			"quentity" => $quentity,
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