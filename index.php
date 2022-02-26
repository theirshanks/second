<form enctype="multipart/form-data" encoding='multipart/form-data' method='post' action="">
  <input name="uploadedfile" type="file" value="choose">
  <input type="submit" value="Upload">
</form>
<?php
if ( isset($_FILES['uploadedfile']) ) {
 $filename  = $_FILES['uploadedfile']['tmp_name'];
    
    echo '<pre>';
 print_r($_FILES);
    echo '</pre>';
echo '<pre>';
    
echo base64_encode(file_get_contents($filename));
    
echo '</pre>';
}
?>
