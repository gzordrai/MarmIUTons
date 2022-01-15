<?php 
require_once("./models/Recipe.php");
require_once("./models/Step.php");
require_once("./models/Ingredient.php");
require_once("./models/Tool.php");

class RecipeController {

    /**
     * Retrieves all the ingredients, tools and steps of a recipe to display them in the book
     * @return void Redirect to the home page
     */
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

		return require("./views/home.php");
	}

    /**
     * Add a recipe to the database
     * @return void Redirect to the home page or to the connection page if the client is not register
     */
    public static function create_recipe() {
        extract($_POST);

        if(isset($_SESSION['email'])) {
            $id_client = $_SESSION['email'];
            $dest = "./images/logo/".$_FILES['image']['name'];
            
            move_uploaded_file($_FILES['image']['tmp_name'], $dest);
            Recipe::addRecipe($rec_name, $meal_type, $season, $cost, $num_people, $_FILES['image']['name'], $id_client);
            
            $id_curr = Recipe::get_max_id_recipe();
            $cpt_step = 1;
            $cpt_ingredient = 1;
            $cpt_tool = 1;

            //add steps
            while(eval("return isset(\$step" . $cpt_step . ");")) {
                Step::addStep(eval("return \$step" . $cpt_step . ";"), $cpt_step, $id_curr['MAX(id_recipe)']);
                $cpt_step++;
            }
            
            //add ingredients
            while(eval("return isset(\$ingr" . $cpt_ingredient . ");")) {
                Ingredient::addIngr(eval("return \$ingr" . $cpt_ingredient . ";"), eval("return \$quen" . $cpt_ingredient . ";"), $id_curr['MAX(id_recipe)']);
                $cpt_ingredient++;
            }

            //add tools
            while(eval("return isset(\$tool" . $cpt_tool . ");")) {
                Tool::addTool(eval("return \$tool" . $cpt_tool . ";"), $id_curr['MAX(id_recipe)']);
                $cpt_tool++;
            }
            
            return header("Location: index.php?action=home");
        } else {
            return header("Location: index.php?action=connectClient");
        }   
    }

    /**
     * 
     */
    public static function search() {
        if(!empty($_POST["name"]))
            $recipes = Recipe::get($_POST["name"], $_POST["meal_type"], $_POST["season"]);
        else
            $recipes = Recipe::getByMealAndSeason($_POST["meal_type"], $_POST["season"]);

        if(empty($recipes))
            return header("Location: index.php?action=home");

        $k = 0;
        foreach($recipes as $recipe) {
            $pack_recettes[$k] = array(
                "name" => $recipe->name,
                "image" => $recipe->image,
                "cost" => $recipe->cost,
                "quentity" => $recipe->quentity,
                "season" => $recipe->id_season,
                "type" => $recipe->id_meal,
                "ingredients" => Recipe::getAllIngredientsByRecipe($recipe->id_recipe),
                "ustensils" => Recipe::getAllToolsByRecipe($recipe->id_recipe),
                "etapes" => Recipe::getAllStepsByRecipe($recipe->id_recipe)
            );
        }

        return require("./views/search.php");
    }
}
?>