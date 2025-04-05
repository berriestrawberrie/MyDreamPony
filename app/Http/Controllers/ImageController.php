<?php

namespace App\Http\Controllers;

use App\Models\Buildpony;
use App\Models\Item;
use App\Models\Pony;
use App\Models\SpecialTrait;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;





class ImageController extends Controller
{
    public function fileUpload()
    {
        return view('image-upload');
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048'
        ]);
        //upload functionality
        $image = $request->file('image');

        //Generate the unique image name
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        //Upload Image move function will move the file in our directory
        $image->move('uploads', $imageName);


        //Resizing image using intervention
        // create new manager instance with desired driver and default configuration
        $imgManager = new ImageManager(new Driver());

        // Reading uploaded image from local file system (uploads)
        $thumbImage = $imgManager->read('uploads/' . $imageName);


        //Resize the image
        $thumbImage->resize(250, 250);




        //store the resized image in a different directory
        $response = $thumbImage->save(public_path('uploads/thumbnails/' . $imageName));


        //We can store the image in database but not shown here

        if ($response) {
            return back()->with('success', 'Image uploaded and resized');
        } else {
            return back()->with('error', 'Image uploaded and resized.');
        }
    }

    //GENERATE PONY IMAGE FROM DB IMAGE USINGID
    public function getPony($ponyID)
    {
        //get the trait image data by ponytype and sex
        $rendered_buffer = Pony::where('ponyid', $ponyID)->get();
        $img = $rendered_buffer[0]["image"];
        return response($img)
            ->header('Content-Type', 'image/png')
            ->header('Cache-Control', 'max-age=2592000');
    }

    public function getTrait($type, $traitid)
    {
        //get the trait image data by ponytype and sex
        $rendered_buffer = SpecialTrait::where('traitid', $traitid)->get();
        $check = '"' . $type . '"';
        $img = $rendered_buffer[0][$check];

        return response($img)
            ->header('Content-Type', 'image/png')
            ->header('Cache-Control', 'max-age=2592000');
    }

    public function getBreedIcon($breed)
    {
        //get the trait image data by ponytype and sex
        $rendered_buffer = Buildpony::where('typeName', $breed)->get();
        $img = $rendered_buffer[0]["icon"];

        return response($img)
            ->header('Content-Type', 'image/png')
            ->header('Cache-Control', 'max-age=2592000');
    }


    public function getItem($itemid, $type)
    {
        //get image id data by image id
        $rendered_buffer = Item::where('itemid', $itemid)->get();
        $img = $rendered_buffer[0][$type];
        return response($img)
            ->header('Content-Type', 'image/png')
            ->header('Cache-Control', 'max-age=2592000');
    }
}
