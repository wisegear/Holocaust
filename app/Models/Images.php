<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;
use File;

class Images extends Model
{
    use HasFactory;
	protected $table = 'images';

	public static function ProcessImage($new_image)
	{
	    // Get the new image and assign it to $file.
	    $image = $new_image;

	    // Assign unique file name to the new image.
	    $image_name = time() . '-' . $image->getClientOriginalName();

	    // Move the file to the Media image directory.
	    $image->move(public_path() . '/images/media/', $image_name);

	    //Resize the image, note I use sprintf, different strokes...
	    $resize = Image::make(sprintf(public_path() . '/images/media/' . '%s', $image_name))
	                ->resize(null, 300, function ($constraint) {
	                        $constraint->aspectRatio();
	                    })
	                ->save(public_path() . '/images/media/' . $image_name);
	    return $image_name;
	}
}