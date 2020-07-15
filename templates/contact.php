<?php
if($_SESSION["permission_level"]>10)
{
	echo "<input type=\"button\" id=\"edit_about\" class=\"edit\" value=\"edytuj\">";
}
?>