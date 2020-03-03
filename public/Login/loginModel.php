<?php
class LoginModel
{
	protected $login, $password, $permission_level;
	protected $db, $result;
	public function __construct()
	{
		$this->login = $_POST["login"];
		$this->password = $_POST["password"];
	}
	public function validData()
	{
		$this->db = new sqlConnection;
		$query = "select login, password, uprawnienia from users where login = :login and password = :password;";
		$this->password = sha1($this->password);
		$params = array(":login"=>$this->login, ":password" => $this->password);
		$this->result = $this->db->sqlQuery($query, $params);
		$this->permission_level = $this->result[0]["uprawnienia"];
				var_dump($this->result);
		if(!$this->result)
		{
			throw new Exception("Błędny login lub hasło");
		}
		return true;
	}
	public function setSession()
	{
		$_SESSION["user"] = $this->login;
		$_SESSION["permission_level"] = $this->permission_level;
		header("location:".$_SERVER["REQUEST_SCHEME"]."//".$_SERVER["HTTP_HOST"]."/refleksjologia/", true, 301);
	}
}
?>