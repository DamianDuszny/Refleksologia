<?php
session_start();
$_SESSION["test"] = 1;
require_once("model/model.php");
var_dump(session_id());
var_dump($_SESSION);
include "routing/router.php";
$router = new Router();
include($router->getControllerPath());
include("templates/head.php");
require("templates/main.php");
?>