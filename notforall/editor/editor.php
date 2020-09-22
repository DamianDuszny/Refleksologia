<?php 
class Editor extends BasicView
{
	private $editorJs, $addArticleJs;
	private $content, $articleId, $title;
	private $categories;
	private $editMode;
	private $db;
	public function __construct(DbConnection $db, $content = "",$title = "",$category = "", $editMode = false, $articleId = null)
	{
		$this->content = $content;
		$this->editMode = $editMode;
		$this->articleId = $articleId;
		$this->title = $title;
		$this->category = $category;
		$this->db = $db;
		$this->createDOMDocument("templates/editor.php");

	}
	private function getCategories()
	{
		$this->query = "select * from categories";
		$this->params = array();
		try{
			return $this->db->sqlQuery($this->query, $this->params);
		}
		catch (Exception $e)
		{
			print_r($e);
		}
	}
	public function prepareEditor()
	{
	$this->categories = $this->getCategories();
	$select = $this->DOM->getElementById("category_select");
	$this->setEditorElementAttr("article_title", "value", $this->title); //put article content to the editor
	$this->setEditorElementAttr("article_id_hidden", "value", $this->articleId);
	//$this->DOM->getElementById("editor")->textContent = utf8_encode($this->content); //put article content to the editor
	if($this->editMode)
		$this->setEditorElementAttr("editor_form", "action", "edytuj_artykul?edit=true");
	$select->setAttribute("selected", $this->category);
		for($i=0; $i<count($this->categories); ++$i)
		{
		$newNode = $this->DOM->createElement('option', $this->categories[$i][1]);
		$newNode->setAttribute('value', $this->categories[$i][0]);
		if($this->categories[$i][0]==$this->category)
		$newNode->setAttribute('selected', 'selected');
		$select->appendChild($newNode);
		}
	}
	private function setEditorElementAttr($id, $attr, $value)
	{
		$this->DOM->getElementById($id)->setAttribute($attr, $value);
	}
	public function createEditor()
	{
		$this->save();
	}
}
?>