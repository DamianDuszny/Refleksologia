<?php
class BasicView
{
	public function show($content)
	{
		include($content);
	}
	public function showError($error)
	{
		echo "xD";
		echo $error;
	}
}

?>