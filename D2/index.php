<?php
function addWatermark($imagePath, $watermarkPath, $outputPath) {
    $image = imagecreatefromjpeg($imagePath);
    $watermark = imagecreatefrompng($watermarkPath);

    $imageWidth = imagesx($image);
    $imageHeight = imagesy($image);
    $watermarkWidth = imagesx($watermark);
    $watermarkHeight = imagesy($watermark);

    $x = $imageWidth - $watermarkWidth - 10;
    $y = 10;

    imagecopy($image, $watermark, $x, $y, 0, 0, $watermarkWidth, $watermarkHeight);
    imagejpeg($image, $outputPath);

    imagedestroy($image);
    imagedestroy($watermark);
}

addWatermark('image.jpg', 'logo.png', 'output.jpg'); // Replace with actual file paths
?>
