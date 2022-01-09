<?php
require_once("./conf/Connexion.php");
require_once("./controllers/ClientController.php");

if(session_status() == 1) {
    session_start();
    Connexion::connect();
}

$action = "home";

if (isset($_GET["action"]) && in_array($_GET["action"], get_class_methods("ClientController")))
    $action = $_GET["action"];

ClientController::$action();
?>