<?php
class Controller
{
	private $page, $link;
	public function __construct($link)
	{
		//$this->link = $link;
		//header($link, true, 301);
		require_once("model/postModel.php");
		isset($_GET["option"])? $this->page=$_GET["option"] : $this->page="main";
	}
	public function home()
	{
		require_once("model/mainSiteModel.php");
		$model = new MainSiteModel();
	}
	public function subSite($a)
	{
		require_once("model/SubSiteModel.php");
		$model = new SubSiteModel();
	}
	public function login()
	{
		require_once("model/LoginModel.php");
		$model = new LoginModel();
	}
	public function kontakt()
	{
		require_once("model/kontaktModel.php");
		$model = new KontaktModel();
	}
	public function addPost()
	{
		require_once("model/addPostModel.php");
		$model = new addPostModel();
	}
	public function about()
	{
	}
}
?>
