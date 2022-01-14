<?php
require_once("./conf/Connexion.php");

class Recipe {

	public String $name;
	public String $image;
	public String $cost;
	public String $quentity;
	public String $season;
	public String $meal;

	public static function getAllRecettes() {
		$requete = "SELECT * FROM recipe";
		$resultat = Connexion::pdo()->query($requete);
		$resultat->setFetchMode(PDO::FETCH_CLASS,'Recipe');
		$tableau = $resultat->fetchAll();
		return $tableau;  
	}

    public static function getAllIngredientsByRecipe($id_recipe) {
		$requete = "SELECT * FROM ingredient WHERE id_recipe = $id_recipe";
		$resultat = Connexion::pdo()->query($requete);
		$resultat->setFetchMode(PDO::FETCH_CLASS,'Ingredient');
		$tableau = $resultat->fetchAll();
		return $tableau;
	}

    public static function getAllToolsByRecipe($id_recipe) {
		$requete = "SELECT * FROM tool WHERE id_recipe = $id_recipe";
		$resultat = Connexion::pdo()->query($requete);
		$resultat->setFetchMode(PDO::FETCH_CLASS,'Recipe');
		$tableau = $resultat->fetchAll();
		return $tableau;
	}

    public static function getAllStepsByRecipe($id_recipe) {
		$requete = "SELECT * FROM step WHERE id_recipe = $id_recipe";
		$resultat = Connexion::pdo()->query($requete);
		$resultat->setFetchMode(PDO::FETCH_CLASS,'Recipe');
		$tableau = $resultat->fetchAll();
		return $tableau;
	}

	public static function addRecipe($rec_name, $meal_type, $season, $cost, $num_people,$rec_image) {
		$requetePreparee = "INSERT INTO recipe (name, image, cost, quentity, id_season, id_meal) VALUES (:rec_name,:rec_image,:cost,:quentity,:id_season,:id_meal);";
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		$valeurs = array(
			"rec_name" => $rec_name,
			"rec_image" => $rec_image,
			"cost" => $cost,
			"quentity" => $num_people,
			"id_season" => $season,
			"id_meal" => $meal_type
		);
		try {
			$req_prep->execute($valeurs);
		} catch (PDOException $e) {
			echo "erreur : ".$e->getMessage()."<br>";
		}
	}

	public static function get_max_id_recipe() {
		$requete = "SELECT MAX(id_recipe) FROM recipe";
		$resultat = Connexion::pdo()->query($requete);
		$valeur = $resultat->fetchAll();
		return $valeur[0];
	}

	/**
	 * @param string $name The name of the recipe
	 * @throws PDOException If there is an error in the execution of the sql query
	 * @return Recipe Return the recipe as an object
	 */
	public static function getByName($name) {
		$request = "SELECT * FROM recipe WHERE name = '$name'";

		try {
			$results = Connexion::pdo()->query($request);
			$results->setFetchMode(PDO::FETCH_CLASS,'Recipe');
			return $results->fetchAll()[0];
		} catch(PDOException $err) {
            echo "Error: " . $err->getMessage() . "<br>";
        }
	}
}
?>