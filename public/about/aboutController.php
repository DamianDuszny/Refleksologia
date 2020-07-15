<?php
class AboutController extends BasicController
{
	public function doThings()
	{
		$this->model = new $this->model($this->db);
		$this->view->createDOMDocument("templates/about.php");

		try
		{
		$this->view->showAboutArticle($this->model->getAboutArticle());
		$this->view->save();
		}
		catch(Exception $e)
		{
			$e->getMessage();
		}
				if($_SESSION["permission_level"]>10)
			$this->view->editButton();
	}
}
?>