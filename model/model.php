<?php
class sqlConnection
{
	protected $sqlLogData, $sqlConnection, $connectError, $dsn, $test;
	protected $result;
	public function createSqlConnection()
	{
		if(!$_SESSION["test"]) //If user is logged in as a tester, mysqli errors will be displayed.
		{
		mysqli_report(MYSQLI_REPORT_OFF | MYSQLI_REPORT_STRICT);
		}
		require_once("config/sqlConfig.php");
		$this->sqlLogData = $config;
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
			echo "<pre>$e</pre>";
			throw new Exception("Nie udalo sie nawiazac polaczenia z baza danych");
		}
		$this->sqlConnection->prepare($query);
		$this->sqlConnection->execute($params);		
	}

}

?>
