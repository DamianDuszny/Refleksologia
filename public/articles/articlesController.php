<?php
class ArticlesController
{
	private $category;
	private $view, $model;
	public function __construct($category)
	{
		$this->category = $category;
		include("./public/articles/articlesModel.php");
		include("./public/articles/articlesView.php");
		$this->model = new ArticlesModel($this->category);
		$this->view = new ArticlesView;
		$this->view->articlesForMainPage("tytul", "test");
	}
}
?>