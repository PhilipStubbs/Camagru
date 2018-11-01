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

	

	var canvas = document.getElementById("myCanvas");
	var ctx = canvas.getContext("2d");

	var img = new Image();
		img.src = loc;

		console.log(loc);
		console.log(img.width);
		console.log(img.height);

		

		 console.log(canvas.width);
		 console.log(canvas.height);
		//  img.width = canvas.width;
		//  img.height = canvas.height ;

		var hRatio = img.width / canvas.width ;
		var vRatio = img.height / canvas.height ;
		var ratio  = Math.min ( hRatio, vRatio );

		ctx.drawImage(img, 0,0, canvas.width, canvas.height);
	// var info = "test";
	// console.log(info);
	// var sticker = document.createElement('img');

	// sticker.setAttribute("src", loc);
	// sticker.setAttribute("alt", loc);
	// sticker.setAttribute("class", 'overlayImage');
	// mainview.insertBefore(sticker, mainview.firstChild);
}


function Ajaxsubmit(){

	var canvas = document.getElementById("myCanvas");
	var jpeg = canvas.toDataURL("image/jpeg");
	console.log(jpeg);
	$.ajax({
	
			type:"POST",
			url:'./Content/image_to_db.php',
			
			data:{'action':'submit',
					'image_final':jpeg},
			//can send multipledata like {data1:var1,data2:var2,data3:var3
			//can use dataType:'text/html' or 'json' if response type expected 
			success:function(responsedata){
				   // process on data
				   alert("Submited posted!");
	
			}
		 })
	
	}
