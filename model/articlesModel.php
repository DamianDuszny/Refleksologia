<?php
class getPostContent extends sqlConnection
{
	protected $postsContent;
	protected function getContent($category)
	{
		if($category)
		{
			$category = " where category = ".$category;
		}
		$this->postsContent = $this->sqlQuery("select * from postscontent".$category);
		//$this->closeSqlConnection();
		return $this->postsContent;
	}
}
class PrintPosts extends getPostContent
{
	private $link;
	public function __construct()
	{
	}
	public function Print($category = "")
	{
		try
		{
			$post = $this->getContent($category);
			if(!$post)
			{
				return false;
			}
			$this->link .="/articles/?post=";
			while($content=$post->fetch_row()) //$content[0] hold the id of current post.
			{
				$number = 1;
				print(
					"<span id=\"title_number_$number\" class=\"post_title\"><a href=\"".$this->link.$content[0]."\" class=\"linkFullDisplay\">".$content[4]."</a></span>
					<span id=\"post_number_$number\" class=\"post\">".$content[1]."</span>");
				$number++;
			}
		}
		catch (Exception $e)
		{	
			if($e->getMessage()==1054)
			{
				echo "<span class=\"info\">Brak postow z kategorii: $category</span>";
			}
			else
			{
			require_once("config/contactData.php");
			echo "<span id=\"error\">Błąd bazy danych, kod błędu: ". $e->getMessage().".<br> Skontaktuj się z administratorem strony:<br> ".$contactConfig["email"]."</span>";
			}
		}

	}
}
?>