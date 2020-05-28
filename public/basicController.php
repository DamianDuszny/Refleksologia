<?php
abstract class BasicController
{
	protected $view, $model;
	public function setView($dir, $name)
	{
		include($dir."/".$name.".php");
		$this->view = new $name;
	}
	public function setModel($dir, $name)
	{
		include($dir."/".$name.".php");
		$this->model = $name;
	}
	public function showContent()
	{
		$this->view->showContent();
	}
	abstract function doThings();
}
?>