 var quill = new Quill('#editor', {
    theme: 'snow'
 });
function copyFromEditorToTA()
{
	let content = document.getElementsByClassName("ql-editor");
	document.getElementById("hiddeninput").value = content[0].innerHTML;
}