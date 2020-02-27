<?php
class sqlConnection
{
	protected $sqlLogData, $sqlConnection, $connectError;
	protected function createSqlConnection()
	{
		if(!$_SESSION["test"]) //If user is logged in as a tester, mysqli errors will be displayed.
		{
		mysqli_report(MYSQLI_REPORT_OFF | MYSQLI_REPORT_STRICT);
		}
		require_once("config/sqlConfig.php");
		$this->sqlLogData = $config;
		$this->sqlConnection = new mysqli($this->sqlLogData["host"], $this->sqlLogData["user"], $this->sqlLogData["passwd"], $this->sqlLogData["db"]);
		if($this->sqlConnection->connect_errno)
			throw new Exception($this->sqlConnection->connect_error); //Exception is used in sqlQuery function in this class.
			$this->sqlConnection->set_charset("utf8");

	}
	public function sqlQuery($query)
	{
		try
		{
		$this->createSqlConnection();
		}
		catch(Exception $e)
		{
			echo "<span id=\"error\">Nie udalo sie nawiazac polaczenia z baza danych</span>";
			if($_SESSION["test"])
			echo "<pre>$e</pre>";
			return false;
		}
		$result = $this->sqlConnection->query($query);
		if($result)
		{
			return $result; 
		}
		else
		{
			 throw new Exception($this->sqlConnection->errno);
			 return false;
		}
	}

}

?>
