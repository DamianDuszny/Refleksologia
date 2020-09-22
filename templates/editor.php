<form method="post" action="dodaj_artykul?add=true" id="editor_form">
<input type="text" name="title" placeholder="Tytuł" id="article_title" style="width: 100%; height: 70px; font-size: 30px; text-align: center" />
<select id="category_select" name="category">
	
</select>
<div id="test"></div>
<div id="editor">
	test
</div>
<textarea id="hiddeninput" class="hiddeninput" name="post_content"></textarea>
<input type="number" class="hiddeninput" name="article_id" id="article_id_hidden" />
<input type="text" class="hiddeninput" name="edit" id="edit_hidden_input" />
<input type="submit" value="dodaj" onclick="copyFromEditorToTA()" /> 
</form>
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="javascript/addArticle.js"></script>

<!-- <form method="post" action="dodaj_artykul?add=true">
<input type="text" name="title" placeholder="Tytuł" id="post_title_input" class="input"/>
<div id="post_content_div" name="post_content" contenteditable="true"></div>
<input type="file" name="post_file" />
<input type="button" value="Podgląd" /> TODO JS
<input type="submit" value="dodaj" /> 
</form> -->

<!-- 
<input type="button" value="Edytuj" onclick=""> Edycja TODO

 -->