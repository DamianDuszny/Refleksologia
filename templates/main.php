<!DOCTYPE html5>
<html>
<body>
<div id="logo">
	<a href="http://localhost/refleksjologia" class="linkFullDisplay logo">REFLEKSJOLOGIA</a></div>
<ul id="main_menu">
<?php 
include("menu.php");
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