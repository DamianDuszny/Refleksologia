<?php
class dbConnection
{
	protected $sqlLogData, $sqlConnection, $connectError, $dsn, $test;
	protected $sqlConfig;
	protected $result;
	public function createSqlConnection()
	{
		require_once("config/sqlConfig.php");
		$this->sqlConfig = new sqlConfig;
		$this->sqlLogData = $this->sqlConfig->getData();
		$this->dsn = "mysql:dbname=".$this->sqlLogData["db"].";host=".$this->sqlLogData["host"]."; charset=UTF8";
		$this->sqlConnection = new PDO($this->dsn, $this->sqlLogData["user"], $this->sqlLogData["passwd"]);
	/*	$this->sqlConnection = new mysqli($this->sqlLogData["host"], $this->sqlLogData["user"], $this->sqlLogData["passwd"], $this->sqlLogData["db"]);
		if($this->sqlConnection->connect_errno)
			throw new Exception($this->sqlConnection->connect_error); //Exception is used in sqlQuery method in this class.
			$this->sqlConnection->set_charset("utf8");*/

	}
	public function sqlQuery($query, $params)
	{
		try
		{
		$this->createSqlConnection();
		}
		catch(PDOException $e)
		{
			if($_SESSION["test"])
			var_dump($e);
			throw new Exception("Nie udalo sie nawiazac polaczenia z bazą danych");
		}
		$sth = $this->sqlConnection->prepare($query);
		$sth->execute($params);
		$this->result = $sth->fetchAll();
		return $this->result;		
	}

}

?>
