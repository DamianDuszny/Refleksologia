<?php
class LoginController extends BasicController
{
	protected $router;
	public function __construct()
	{
		$this->router = new Router();
		$this->homeUrl = $this->router->getHomeUrl();
		if(isset($_SESSION["user"]))
		{
			header("location: ".$this->homeUrl, true, 301);
		}
	}
	public function doThings()
	{
		if(!isset($_POST["login"]) || !isset($_POST["password"]))
		return false;
		$this->model = new $this->model($this->router);
		try
		{
			$this->model->validData();
			$this->model->setSession();
		}
		catch(Exception $e)
		{
			$this->view->showError($e->getMessage());
		}
	}
}
?>
