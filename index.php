<?php
require_once("./conf/Connexion.php");
require_once("./controllers/ClientController.php");

if(session_status() == 1) {
    session_start();
    Connexion::connect();
}

$action = "home";

if (isset($_REQUEST["action"]) && in_array($_REQUEST["action"], get_class_methods("ClientController")))
    $action = $_REQUEST["action"];
ClientController::$action();
?>