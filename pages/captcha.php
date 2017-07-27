<?php
session_start();
header ("Content-type: image/png");
$captcha = "Captcha : ".$_SESSION['captcha'];

$image = imagecreate(200,50);

$orange = imagecolorallocate($image, 255, 128, 0); // Le fond est orange (car c'est la premi�re couleur)
$bleu = imagecolorallocate($image, 0, 0, 255);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);

imagestring($image, 4, 35, 15, $captcha, $noir);
imagecolortransparent($image, $orange); // On rend le fond orange transparent

imagepng($image);
?>