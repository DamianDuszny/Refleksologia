<?php
class MainSiteController extends BasicController
{
	public function __construct()
	{
		$this->router = new Router();
		$this->template = "blank";
	}
	public function doThings()
	{
		$this->model = new $this->model("new");
	//	$this->model = new $this->model($this->router->getGeneralModelPath("articlesController.php"));

	}
}

?>