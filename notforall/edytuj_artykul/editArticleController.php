<?php
class editArticleController extends basicController
{
	private $content, $title, $category, $editor, $articleId;
	public function doThings()
	{
		var_dump($_POST);
		$this->content = $_POST["text"];
		$this->title = $_POST["title"];
		$this->category = $_POST["category"];
		$this->articleId = $_POST["articleId"];
		include("./notforall/editor/editor.php");
		//DbConnection $db, $content = "",$title = "",$category = "", $editMode = false, $articleId = null)
		$this->editor = new Editor($this->db, $this->content, $this->title, $this->category, true, $this->articleId);
		$this->view->addEditor($this->editor);
	}
}
?>