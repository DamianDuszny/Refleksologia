<?php
class sqlConfig
{
	private $host, $db, $passwd, $user;
	public function __construct()
	{
		$this->host = "localhost";
		$this->db = "Refleksologia";
		$this->passwd = "";
		$this->user = "root";
	}
	public function getData()
	{
		$config = Array("host"=>$this->host, "db"=>$this->db, "passwd"=>$this->passwd, "user"=>$this->user);
		return $config;
	}
}
?>