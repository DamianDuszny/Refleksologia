<?php
class LoginController extends BasicController
{
	public function __construct()
	{

	}
	public function doThings()
	{
		if(!isset($_GET["login"]))
		return false;
		$this->model = new $this->model;
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
