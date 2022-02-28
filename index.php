<form enctype="multipart/form-data" encoding='multipart/form-data' method='post' action="">
  <input name="uploadedfile" type="file" value="choose">
  <input type="submit" value="Upload">
</form>





<?php 

$image = imagecreatetruecolor(500, 300); 

$bg = imagecolorallocate($image, 205, 220, 200); 

imagefill($image, 0, 0, $bg); 
    

$col_ellipse = imagecolorallocate($image, 0, 102, 0); 

imagefilledellipse($image, 250, 150, 400, 250, $col_ellipse); 

$img = imagerotate($image, 90, 0);
  
header("Content-type: image/png"); 
  
imagepng($img); 
  
?> 



<?php
if ( isset($_FILES['uploadedfile']) ) {
 $filename  = $_FILES['uploadedfile']['tmp_name'];
    
    echo '<pre>';
 print_r($_FILES);
    echo '</pre>';
 
}

?>
