<?php
class Session
{
	protected $AccType;
	public function __construct($AccType = "guest")
	{
		session_start();
		$_SESSION["AccType"] = $AccType;
		$this->AccType = $AccType;
	}
	public function login()
	{
		
	}
}
?>