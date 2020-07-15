<?php
class AboutView extends BasicView
{
	private $article;
	public function addTemplate()
	{
		
	}
	public function showAboutArticle($article)
	{
		$this->article = $article;
		echo "<span class=\"article_title\" >".$article[0]["Title"]."</span><span class=\"article\" id=\"".$article[0]["ID"]."\">".$article[0]["text"]."</span>";
	}
		public function editButton()
	{
		echo "<script type=\"text/javascript\" src=\"./javascript/edit.js\"></script>";
		$params = $this->article[0]["ID"].",\"".$this->article[0]["Title"]."\",".$this->article[0]["category"];
		echo("<input type=\"button\" id=\"edit_about\" class=\"edit\" value=\"edytuj\" onclick='sendArticleDataToEditor(".$params.")'/>");
		//why onclick with single quotes works but with double doesnt?
	}
}
?>