<?php
class LoginController extends BasicController
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
