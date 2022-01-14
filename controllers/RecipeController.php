<?php 
require_once("./models/Recipe.php");
require_once("./models/Step.php");
require_once("./models/Ingredient.php");
require_once("./models/Tool.php");

class RecipeController {

	public static function readAll() {

		$lesRecettes = Recipe::getAllRecettes();
        $k = 0;
        foreach($lesRecettes as $recette) {

            $lesIngredients = Recipe::getAllIngredientsByRecipe($recette->id_recipe);
            $lesUstensils = Recipe::getAllToolsByRecipe($recette->id_recipe);
            $lesEtapes = Recipe::getAllStepsByRecipe($recette->id_recipe);

            $pack_recettes[$k] = array(
                    "name" => $recette->name,
                    "image" => $recette->image,
                    "cost" => $recette->cost,
                    "quentity" => $recette->quentity,
                    "season" => $recette->id_season,
                    "type" => $recette->id_meal,
                    "ingredients" => $lesIngredients,
                    "ustensils" => $lesUstensils,
                    "etapes" => $lesEtapes
            );
            $k++;
        }
		require("./views/home.php");
	}

    public static function create_recipe() {
        
        extract($_POST);
        if(isset($_SESSION['email'])) {
                $id_client = $_SESSION['email'];
            $dest = "./images/logo/".$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $dest);

            Recipe::addRecipe($rec_name, $meal_type, $season, $cost, $num_people, $_FILES['image']['name'], $id_client);
            $id_curr = Recipe::get_max_id_recipe();
            $cpt_step = 1;

            while(1) {
                if(eval("return isset(\$step" . $cpt_step . ");")) {
                    Step::addStep(eval("return \$step" . $cpt_step . ";"), $cpt_step, $id_curr['MAX(id_recipe)']);
                    $cpt_step++;
                } else {
                    break;
                }
            }

            $cpt_ingredient = 1;
            while(1) {
                if(eval("return isset(\$ingr" . $cpt_ingredient . ");")) {
                    Ingredient::addIngr(eval("return \$ingr" . $cpt_ingredient . ";"), eval("return \$quen" . $cpt_ingredient . ";"), $id_curr['MAX(id_recipe)']);
                    $cpt_ingredient++;
                } else {
                    break;
                }
            }

            $cpt_tool = 1;
            while(1) {
                if(eval("return isset(\$tool" . $cpt_tool . ");")) {
                    Tool::addTool(eval("return \$tool" . $cpt_tool . ";"), $id_curr['MAX(id_recipe)']);
                    $cpt_tool++;
                } else {
                    break;
                }
            }
            
            // TODO
            require("index.php?action=home");
        } else {
            // TODO
            require("../index.php?action=connectClient");
        }
        
    }

    

}
?>