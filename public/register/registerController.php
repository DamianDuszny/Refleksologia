<?php
class RegisterController extends BasicController
{
	public function doThings()
	{
		if(!isset($_GET["register"]))
			return false;
		$this->model = new $this->model;
		try
		{
			$this->model->validData();
		}
		catch(Exception $e)
		{
			$this->view->showError($e->getMessage());
		}
	}
}

?>