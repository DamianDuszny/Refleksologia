	<li class="sub_menu"><a href='#'>opcja 1</a></li>
	<li class="sub_menu"><a href="about">O refleksjologii</a></li>
	<li class="sub_menu"><a href="kontakt">Kontakt</a></li>
	<?php 
	function createLi($href, $text)
	{
		return "<li class=\"sub_menu\"><a href=\"$href\">$text</a></li>";
	}
	if(isset($_SESSION["user"]))
	{
		if($_SESSION["permission_level"]>10)
		{
			echo 
				createLi("dodaj_artykul", "Dodaj post");
		}
		echo 
		createLi("?logout=true", "Wyloguj");
	}
	else
	{
		echo
		createLi("login", "Zaloguj");
	}
	?>