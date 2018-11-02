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

	ctx.drawImage(img, 0,0, canvas.width, canvas.height);

}


function Ajaxsubmit(){

	var canvas = document.getElementById("myCanvas");
	var jpeg = canvas.toDataURL("image/jpeg");
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
				   window.location = "index.php";
	
			}
		 })
	
	}
