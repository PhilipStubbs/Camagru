


function decodeimage(data)
{
	ret = "<img style='width: 70%; height: 100%; object-fit: contain' alt=Embedded Image src=\"data:"+type+";base64,"+data+"\" />";
	src = "data:image/jpeg;base64,"+data+"\"";
	var post = document.createElement('img');

	post.setAttribute("src", src);
	post.setAttribute("alt", src);
	post.setAttribute("class", 'homepage_posts');
	homepage.insertBefore(post, homepage.firstChild);
}



function Ajaxcomment(){

	//make an ajax call and get status value using the same 'id'
	var modalImg = document.getElementById("img01");
	var text = document.getElementById('the_comment').value
	// console.log(src);
	$.ajax({
	
			type:"POST",//or GET
			url:'./Content/like_comment_delete.php',
							   //  (or whatever your url is)
			data:{'action':'comment',
					'image_id':modalImg.alt,
					'comment':text},
			//can send multipledata like {data1:var1,data2:var2,data3:var3
			//can use dataType:'text/html' or 'json' if response type expected 
			success:function(responsedata){
				   // process on data
				   alert("comment posted!");
	
			}
		 })
	
	}

function Ajaxlike(){

	//make an ajax call and get status value using the same 'id'
	var modalImg = document.getElementById("img01");
	// console.log(src);
	$.ajax({
	
			type:"POST",//or GET
			url:'./Content/like_comment_delete.php',
							   //  (or whatever your url is)
			data:{'action':'like',
					'image_id':modalImg.alt},
			//can send multipledata like {data1:var1,data2:var2,data3:var3
			//can use dataType:'text/html' or 'json' if response type expected 
			success:function(responsedata){
				   // process on data
				   alert("Liked!");
	
			}
		 })
	
	}

	function Ajaxdelete(){

		//make an ajax call and get status value using the same 'id'
		var modalImg = document.getElementById("img01");
		// console.log(src);
		$.ajax({
		
				type:"POST",//or GET
				url:'./Content/like_comment_delete.php',
								   //  (or whatever your url is)
				data:{'action':'delete',
						'image_id':modalImg.alt},
				//can send multipledata like {data1:var1,data2:var2,data3:var3
				//can use dataType:'text/html' or 'json' if response type expected 
				success:function(responsedata){
					   // process on data
					   alert("Liked!");
		
				}
			 })
		
		}
	

// https://www.youtube.com/watch?v=ejN-oAw9vC0