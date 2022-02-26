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
  
function optimize($filePath) 
{
    $imagick        = new Imagick();

    $rawImage = file_get_contents($filePath);

    $imagick->readImageBlob($rawImage);
    $imagick->stripImage();

    $width      = $imagick->getImageWidth();
    $height     = $imagick->getImageHeight();

    $imagick->setImageCompressionQuality(85);

    $image_types = getimagesize($filePath);

    $imagick->thumbnailImage($width, $height);

    if ($image_types[2] === IMAGETYPE_JPEG)
    {
        $imagick->setImageFormat('jpeg');

        $imagick->setSamplingFactors(array('2x2', '1x1', '1x1'));

        $profiles = $imagick->getImageProfiles("icc", true);

        $imagick->stripImage();

        if(!empty($profiles)) {
            $imagick->profileImage('icc', $profiles['icc']);
        }

        $imagick->setInterlaceScheme(Imagick::INTERLACE_JPEG);
        $imagick->setColorspace(Imagick::COLORSPACE_SRGB);
    }
    else if ($image_types[2] === IMAGETYPE_PNG) 
    {
        $imagick->setImageFormat('png');
    }
    else if ($image_types[2] === IMAGETYPE_GIF) 
    {
        $imagick->setImageFormat('gif');
    }

    $rawData = $imagick->getImageBlob();

    $imagick->destroy();

    return $rawData;
  
  echo "Function Executed";
}
  
  
  
  
$optimized = optimize($filename);
  
print_r($filename);
  
  
  
  
  
 
}
?>
