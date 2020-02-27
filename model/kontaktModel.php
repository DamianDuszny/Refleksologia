<?php
class KontaktModel
{
	public function __construct()
	{
		require_once("config/contactData.php");
		foreach($contactConfig as $key => $value)
			print("<span id=\"$key\" class=\"contact_data\">$value</span>");
	}
}
class changeContactData extends sqlConnection
{
	private $firstName, $lastName, $teleNumber, $addres, $zipCode, $streetName;
	public function __construct($a = 0, $b = 0, $c = 0, $d = 0, $e = 0, $f = 0)
	{
		$this->firstName = $a;
		$this->lastName = $b;
		$this->addres = $c;
		$this->zipCode = $e;
		$this->streetName = $f;
	}
	public function updateContactData()
	{
		$this->sqlQuery("update"); //TODO
	}
}
?>