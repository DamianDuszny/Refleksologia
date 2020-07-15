<?php
class LoginController extends BasicController
{
	protected $router, $homeUrl, $db;
	public function __construct(dbConnection $db)
	{
		$this->db = $db;
		$this->router = new Router();
		$this->homeUrl = $this->router->getHomeUrl();
		$this->template = "login";
		if(isset($_SESSION["user"]))
		{
			header("location: ".$this->homeUrl, true, 301);
		}
	}
	public function doThings()
	{
		$this->view->showContent();
		if(!isset($_POST["login"]) || !isset($_POST["password"]))
		return false;
		$this->model = new $this->model($this->router, $this->db);
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
