<?php
class editArticleView extends basicView
{
	public function addEditor(Editor $editor)
	{
		$editor->prepareEditor();
		$editor->createEditor();
	}
}
?>