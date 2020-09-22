<?php
class addArticleController extends BasicController
{
	private $info;
	private $editor;
	public function doThings()
	{
	$this->model = new $this->model($this->db);
		if(isset($_GET["add"]))
		{
			$this->addArticle();
		}
	include("./notforall/editor/editor.php");
	$this->editor = new Editor($this->db);
	$this->view->addEditor($this->editor);
	}
	private function addArticle()
	{
			//$text, $category, $title, $image)
			if(count($_POST)>2)
			{
			$this->model->addArticle($_POST["post_content"], $_POST["category"],$_POST["title"], 1);
			}
			else 
			{
			$this->view->showError("Nie udało się dodać artykułu, brak przesłanych danych metodą POST");
			}
	}

}
?>