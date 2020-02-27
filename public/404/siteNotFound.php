<?php
header("HTTP/1.0 404 Not Found");
class NotFoundController extends BasicController
{
	public function __construct()
	{
		include("View.php");
		$this->view = new View;
	}
}
?>