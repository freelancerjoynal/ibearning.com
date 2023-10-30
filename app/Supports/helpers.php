<?php

if (!function_exists('formatOrderNumber')) {
    /*
     * Format an order number to look like VRN000007643
    */
    function imageUpload($image , $serial)
    {
            $image = $image;
            $clientFileName = $image;
            $fileExtention = explode('.' , $clientFileName);
            $imageLocation = 'public/uploads/'.uniqid().$serial.time().'.webp';
            $fileExtention = $fileExtention['1'];

            if($fileExtention == 'png'){
                $img = imagecreatefrompng($image);
                imagepalettetotruecolor($img);
                imagealphablending($img , true);
                imagesavealpha($img, true);
                imagewebp($img, $imageLocation ,60  );
            
            }else if($fileExtention == 'jpg' || $fileExtention == 'jpeg')
            {
                $img = imagecreatefromjpeg($image);
                imagepalettetotruecolor($img);
                imagealphablending($img , true);
                imagesavealpha($img, true);
                imagewebp($img, $imageLocation ,60  );
            }
                $fileUrl = $imageLocation;
                return $fileUrl;
    }
}