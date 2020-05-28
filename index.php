<?php
session_start();
$_SESSION["test"] = 1;
require_once("model/dbConnection.php");
include "routing/router.php";
$router = new Router();
if(isset($_GET["logout"]))
{
	session_destroy();
	$home = $router->getHomeUrl();
	header("location: $home", true, 301);
}
include($router->getControllerPath());
include("templates/head.php");
require("templates/main.php");
$included_files = get_included_files();

foreach ($included_files as $filename) {
    echo "$filename\n";
}
?>