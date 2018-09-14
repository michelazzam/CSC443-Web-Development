var image=document.getElementById("image");
image.onmouseover=function(){
	 document.getElementById('message').innerHTML = 'this is charbel';
}

var text=document.getElementById("text");
text.onclick=function(){
	text.innerHTML = 'this is a paragraph';
}

var table=document.getElementById("table");
table.onmouseenter=function(){
	 table.innerHTML = 'this is a table';
}
