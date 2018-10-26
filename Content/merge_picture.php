<?php

function resizePng($im, $dst_width, $dst_height) {
	$width = imagesx($im);
	$height = imagesy($im);

	$newImg = imagecreatetruecolor($dst_width, $dst_height);

	imagealphablending($newImg, false);
	imagesavealpha($newImg, true);
	$transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
	imagefilledrectangle($newImg, 0, 0, $width, $height, $transparent);
	imagecopyresampled($newImg, $im, 0, 0, 0, 0, $dst_width, $dst_height, $width, $height);

	return $newImg;
}

// Multiply the number by the percent (e.g. 87 * 68 = 5916)
// Divide the answer by 100 (Move decimal point two places to the left) (e.g. 5916/100 = 59.16)
// Round to the desired precision (e.g. 59.16 rounded to the nearest whole number = 59)

function merge_picture($destImage, $sourceImage, $outputloc, $src_xPosition , $src_yPosition)
{
	// list($srcWidth, $srcHeight) = getimagesize($sourceImage);
	$dest = imagecreatefromjpeg($destImage);
	$resize_Width = imagesx($dest);
	$resize_Height = imagesy($dest);

	// $resize_Height = round($resize_Height);
	$_SESSION['message'] = $resize_Width. " and ".$resize_Height;

	$tmp = imagecreatefrompng($sourceImage);
	$src = resizePng($tmp, 500 , 700); 
	
	// list($srcWidth, $srcHeight) = getimagesize($src);
	$srcWidth = imagesx($src);
	$srcHeight = imagesy($src);

	$src_cropXposition = 0;
	$src_cropYposition = 0;
							
	imagecopy($dest,$src,$src_xPosition,$src_yPosition,$src_cropXposition,$src_cropYposition,$srcWidth,$srcHeight);
	imagejpeg($dest,$outputloc,100);
}

// http://consistentcoder.com/combine-a-transparent-png-image-on-top-of-another-image-with-php



function test($dest, $src, $outputloc)
{
	
	$stamp = imagecreatefrompng($src);
	$im = imagecreatefromjpeg($dest);
	$stw = imagesx($im);
	$marge_bottom = 0;
	$marge_right = 0;

	$sx = imagesx($stamp);
	$sy = imagesy($stamp);
	imagecopyresampled($im, $stamp, $marge_right, $marge_bottom, 0, 0, $stw, $stw, imagesx($stamp) + 471, imagesy($stamp) + 471);
	$_SESSION['message'] = $stw;

	// header("Content-Type: image/jpeg");
	imagejpeg($im, $outputloc,100);
}
?>

