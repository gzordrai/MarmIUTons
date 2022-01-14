<?php
require_once("./conf/Connexion.php");
Connexion::connect();

class Tool {

	public int $id_tool;
	public String $lib_tool;
	public int $id_recipe;

	public static function addTool($lib_tool, $id_recipe) {
		$requetePreparee = "INSERT INTO tool (lib_tool, id_recipe) VALUES (:lib_tool,:id_recipe);";
        $req_prep = Connexion::pdo()->prepare($requetePreparee);
		$valeurs = array(
			"lib_tool" => $lib_tool,
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