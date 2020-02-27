<?php
class LoginModel extends sqlConnection
{
	public function __construct()
	{
		
	}
	public function __destruct()
	{
		session_destroy();
	}
}
?>