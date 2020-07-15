<?php
class loginView extends BasicView
{
	public function showContent()
	{
		include("templates/login.php");
	}
	public function showError($error)
	{
		echo "<span id=\"register_error\" class=\"error\">$error</span>";
	}
}

?>