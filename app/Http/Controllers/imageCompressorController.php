<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class imageCompressorController extends Controller
{
    function imageUpload($image , $serial)
    {
            $image = $image;
            $clientFileName = $image->getClientOriginalName();
            return $fileExtention = explode('.' , $clientFileName);
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
