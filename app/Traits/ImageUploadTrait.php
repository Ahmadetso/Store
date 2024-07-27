<?php

namespace App\Traits;

use Exception;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait ImageUploadTrait
{
    protected $image_path = "app/public/image/cover";
    protected $img_height = 600;
    protected $img_width = 600;

    public function uploadImage($img)
    {
        $imageManager = new ImageManager(new Driver());
        $img_name = $this->imageName($img);
        $image = $imageManager->read($img)->resize($this->img_width, $this->img_height);

        $path = storage_path($this->image_path);
      
        $image->save($path . '/' . $img_name);

        return 'image/cover/' . $img_name;
    }

    public function imageName($image)
    {
        return time() . '-' . $image->getClientOriginalName();
    }
}
