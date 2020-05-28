<?php
class Router
{
	protected $controllerName, $path, $controllerPath, $subSiteName, $files, $destination;
	protected $viewName, $viewPath;
	protected $modelName;
	public function __construct()
	{
		preg_match_all('/\/\w*/',$_SERVER["REQUEST_URI"], $this->destination);
		($this->destination[0][1]== "/") ? $this->subSiteName = "refleksologia" : $this->subSiteName = str_replace('/', "", $this->destination[0][1]);
		
		include_once("./public/articles/articlesController.php");
		include_once("./public/basicView.php");
		include_once("./public/basicController.php");
		/*
		declare path
		*/
		$this->path = "./public/".$this->subSiteName;
		if(is_dir($this->path))
		{
			$this->files = scandir($this->path);
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
	public function getHomeUrl()
	{
		return $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/refleksjologia/";
	}
	public function getGeneralModelPath($name)
	{
		return $_SERVER['DOCUMENT_ROOT']."/refleksjologia/model/".$name;
	}

}
?>