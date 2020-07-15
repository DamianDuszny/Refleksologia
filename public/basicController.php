<?php
abstract class BasicController
{
	protected $view, $model, $template;
	protected $db;
	public function __construct($db)
	{
		$this->db = $db;
	}
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
		$this->view->addTemplate($this->template);
	}
	abstract function doThings();

}
?>