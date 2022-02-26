<form enctype="multipart/form-data" encoding='multipart/form-data' method='post' action="">
  <input name="uploadedfile" type="file" value="choose">
  <input type="submit" value="Upload">
</form>

<?php

$draw = new \ImagickDraw();
$draw->setStrokeColor('Green');
$draw->setFillColor('Red');
$draw->setStrokeWidth(7);
$draw->rectangle(40, 30, 200, 260);
  
// Create an image object which the draw
// commands can be rendered into
$image = new \Imagick();
$image->newImage(300, 300, 'White');
$image->setImageFormat("png");
  
// Render the draw commands in the ImagickDraw object 
// into the image.
      
$image->drawImage($draw);
  
// Send the image to the browser
header("Content-Type: image/png");
echo $image->getImageBlob();

?>

<?php
if ( isset($_FILES['uploadedfile']) ) {
 $filename  = $_FILES['uploadedfile']['tmp_name'];
    
    echo '<pre>';
 print_r($_FILES);
    echo '</pre>';
echo '<pre>';
    
echo base64_encode(file_get_contents($filename));
    
echo '</pre>';
  
  phpinfo();
}
?>
