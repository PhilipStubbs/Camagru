<?php
	$actual_link = "$_SERVER[HTTP_HOST]";
	if ($actual_link == "localhost:8080")
		echo '<base href="http://localhost:8080/">';
	if ($actual_link == "philipstubbs.co.za")
		echo '<base href="https://philipstubbs.co.za/"> ';

?>