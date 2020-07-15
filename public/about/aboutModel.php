<?php
class AboutModel
{
	private $db, $query, $params;
	public function __construct(dbConnection $db)
	{
		$this->db = $db;
	}
	public function getAboutArticle()
	{
		$this->params = array();
		$this->query = "select * from articles where category = 3";
		try
		{
		return $this->db->sqlQuery($this->query, $this->params);
		}
		catch (Exception $e)
		{
		throw new Exception($e->getMessage());
		}

	}
}

?>