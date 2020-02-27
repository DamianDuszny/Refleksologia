<?php
class RegisterView extends BasicView
{
	public function showContent()
	{
		$this->show("templates/register.php");
	}
	public function showError($error)
	{
		echo "<span id=\"register_error\" class=\"error\">$error</span>";
	}

}
?>