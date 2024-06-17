<?php
session_start();

$code = '';
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
for ($i = 0; $i < 5; $i++) {
  $code .= $characters[mt_rand(0, strlen($characters) - 1)];
}

$_SESSION['captcha'] = $code;

$width = 100;
$height = 40;
$image = imagecreatetruecolor($width, $height);

$bg_color = imagecolorallocate($image, 255, 255, 255);
$fg_color = imagecolorallocate($image, 0, 0, 0);

imagefilledrectangle($image, 0, 0, $width, $height, $bg_color);

$font = __DIR__ . '/fonts/arial.ttf';
imagettftext($image, 20, 0, 10, 30, $fg_color, $font, $code);

header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>