function sendArticleDataToEditor(id, title, category)
{
	let text = document.getElementsByClassName("article")[0].innerHTML;
	  const form = document.createElement('form');
  form.method = "post";
  form.action = "edytuj_artykul";
  let params = {"text": text, "articleId": id, "title": title, "category": category};
  console.log(params);
  for (const key in params) {
    if (params.hasOwnProperty(key)) {
      const hiddenField = document.createElement('input');
      hiddenField.type = 'hidden';
      hiddenField.name = key;
      hiddenField.value = params[key];

      form.appendChild(hiddenField);
    }
  }
  document.body.appendChild(form);
  form.submit();
}