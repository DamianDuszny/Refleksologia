<?php
session_start();
$_SESSION["test"] = 1;
require_once("model/model.php");
include "routing/router.php";
$router = new Router();
if(isset($_GET["logout"]))
{
	session_destroy();
	$home = $router->getHomeUrl();
	header("location: $home", true, 301);
}
var_dump($_SESSION);
include($router->getControllerPath());
include("templates/head.php");
require("templates/main.php");
?>