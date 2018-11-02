function addSticker(loc)
{
	var canvas = document.getElementById("myCanvas");
	var sticker = document.createElement('img');

	sticker.width = canvas.width / 2;
	sticker.height = canvas.height / 2;
	sticker.style.position ='absolute';

	sticker.setAttribute("src", loc);
	sticker.setAttribute("alt", loc);
	mainview.insertBefore(sticker, mainview.firstChild);
}