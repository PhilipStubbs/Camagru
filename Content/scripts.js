function video()
{
	var stream;
	var video = document.getElementById('MediaStreamVideo');
	
	navigator.webkitGetUserMedia(
		{video: true, audio: true}, // Options
		function(localMediaStream) { // Success
			stream = localMediaStream;
			video.src = window.webkitURL.createObjectURL(stream);
		},
		function(err) { // Failure
			alert('getUserMedia failed: Code ' + err.code);
		}
	);
}

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

window.onload = function()
{
var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext('2d');

var image = document.getElementById("theimg");
ctx.drawImage(image,0,0);
}



// https://www.youtube.com/watch?v=ejN-oAw9vC0