<?php
header("HTTP/1.0 404 Not Found");
class SiteNotFoundController extends BasicController
{
	public function __construct()
	{
		//$this->view = new notFoundView;
	}
	public function doThings()
	{
		$this->view->showContent();
	}
}
?>