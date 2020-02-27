<form method="post" action="">
<?php
/*$select = new CategoryNames;
$select->printInSelect();*/
?>
<input type="text" name="title" placeholder="Tytuł" id="post_title_input" class="input"/>
<div id="post_content_div" name="post_content" contenteditable="true"></div>
<input type="file" name="post_file" />
<input type="button" value="Podgląd" /> <!-- TODO JS -->
<input type="submit" value="dodaj" />
</form>

<!-- 
<input type="button" value="Edytuj" onclick=""> Edycja TODO

 -->