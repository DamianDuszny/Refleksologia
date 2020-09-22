<?php
class Dodaj_artykulModel
{
	  
	private $text, $category, $title, $image;
	public function __construct(dbConnection $db)
	{
		$this->db = $db;
	}
	public function addArticle($text, $category, $title, $image)
	{
		$this->query = "insert into articles (text, category, title, image) values (:text, :category, :title, :image);";
		$this->params = array(
			":text" => $text,
			":category" => $category, 
			":title" => $title, 
			":image" => $image);
		try{
		$this->db->sqlQuery($this->query, $this->params);
		return "Udało się pomyślnie dodać artykuł.";
		}
		catch (Exception $e)
		{
		return $e;
		}
	} 
}
?>