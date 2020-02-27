<?php
class addPostModel
{
	public function __construct(){
		require_once("templates/addPost.php");
	}
}
class CategoryNames extends sqlConnection
{
	protected function getCategories()
	{
		return $this->sqlQuery("select categoryName from categories");
	}
	public function printInSelect()
	{
		try
		{
			$result = $this->getCategories();
			print("<select id=\"categories\">");
			while($row = $result->fetch_row())
			{
				print("<option class=\"categories_option\">".$row[0]."</option>");
			}
			print("</select>");
		}
		catch(Exception $e)
		{
			include_once("model/errorMessages.php");
			if($e->getMessage()==1054)
			printError("Nie udało się wyświetlić nazw kategorii, błąd z bazą danych.");
			else
			print("Nie udało się połączyć z bazą danych.");
		}
	}
}
?>