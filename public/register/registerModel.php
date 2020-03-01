<?php
class RegisterModel
{
	private $login, $email, $password, $password2, $db;
	private $result;
	public function __construct()
	{
		foreach($_POST as $key => $result)
		{
			$_POST[$key] = htmlspecialchars($result);
		}
		if(isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"]))
		{
		$this->login = $_POST["login"];
		$this->email = $_POST["email"];
		$this->password = $_POST["password"];
		$this->password2 = $_POST["password2"];
		}
	}
	/*
	data validation method
	*/
	public function validData() 
	{
		echo 
		"<script> 
			document.getElementById(\"register_login\").value=\"".$this->login."\" 
			document.getElementById(\"register_email\").value=\"".$this->email."\" 
		</script>";
		/*
		checking if the fields are filled
		*/
		if(!$this->login || !$this->email || !$this->password || !$this->password2)
		{
			throw new Exception("Nie wypełniono wszystkich pól!");			
		}
		/*
		login length valid
		*/
		if (!preg_match("/(\w|\d){5,}/", $this->login)) 
		{
		throw new Exception("Za krótki login!");
		}
		/*
		password comparison
		*/
		if ($this->password != $this->password2)
		{
			throw new Exception("Hasła się nie zgadzają.");
		}
		/*
		checking password strength
		*/
		if (!preg_match("/[A-Z]{1,}/", $this->password) || !preg_match("/.{7,}/", $this->password) || !preg_match("/\d/", $this->password)) 
		{
		throw new Exception("Zbyt słabe hasło!");
		}
		/*
		checking white characters in password
		*/
		if (preg_match("/\s/", $this->password))
		{
			throw new Exception("Hasło nie może zawierać białych znaków! (spcja, enter itp)");
		}
		/*
		<--------- TODO ---------->
		email validation
		*/
/*		if (!preg_match("/^.+@[^\.].*\.[a-z]{2,}$/", $this->password))
		{
			throw new Exception("Błędny email");
		}*/
		$this->checkAvailability();
	}
	private function checkAvailability()
	{
		/*
		check login availability in db
		*/
		$this->db = new sqlConnection;
		$query = "select login from users where login = :login"; 
		$params = array(":login"=>$_POST["login"]);
		$this->result = $this->db->sqlQuery($query, $params);
		if($this->result)
			throw new Exception("Login jest zajęty");
		/*
		check email availability in db
		*/
		$query = "select login from users where email = :email"; 
		$params = array(":email"=>$this->email);
		$this->result = $this->db->sqlQuery($query, $params);
		if($this->result)
			throw new Exception("Email jest zajęty");
	}
	private function registerUser()
	{
		/*
		register the user
		*/
		$this->password = sha1($this->password);
		$query = "insert into users (`login`, `password`, `email`) values (:login, :password, :email)"; 
		$params = array(":login"=>$this->login, ":password"=>$this->password, ":email"=>$this->email);
		$this->result = $this->db->sqlQuery($query, $params);
		if(!$this->result)
			throw new Exception("Coś poszło nie tak podczas rejestracji...");
		else
			return "Rejestracja przebiegła pomyślnie.";
	}
}
?>