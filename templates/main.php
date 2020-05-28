<!DOCTYPE html5>
<html>
<body>
<div id="logo">
	<a href="http://localhost/refleksjologia" class="linkFullDisplay logo">REFLEKSOLOGIA</a></div>
<ul id="main_menu">
<?php 
include("menu.php");
?>
</ul>
<div id="main_div">
	<span id="news"></span>
	<pre>
	<?php 
	$controller = $router->getControllerName();
	$controller = new $controller;
	$controller->setView($router->getSubSiteName(), $router->getViewName());
	$controller->setModel($router->getSubSiteName(), $router->getModelName());
	$controller->showContent();
	$controller->doThings();
	$included_files = get_included_files();

foreach ($included_files as $filename) {
    echo "$filename\n";
}
print_r(get_defined_vars());
	?>
</pre>
</div>
<div id="right_div">
	<h1>Panel boczny</h1>
</div>
<div id="footer">Stopka</div>
</body>
</html>