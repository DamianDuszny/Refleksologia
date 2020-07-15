<!DOCTYPE html5>
<html>
<body>
<div id="logo">
	<a href="http://localhost/refleksologia" class="linkFullDisplay logo">REFLEKSOLOGIA</a></div>
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
	$controller = new $controller($db);
	$controller->setView($router->getSubSiteRoute(), $router->getViewName());
	$controller->setModel($router->getSubSiteRoute(), $router->getModelName());
	$controller->doThings();
	$included_files = get_included_files();
	foreach ($included_files as $filename) {
    echo "$filename\n";
}
/*	
print_r(get_defined_vars());*/
	?>
</pre>
</div>
<div id="right_div">
	<h1>Panel boczny</h1>
</div>
<div id="footer">Stopka</div>
</body>
</html>