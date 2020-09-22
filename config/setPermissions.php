<?php
class setPermissions
{
	public function __construct()
	{
		if(!isset($_SESSION["permission_level"]))
			{
				$_SESSION["permission_level"] = 0;
			}

	}
	public function setAccessRoutes()
	{
		$routes = Array();
		if ($_SESSION["permission_level"]>90)
			array_push($routes, "./admin/");
		if ($_SESSION["permission_level"]>10)
			array_push($routes, "./notforall/");
			array_push($routes, "./public/");
	
		Router::$routesAllowed = $routes;
		
	}
}
?>