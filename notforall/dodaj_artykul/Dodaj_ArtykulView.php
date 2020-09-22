<?php
class Dodaj_ArtykulView extends BasicView
{
	private $db;

	public function addEditor(Editor $editor)
	{
		$editor->prepareEditor();
		$editor->createEditor();
	}
	public function addTemplate($template = "addPost.php")
	{
	}
	public function addCategoriesSelect(Array $categories)
	{

	}
}
?>