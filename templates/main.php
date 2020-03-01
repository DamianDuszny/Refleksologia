<!DOCTYPE html5>
<html>
<body>
<div id="logo">
	<a href="http://localhost/refleksjologia" class="linkFullDisplay logo">REFLEKSJOLOGIA</a></div>
<ul id="main_menu">
	<li class="sub_menu"><a href='#'>opcja 1</a></li>
	<li class="sub_menu"><a href="about">O refleksjologii</a></li>
	<li class="sub_menu"><a href="dodaj_artykul">Dodaj post</a></li>
	<li class="sub_menu"><a href="kontakt">Kontakt</a></li>
	<?php 
	if(isset($_SESSION["user"]))
	{
		echo 
		"<li class=\"sub_menu\"><a href=\"konto\">Moje konto</a></li>";
	}
	else
	{
		echo
		"<li class=\"sub_menu\"><a href=\"login\">Zaloguj</a></li>";
	}
	?>
</ul>
<div id="main_div">
	<?php 
	$controller = $router->getControllerName();
	$controller = new $controller;
	$controller->setView($router->getSubSiteName(), $router->getViewName());
	$controller->setModel($router->getSubSiteName(), $router->getModelName());

	$controller->showContent();
	$controller->doThings();
	?>
</div>
<div id="right_div">
	<h1>Panel boczny</h1>
</div>
<div id="footer">Stopka</div>
</body>
</html>