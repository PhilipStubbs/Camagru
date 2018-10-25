
function decodeimage(data)
{
	$ret = "<img style='width: 70%; height: 100%; object-fit: contain' alt=Embedded Image src=\"data:"+type+";base64,"+data+"\" />";
	src = "data:image/jpeg;base64,"+data+"\"";
	var post = document.createElement('img');

	post.setAttribute("src", src);
	post.setAttribute("alt", src);
	post.setAttribute("class", 'homepage_posts');
	homepage.insertBefore(post, homepage.firstChild);
}



// https://www.youtube.com/watch?v=ejN-oAw9vC0