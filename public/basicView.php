<?php
class BasicView
{
	protected $DOM;
	public function createDOMDocument($path)
	{
		$this->DOM = new DOMDocument;
		$this->DOM->loadHTMLFile($path);
	}
	public function save()
	{
		echo utf8_decode($this->DOM->saveHTML($this->DOM));
	}	
	public function show($content)
	{
		include($content);
	}
	public function showError($error)
	{
		echo "<div id=\"register_error\" class=\"error\">$error</div>";
	}
/*	public function addTemplate($template)
	{
		if($template)
		include("templates/".$template.".php");
	}*/
}

?>