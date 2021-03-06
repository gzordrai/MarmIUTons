<?php
require_once("./conf/Connexion.php");
require_once("./models/Client.php");
require_once("./models/Recipe.php");
require_once("./controllers/RecipeController.php");

class ClientController {
    public static function home() {
        return RecipeController::readAll();
    }

    public static function createClient() {
        return require("./views/register.php");
    }

    public static function createdClient() {
        $email = $_GET["email"];
        $pseudo = $_GET["pseudo"];
        $pwd = password_hash($_GET["pwd"], PASSWORD_BCRYPT, [ 'cost' => 12,]);

        if(Client::isRegister($email, $pwd))
            return header("Location: index.php?action=connectClient");

        Client::add($email, $pseudo, $pwd);

        $_SESSION["email"] = $email;
        $_SESSION["pseudo"] = $pseudo;

        return header("Location: index.php");
    }

    public static function connectClient() {
        return require("./views/connect.php");
    }

    public static function connectedClient() {
        $email = $_GET["email"];
        $pwd = $_GET["pwd"];

        if(!Client::isRegister($email, $pwd))
            return header("Location: index.php?action=connectClient");

        $_SESSION["email"] = $email;
        $_SESSION["pseudo"] = Client::getPseudoByEmail($email);

        return header("Location: index.php");
    }

    public static function disconnection() {
        session_destroy();
        return header("Location: index.php");
    }

    public static function addRecipe() {
        $_POST["include"] = "add_recipe.php";
        return require("./views/home.php");
    }

    public static function create_recipe() {
        RecipeController::create_recipe();
    }
  
    public static function profile() {
        $recipes = Client::getRecipesByEmail($_SESSION["email"]);

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

        return require("./views/profile.php");
    }

    public static function search() {
        RecipeController::search();
    }
}
