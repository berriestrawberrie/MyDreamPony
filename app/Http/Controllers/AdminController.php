<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buildpony;
use App\Models\SpecialTrait;
use GuzzleHttp\Psr7\UriResolver;

class AdminController extends Controller
{
    //
    public function indeximage()
    {
        $buildponys = Buildpony::all();

        return view('admins.indeximage', ['buildponys' => $buildponys]);
    }

    public function getGD($user, $imageID, $type)
    {
        //get the pony data by pony structure ID
        $rendered_buffer = Buildpony::all()->find($imageID);
        $img = $rendered_buffer[$type];
        file_put_contents(public_path('storage/users/' . $user . '_tester.png'), $img);
        $img2 = imagecreatefrompng(public_path('storage/users/tester.png'));
        imageAlphaBlending($img2, true);
        imageSaveAlpha($img2, true);
        imagefilter($img2, IMG_FILTER_COLORIZE, 255, 255, 0);
        imagepng($img2, public_path('storage/users/' . $user . 'tester2.png'));

        //DESTROY 
        imagedestroy($img2);

        return view('generator');
    }


    public function getImage($imageID, $type)
    {
        //get the pony data by pony structure ID
        $rendered_buffer = Buildpony::all()->find($imageID);
        $img = $rendered_buffer[$type];

        //return an image and cache it so it doesn't have to read db every time
        return response($img)
            ->header('Content-Type', 'image/png')
            ->header('Cache-Control', 'max-age=2592000');
    }


    public function adminhome()
    {
        $buildponys = Buildpony::all();
        return view('admins.index', ['buildponys' => $buildponys]);
    }

    public function tester()
    {
        return view('section');
    }

    public function tester2()
    {
        $traits = SpecialTrait::where('traitid', "0")->get();

        dd($traits[0]["Unicorn"]);
    }

    public function signup()
    {
        return view('templates.signup');
    }

    public function generator(Request $request)
    {
        $buildponys = Buildpony::all();
        return view('admins.generator', ['buildponys' => $buildponys]);
    }


    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'typeName' => 'required',
            'affinity' => 'required',
            'sex' => 'required',
            'created' => 'required',
            'eyeCol' => 'nullable',
            'white' => 'nullable',
            'ink' => 'nullable',
            'mask' => 'nullable',
            'shade' => 'nullable',
            'accentCol' => 'nullable',
            'accentCol2' => 'nullable',
            'leg-sock' => 'nullable',
            'baseCol' => 'nullable',
            'hairCol' => 'nullable',
            'charm' => 'integer|lte:20',
            'intel' => 'integer|lte:20',
            'str' => 'integer|lte:20',
            'hp' => 'integer|lte:20',
        ]);

        $newPony = BuildPony::create($data);
        return redirect(route('admin'))->with('success', 'You added a new pony type!');
    }

    public function colors()
    {

        //USING BUILD PONY MODEL GET DRAGON AND RETURN AS COLLECTION OBJECT
        $obj = BuildPony::where('typeName', 'Dragon')->get();
        //dd($obj);
        /* $baseCol =  $obj[0]["baseCol"];
        $eyeCol =  $obj[0]["eyeCol"];
        $hairCol =  $obj[0]["hairCol"];
        $accentCol =  $obj[0]["accentCol"];


        //CREATE TRANSPARENT GD IMAGE
        $imb = imagecreatefrompng($baseCol);
        imageAlphaBlending($imb, true);
        imageSaveAlpha($imb, true);
        $ime = imagecreatefrompng($eyeCol);
        imageAlphaBlending($ime, true);
        imageSaveAlpha($ime, true);
        $imh = imagecreatefrompng($hairCol);
        imageAlphaBlending($imh, true);
        imageSaveAlpha($imh, true);
        $ima = imagecreatefrompng($accentCol);
        imageAlphaBlending($ima, true);
        imageSaveAlpha($ima, true);


        //COLORIZE THE IMAGE
        imagefilter($imb, IMG_FILTER_COLORIZE, 255, 255, 0);
        imagefilter($ime, IMG_FILTER_COLORIZE, 0, 255, 199);
        imagefilter($imh, IMG_FILTER_COLORIZE, 0, 255, 0);
        imagefilter($ima, IMG_FILTER_COLORIZE, 140, 255, 143);



        //GENERATE THE PUBLI PATH
        $storebase = public_path('storage/' . 'basecolor.png');
        $storeeye = public_path('storage/' . 'eyecolor.png');
        $storehair = public_path('storage/' . 'haircolor.png');
        $storeaccent = public_path('storage/' . 'accentcolor.png');


        //STORE IN PUBLIC STORE FOLDER THIS WILL OVERWRITE NEW CHANGES
        imagepng($imb, $storebase);
        imagepng($ime, $storeeye);
        imagepng($imh, $storehair);
        imagepng($ima, $storeaccent);

        //DESTROY 
        imagedestroy($imb);
        imagedestroy($imh);
        imagedestroy($ime);
        imagedestroy($ima);

        */

        return view('admins.admincolor', ['obj' => $obj]);
    }
}
