<?php
class LoginModel
{
	protected $login, $password;
	protected $db, $result;
	public function __construct()
	{
		$this->login = $_POST["login"];
		$this->password = $_POST["password"];
	}
	public function validData()
	{
		$this->db = new sqlConnection;
		$query = "select login, password from users where login = :login and password = :password;";
		$this->password = sha1($this->password);
		$params = array(":login"=>$this->login, ":password" => $this->password);
		$this->result = $this->db->sqlQuery($query, $params);
		if(!$this->result)
		{
			throw new Exception("Błędny login lub hasło");
		}
		return true;
	}
	public function setSession()
	{
		$_SESSION["user"] = $this->login;
		print_r(session_id());
		echo $_SESSION["user"];
	}
}
?>