<form enctype="multipart/form-data" encoding='multipart/form-data' method='post' action="form.php">
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
    
    /*
 $handle    = fopen($filename, "r");
 $data      = fread($handle, filesize($filename));
 $POST_DATA = array(
   'file' => "this is user file provided"
 );
 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, "http://localhost/ajaxphp/FINALBACKUP/PHP-CURL/handle.php");
 curl_setopt($curl, CURLOPT_TIMEOUT, 30);
 curl_setopt($curl, CURLOPT_POST, 1);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curl, CURLOPT_POSTFIELDS, $POST_DATA);
 $response = curl_exec($curl);
 curl_close ($curl);
 echo $response;
 */
}
?>
