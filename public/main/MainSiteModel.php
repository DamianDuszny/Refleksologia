<?php
class MainSiteModel
{
	protected $articlesController;
		public function __construct()
		{
			$this->articlesController = new ArticlesController("new");
		}
}
?>