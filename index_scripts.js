
function addSticker(loc)
{
	var info = "test";
	console.log(info);
	var sticker = document.createElement('img');

	sticker.setAttribute("src", loc);
	sticker.setAttribute("alt", loc);
	sticker.setAttribute("class", 'overlayImage');
	mainview.insertBefore(sticker, mainview.firstChild);
}


// https://www.youtube.com/watch?v=ejN-oAw9vC0