<?php
class Router
{
	private $controllerName, $path, $controllerPath, $subSiteName, $files, $destination;
	private $viewName, $viewPath;
	private $modelName;
	public static $routesAllowed;
	public function __construct()
	{
		preg_match_all('/\/\w*/',$_SERVER["REQUEST_URI"], $this->destination);
		($this->destination[0][1]== "/") ? $this->subSiteName = "main" : $this->subSiteName = str_replace('/', "", $this->destination[0][1]);
		include_once("./public/articles/articlesController.php");
		include_once("./public/basicView.php");
		include_once("./public/basicController.php");
		/*
		declare path
		*/
		
		foreach(self::$routesAllowed as $start){
		$this->path = $start.$this->subSiteName;
		if(is_dir($this->path))
		{
			$this->files = scandir($this->path);
			$this->controllerName = preg_grep('/\w+Controller/',$this->files);
			$this->controllerName = end($this->controllerName);
			if($this->controllerName)
			{
			$this->controllerPath = $start.$this->subSiteName."/".$this->controllerName; //final controller path ./dir/subSiteName/nameController.php
			$this->controllerName = str_replace(".php", "",$this->controllerName);
			return true;
			}
		}
	}
			/*
			this will trigger if router doesnt find dir or subsite controller 
			*/
			$this->subSiteName = "404";
			$this->path = $start.$this->subSiteName;
			$this->files = scandir("./public/".$this->subSiteName);
			$this->controllerPath = "./public/404/siteNotFoundController.php";
			$this->controllerName = "siteNotFoundController";

	}	
	public function getControllerPath()
	{
		return $this->controllerPath;
	}
	public function getControllerName()
	{
		return $this->controllerName;
	}
	public function getSubSiteRoute()
	{
		return $this->path;
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
	public function getHomeUrl()
	{
		return $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/refleksologia/";
	}
	public function getGeneralModelPath($name)
	{
		return $_SERVER['DOCUMENT_ROOT']."/refleksologia/model/".$name;
	}
	public function getCurrentPath()
	{
		return getcwd();
	}

}
?>