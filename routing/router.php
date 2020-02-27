<?php
class Routes
{
	private $url, $model,$public;
	public function __construct()
	{	
		//$this->url = $this->link = "/refleksjologia";
		$this->public = $this->url."./public";
		$this->model = "./model/";
	}
	public function __unset($url)
	{
		$this->test();
	}
	public function refleksjologia()
	{
		return $this->public."/refleksjologia/mainSiteController.php";
	}
	public function kontakt()
	{
		return $this->public."/kontakt/kontaktController.php";
	}
	public function articles()
	{
		return $this->public."/articles/";
	}
	public function about($controller)
	{
		return $this->public."/about/".$controller;
	}
	public function UsersPannel()
	{

	}
	public function dodaj_artykul($controller)
	{
		return $this->public."/dodaj_artykul/".$controller;
	}
	public function login()
	{
		return $this->public."/login/loginController.php";
	}
	public function Controller()
	{
		return $this->url."/controller/";
	}
	public function Styles()
	{
		return $this->url."/styles/";
	}
	public function ArticlesModel()
	{
		return $this->model."articlesModel.php";
	}
	public function siteNotFound()
	{
		return $this->public."/404/siteNotFound.php";
	}
	public function register()
	{
		return $this->public."/register/registerController.php";
	}

}
?>