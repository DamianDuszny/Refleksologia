<?php
session_start();
$_SESSION["test"] = 1;
require_once("model/dbConnection.php");
require_once("config/setPermissions.php");
require_once("routing/router.php");
$setPermissions = new setPermissions;
$setPermissions->setAccessRoutes();
$router = new Router();
$db = new dbConnection;
if(isset($_GET["logout"]))
{
	session_destroy();
	$home = $router->getHomeUrl();
	header("location: $home", true, 301);
}
include($router->getControllerPath());
include("templates/head.php");
require("templates/main.php");

?>