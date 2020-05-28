<?php
class ArticlesController
{
	protected $category;
	protected $view, $model;
	public function __construct()
	{
		include("./articlesModel.php");
		include("./articlesView.php");
		$this->model = new ArticlesModel($this->$category);
		$this->view = new ArticlesView;
	}
}
?>