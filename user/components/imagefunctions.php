<?php
function createThumbs($pathToThumbs, $thumbHeight, $fname,$thumbname)
{
$info = pathinfo($fname);

if ( strtolower($info['extension']) == 'jpg' )
$img = imagecreatefromjpeg( "{$fname}" );
if ( strtolower($info['extension']) == 'gif' )
$img = imagecreatefromgif( "{$fname}" );
if ( strtolower($info['extension']) == 'png' )
$img = imagecreatefrompng( "{$fname}" );

$width = imagesx( $img );
$height = imagesy( $img );

$new_height = $thumbHeight;
$new_width = floor( $width * ( $new_height / $height ) );

$tmp_img = imagecreatetruecolor( $new_width, $new_height );

imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

if ( strtolower($info['extension']) == 'jpg' )
imagejpeg( $tmp_img, "{$pathToThumbs}{$thumbname}" );
if ( strtolower($info['extension']) == 'gif' )
imagegif( $tmp_img, "{$pathToThumbs}{$thumbname}" );
if ( strtolower($info['extension']) == 'png' )
imagepng( $tmp_img, "{$pathToThumbs}{$thumbname}" );
}

function imagemerge($image1,$image2,$sizeW,$sizeH,$targetfile)
{
$image="images/white.jpg";
list($width1, $height1) = getimagesize($image1);
list($width2, $height2) = getimagesize($image2);

$aW1 = $width1;
$aH1 = $height1;

$aW2 = $width2;
$aH2 = $height2;

$info1 = pathinfo($image1);
$info2 = pathinfo($image2);

if ( strtolower($info1['extension']) == 'jpg' )
$photo = imagecreatefromjpeg($image1);
if ( strtolower($info1['extension']) == 'gif' )
$photo = imagecreatefromgif($image1);
if ( strtolower($info1['extension']) == 'png' )
$photo = imagecreatefrompng($image1);

if ( strtolower($info2['extension']) == 'jpg' )
$photo2 = imagecreatefromjpeg($image2);
if ( strtolower($info2['extension']) == 'gif' )
$photo2 = imagecreatefromgif($image2);
if ( strtolower($info2['extension']) == 'png' )
$photo2 = imagecreatefrompng($image2);

$photoFrame = imagecreatefromjpeg($image);
$fx1=($sizeW-$aW1)/2;
$fy1=($sizeH-$aH1)/2;

$fx2=$sizeW+($sizeW-$aW2)/2;
$fy2=($sizeH-$aH2)/2;

imagecopyresampled($photoFrame, $photo, $fx1, $fy1, 0, 0, $aW1, $aH1, $aW1, $aH1);
imagecopyresampled($photoFrame, $photo2, $fx2, $fy2, 0, 0, $aW2, $aH2, $aW2, $aH2);
imagejpeg($photoFrame, $targetfile);
}
?>