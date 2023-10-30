<?php

namespace App\Providers;

use App\Models\siteDetail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        $app = siteDetail::first();
        View::share('applicationDetails', $app);


            function imageUpload($image )
            {
                    $image = $image;
                    $clientFileName = $image->getClientOriginalName();
                    $fileExtention = explode('.' , $clientFileName);
                    $imageLocation = 'public/uploads/'.uniqid().time().'.webp';
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
}
