<?php
class ArticlesModel
{
	protected $db, $articles;
	public function __construct()
	{
		$this->db = new dbConnection;
	}
	public function getArticles($category)
	{
		if($category="new" || $category == "")
		{
			$query = "select * from articles";
		}
		else
		{
			$query = "select * from articles where category = :category";
			$category = Array(":category"=>"$category");
		}
		$this->db->query($query, $category);
	}
}
?>