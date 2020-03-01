<?php
session_start();
$_SESSION["test"] = 1;
require_once("model/model.php");
$test = new sqlConnection;
$test->createSqlConnection();
var_dump($test);
include "routing/router.php";
$routes = new Routes;
$model;
$content = "test";
class Router
{
	protected $controllerName, $path, $controllerPath, $subSiteName, $files, $destination;
	protected $viewName, $viewPath;
	protected $modelName;
	public function __construct()
	{
		preg_match_all('/\/\w+/',$_SERVER["REQUEST_URI"], $this->destination);
		$this->subSiteName = str_replace('/', "", end($this->destination[0]));
		include("./model/articlesModel.php");
		include("./public/basicView.php");
		include("./public/basicController.php");
		$path = "./public/".$this->subSiteName;
		if(is_dir($path))
		{
			$this->files = scandir("./public/".$this->subSiteName);
			$this->controllerName = preg_grep('/\w+Controller/',$this->files);
			$this->controllerName = end($this->controllerName);
			$this->controllerPath = "./public/".$this->subSiteName."/".$this->controllerName; //final controller path ./public/subSiteName/nameController.php
			$this->controllerName = str_replace(".php", "",$this->controllerName);
		}
		else
		{
			$this->subSiteName = "404";
			$this->files = scandir("./public/".$this->subSiteName);
			$this->controllerPath = "./public/404/siteNotFound.php";
			$this->controllerName = "NotFoundController";
		}
	}
	public function getControllerPath()
	{
		return $this->controllerPath;
	}
	public function getControllerName()
	{
		return $this->controllerName;
	}
	public function getSubSiteName()
	{
		return $this->subSiteName;
	}
	public function getViewName()
	{
		$this->viewName = preg_grep('/\w+View/',$this->files);
		$this->viewName = str_replace(".php", "",end($this->viewName));
		return $this->viewName;

	}
	public function getModelName()
	{
		$this->modelName = preg_grep('/\w+Model/',$this->files);
		$this->modelName = str_replace(".php", "",end($this->modelName));
		return $this->modelName;
	}
	public function getDirectoryName()
	{
		return end($this->destination[0]);
	}

}
$router = new Router();
include($router->getControllerPath());
include("templates/head.php");
require("templates/main.php");
?>