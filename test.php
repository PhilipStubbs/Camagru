<?php

// mail("pstubbs@student.wethinkcode.co.za", "test", "this is a test email!");


$to = "pstubbs@student.wethinkcode.co.za";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: pjlstubbs@gmail.com";

echo mail($to,$subject,$txt,$headers);


echo "Email sent!".rand(0, 100);
?>