<?php
class RegisterModel
{
	private $login, $email, $password, $password2, $db;
	private $result;
	public function __construct()
	{
		$this->db = new sqlConnection;
		$this->login = $_POST["login"];
		$this->email = $_POST["email"];
		$this->password = $_POST["password"];
		$this->password2 = $_POST["password2"];
	}
	public function validData()
	{
		if(!$this->login || !$this->email || !$this->password || !$this->password2)
		{
			throw new Exception("Nie wypełniono wszystkich pól!");			
		}
		if ($this->password != $this->password2)
		{
			throw new Exception("Hasła się nie zgadzają.");
		}
		if (!preg_match("/(\w|\d){5,}/", $this->login)) 
		{
		throw new Exception("Za krótki login!");
		}
		if (!preg_match("/(\w|\d|\W){7,}/", $this->password)) 
		{
		throw new Exception("Zbyt słabe hasło!");
		}
		if (preg_match("/\s/", $this->password))
		{
			throw new Exception("Hasło nie może zawierać białych znaków! (spcja, enter itp)");
		}
		if (!preg_match("/(\w|\d)+@\w+.\w+/", $this->password))
		{
			throw new Exception("Błędny email");
		}
		$this->checkLogin();
	}
	private function checkLogin()
	{
		$this->result = $this->db->sqlQuery("select login from users where login = '$this->login'");
		if ($this->result->num_rows)
			throw new Exception("Login jest zajęty");
	}
}
?>