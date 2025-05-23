<?php

namespace App\Http\Controllers;

use App\Models\Buildpony;
use App\Models\Pony;
use App\Models\SpecialTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mexitek\PHPColors\Color;

class GenController extends Controller
{

    //NEWEST FUNCTIONS THAT HAVE BEEN REWORKED
    public function reponygenform()
    {
        //VERIFY USER IS LOGGED IN FIRST
        if (Auth::check()) {
            $user = Auth::User();
            $traits = SpecialTrait::all();
            $buildponys = Buildpony::all();
            return view('REDESIGN.ponygen', compact('user', 'traits', 'buildponys'));
        }
        return view('REDESIGN.home');
    } //END OF REPONYGENFORM

    public function reponygen(Request $request)
    {

        $damcolors = ["baseCol", "eyeCol", "hairCol", "hairCol21", "accentCol", "accentCol21"];
        $sirecolors = ["baseCol2", "eyeCol2", "hairCol2", "hairCol22", "accentCol2", "accentCol22"];
        $babycolors = [];
        //ALL CURRENTLY AVAILABLE TRAITS
        $hairs = ["streak", "hfade", "hrainbow"];
        $faces = ["blaze", "ffade", "fvulpine"];
        $none = ["none"];
        $bodys = ["paint"];
        $uncolored = ["hrainbow", "fvulpine"];

        //RETRIEVE THE GENERATOR PONY SEX
        $sex = $request->input("sex");

        //RETRIEVE THE GENERATOR BREEDS
        $sirebreed = $request->input("typeName1");
        $dambreed = $request->input("typeName2");
        if ($sirebreed == $dambreed) {
            $babybreed = $sirebreed;
        } else {
            $choose = [$sirebreed, $dambreed];
            $babybreed = $choose[rand(0, 1)];
        }

        //DETERMINE THE BABY TRAIT OR TRAITS
        $carry = [];
        $damtrait = $request->input("specialtrait1");
        $siretrait = $request->input("specialtrait2");
        if ($damtrait == $siretrait) {
            $babytrait = $damtrait;
        } else {
            $carry = [$damtrait, $siretrait];
            $carryID = [];
            //DETERMINE THE CARRY CODES FOR CARRIED  GENES
            foreach ($carry as $i) {
                $special = SpecialTrait::where('traitname', $i)->get();
                $specialId = $special[0]["carry"];
                array_push($carryID, $specialId);
            } //END FOREACH
            $babytrait = false;
        }

        //GENERATE THE BABY COLOR MIX RANDOM
        for ($i = 0; $i < count($sirecolors); $i++) {
            $hex1 = $request->input($sirecolors[$i]);
            $hex2 = $request->input($damcolors[$i]);
            list($maxr1, $maxg1, $maxb1) = sscanf($hex1, "#%02x%02x%02x");
            list($maxr2, $maxg2, $maxb2) = sscanf($hex2, "#%02x%02x%02x");


            //CHOOSE EITHER MAX OR MIN FOR THE COLOR START
            $maxmin = rand(0, 1);
            //IF ROLL =1 THEN CHOOSE THE MIN VALUE EACH RGB FOR COLOR START
            if ($maxmin == 0) {
                $startr = min(value($maxr1), value($maxr2));
                $startg = min(value($maxg1), value($maxg2));
                $startb = min(value($maxb1), value($maxb2));
            }
            //IF ROLL =1 THEN CHOOSE THE MAX VALUE EACH RGB FOR COLOR START
            else if ($maxmin == 1) {
                $startr = max(value($maxr1), value($maxr2));
                $startg = max(value($maxg1), value($maxg2));
                $startb = max(value($maxb1), value($maxb2));
            }


            //SHAKE COLORS EQUALY +- 10 VALUE
            $shake = rand(-30, 30);
            $shaker =  $startr + $shake;
            $shakeg = $startg + $shake;
            $shakeb = $startb + $shake;

            //SHAKE THE COLORS INDVIDIAULLY BY 20 PTS
            $adjr = $shaker + rand(-20, 20);
            $adjg = $shakeg + rand(-20, 20);
            $adjb = $shakeb + rand(-20, 20);

            //CHECK THAT THE COLORS ARE WITHIN RANGE
            if (0 <= $adjr && $adjr <= 255) {
                $finalr = $adjr;
            } else if ($adjr < 0) {
                $finalr = 0;
            } else if ($adjr > 255) {
                $finalr = 255;
            }

            if (0 <= $adjg && $adjg <= 255) {
                $finalg = $adjg;
            } else if ($adjg < 0) {
                $finalg = 0;
            } else if ($adjg > 255) {
                $finalg = 255;
            }
            if (0 <= $adjb && $adjb <= 255) {
                $finalb = $adjb;
            } else if ($adjb < 0) {
                $finalb = 0;
            } else if ($adjb > 255) {
                $finalb = 255;
            }

            $babyhex = sprintf("%02x%02x%02x", $finalr, $finalg, $finalb);

            //$babyhex = $color1->mix($color2, rand(-100, 100));
            $babycolors[$i] = $babyhex;
        } //END OF BABY COLOR FOR LOOP


        //DETERMINE THE TRAIT # BY SEX AND BREED
        if ($babybreed == "Unicorn" && $sex == "male") {
            $traitID = '"4"';
            $breedID = '4';
        } elseif ($babybreed == "Unicorn" && $sex == "female") {
            $traitID = '"8"';
            $breedID = '8';
        } elseif ($babybreed == "Dragon" && $sex == "female") {
            $traitID = '"1"';
            $breedID = '1';
        } elseif ($babybreed == "Dragon" && $sex == "male") {
            $traitID = '"5"';
            $breedID = '5';
        } elseif ($babybreed == "Avian" && $sex == "female") {
            $traitID = '"2"';
            $breedID = '2';
        } elseif ($babybreed == "Avian" && $sex == "male") {
            $traitID = '"6"';
            $breedID = '6';
        } elseif ($babybreed == "Kittling" && $sex == "female") {
            $traitID = '"3"';
            $breedID = '3';
        } elseif ($babybreed == "Kittling" && $sex == "male") {
            $traitID = '"7"';
            $breedID = '7';
        }

        //COLORS FOR THE BABY PONY IMAGE
        $hair2 = $babycolors[3];
        $accent2 = $babycolors[5];

        //BUILD SPECIAL TRAIT IMAGE
        $specialtrait = SpecialTrait::where('traitname', $babytrait)->get();
        $specialtrait = $specialtrait[0][$traitID];
        //PUT DB IMAGE ONTO SERVER
        file_put_contents(public_path('storage/users/' . '0' . 'specialtrait.png'), $specialtrait);
        //CONVERT DB IMAGE TO GD IMAGE
        $imst = imagecreatefrompng(public_path('storage/users/' . '0' . 'specialtrait.png'));
        imageAlphaBlending($imst, true);
        imageSaveAlpha($imst, true);
        //EXTRACT THE SPECIAL TRAIT COLORING FROM ACCENT IF FACE OR BODY
        if (in_array($babytrait, $faces) || in_array($babytrait, $bodys)) {
            list($hr, $hg, $hb) = sscanf($accent2, "%02x%02x%02x");
        } else {
            list($hr, $hg, $hb) = sscanf($hair2, "%02x%02x%02x");
        }
        //RECOLOR THE PONY HAIR TRAIT IMAGE IF HAIR IS NOT RAINBOW
        if (in_array($babytrait, $uncolored)) {
            $imst =  $imst;
        } else {
            imagefilter($imst, IMG_FILTER_COLORIZE, $hr, $hg, $hb);
        }
        //RESAVE TO SERVER
        imagepng($imst, public_path('storage/users/' . '0' . 'specialtrait.png'));

        //BUILD THE PONY IMAGES
        $pony = Buildpony::where('id', $breedID)->get();
        $ponyimgs = ["imgbase", "imghair", "imgaccent", "imgaccent2", "imgeye", "imgmask", "imgwhite", "imgshade", "imgink"];
        $merge = [];

        //COLOR ORDER ARRAY:
        $ycolors = [$babycolors[0], $babycolors[2], $babycolors[4], $babycolors[5], $babycolors[1]];

        //BUILD THE PONY IMAGE AND CONVERT TO GD IMAGE
        for ($i = 0; $i < count($ponyimgs); $i++) {
            $img = $pony[0][$ponyimgs[$i]];
            //PUT DB IMAGE ONTO SERVER
            file_put_contents(public_path('storage/users/' . '00' . $i . '_ponygen.png'), $img);
            //CREATE GD IMAGE FROM SERVER
            $img = imagecreatefrompng(public_path('storage/users/' . '00' . $i . '_ponygen.png'));
            imageAlphaBlending($img, true);
            imageSaveAlpha($img, true);
            //COLORIZE ONLY THE COLOR LAYERS
            if ($i < 5) {
                //EXTRACT THE RGB FROM THE HEX COLOR
                list($r, $g, $b) = sscanf($ycolors[$i], "%02x%02x%02x");
                imagefilter($img, IMG_FILTER_COLORIZE, $r, $g, $b);
                imagepng($img, public_path('storage/users/' . '00' . $i . '_ponygen.png'));
            }
            $merge[$i] = $img;
        }

        //MERGE THE IMAGES 
        for ($i = 0; $i < count($ponyimgs); $i++) {

            //ADD THE FACE TRAIT LAYER
            if ($i == 3 && in_array($babytrait, $faces)) {
                imagecopy($merge[0], $merge[$i], 0, 0, 0, 0, 599, 485);
                imagecopy($merge[0], $imst, 0, 0, 0, 0, 599, 485);
            }

            //ADD THE HAIR TRAIT LAYER
            if ($i == 2 &&  in_array($babytrait, $hairs)) {
                imagecopy($merge[0], $merge[$i], 0, 0, 0, 0, 599, 485);
                imagecopy($merge[0], $imst, 0, 0, 0, 0, 599, 485);
            }

            if ($i == 1 && in_array($babytrait, $bodys)) {
                imagecopy($merge[0], $merge[$i], 0, 0, 0, 0, 599, 485);
                imagecopy($merge[0], $imst, 0, 0, 0, 0, 599, 485);
            }
            imagecopy($merge[0], $merge[$i], 0, 0, 0, 0, 599, 485);
        }
        //MERGE IMAGE
        imagepng($merge[0], public_path('storage/users/' . '0' . 'merged.png'));

        $dbtraits = "";
        //REFORMAT TRAITS TO STRING
        //unset($babytraits[array_search('none', $babytraits)]);

        //array_unique($carryID);

        return redirect('/re-ponygen')->with('success', 'Pony Generated!');
    } //END OF REPONYGEN



    //OLD FUNCTIONS
    public function generator()
    {
        $buildponys = Buildpony::all();
        $user = Auth::user();
        return view('generator', compact('buildponys', 'user'));
    }


    public function randColor()
    {
        $user = Auth::user()->id;
        $pony = Buildpony::where('id', rand(0, 3))->get();
        $typeName = $pony[0]["typeName"];
        $hairlist = ["none", "streak"];
        $facelist = ["none", "blaze"];
        $bodylist = ["none"];


        //CHECK IF TRAIT INFORMATION IS SUBMITTED
        $test1 = $hairlist[rand(0, count($hairlist) - 1)];
        $test2 = $facelist[rand(0, count($hairlist) - 1)];
        $test3 = $bodylist[rand(0, count($hairlist) - 1)];




        if ($test1 == "none") {
            //NO HAIR TRAIT THEN REPLACE HAIR TRAIT IMAGE WITH BLANK
            $hairname = $test1;
            $hairtrait = SpecialTrait::where('traitname', $hairname)->get();

            $hairtrait = $hairtrait[0][$typeName];
            file_put_contents(public_path('storage/users/' . $user . '_hairtrait.png'), $hairtrait);
            $imht = imagecreatefrompng(public_path('storage/users/' . $user . '_hairtrait.png'));
            imageAlphaBlending($imht, true);
            imageSaveAlpha($imht, true);
        } else {

            //GET THE TRAIT INFORMATION
            $hairtrait = SpecialTrait::where('traitname', $test1)->get();

            $hairtrait = $hairtrait[0][$typeName];
            file_put_contents(public_path('storage/users/' . $user . '_hairtrait.png'), $hairtrait);
            $imht = imagecreatefrompng(public_path('storage/users/' . $user . '_hairtrait.png'));
            imageAlphaBlending($imht, true);
            imageSaveAlpha($imht, true);
            //COLORIZE THE FACE TRAIT WITH HAIR 2
            imagefilter($imht, IMG_FILTER_COLORIZE, rand(0, 255), rand(0, 255), rand(0, 255));
            //GENERATE THE PUBLI PATH
            $storehairt = public_path('storage/users/' . $user . '_hairtrait.png');
            //STORE IN PUBLIC STORE FOLDER THIS WILL OVERWRITE NEW CHANGES
            imagepng($imht, $storehairt);
            //DESTROY 
            imagedestroy($imht);
        }
        if ($test2 == "none") {
            //NO FACE TRAIT THEN REPLACE HAIR TRAIT IMAGE WITH BLANK
            $facetraits = SpecialTrait::where('traitname', $test1)->get();

            $facetrait = $facetraits[0][$typeName];
            file_put_contents(public_path('storage/users/' . $user . '_facetrait.png'), $facetrait);
            $imft = imagecreatefrompng(public_path('storage/users/' . $user . '_facetrait.png'));
            imageAlphaBlending($imft, true);
            imageSaveAlpha($imft, true);
        } else {
            $facetraits = SpecialTrait::where('traitname', $test2)->get();

            $facetrait = $facetraits[0][$typeName];
            file_put_contents(public_path('storage/users/' . $user . '_facetrait.png'), $facetrait);
            $imft = imagecreatefrompng(public_path('storage/users/' . $user . '_facetrait.png'));
            imageAlphaBlending($imft, true);
            imageSaveAlpha($imft, true);
            //COLORIZE THE FACE TRAIT WITH ACCENT 2
            imagefilter($imft, IMG_FILTER_COLORIZE, rand(0, 255), rand(0, 255), rand(0, 255));
            //GENERATE THE PUBLI PATH
            $storefacet = public_path('storage/users/' . $user . '_facetrait.png');
            //STORE IN PUBLIC STORE FOLDER THIS WILL OVERWRITE NEW CHANGES
            imagepng($imft, $storefacet);
            //DESTROY 
            imagedestroy($imft);
        }
        if ($test3 == "none") {
            //NO BODY TRAIT THEN REPLACE HAIR TRAIT IMAGE WITH BLANK
        } else {
        }



        //BUILD THE PONY IMAGE AND CONVERT TO GD IMAGE
        $base = $pony[0]["imgbase"];
        file_put_contents(public_path('storage/users/' . $user . '_base.png'), $base);
        $imb = imagecreatefrompng(public_path('storage/users/' . $user . '_base.png'));
        imageAlphaBlending($imb, true);
        imageSaveAlpha($imb, true);

        $hair = $pony[0]["imghair"];
        file_put_contents(public_path('storage/users/' . $user . '_hair.png'), $hair);
        $imh = imagecreatefrompng(public_path('storage/users/' . $user . '_hair.png'));
        imageAlphaBlending($imh, true);
        imageSaveAlpha($imh, true);


        $accent = $pony[0]["imgaccent"];
        file_put_contents(public_path('storage/users/' . $user . '_accent.png'), $accent);
        $ima = imagecreatefrompng(public_path('storage/users/' . $user . '_accent.png'));
        imageAlphaBlending($ima, true);
        imageSaveAlpha($ima, true);

        $accent2 = $pony[0]["imgaccent2"];
        file_put_contents(public_path('storage/users/' . $user . '_accent2.png'), $accent2);
        $ima2 = imagecreatefrompng(public_path('storage/users/' . $user . '_accent2.png'));
        imageAlphaBlending($ima2, true);
        imageSaveAlpha($ima2, true);


        $eye = $pony[0]["imgeye"];
        file_put_contents(public_path('storage/users/' . $user . '_eye.png'), $eye);
        $ime = imagecreatefrompng(public_path('storage/users/' . $user . '_eye.png'));
        imageAlphaBlending($ime, true);
        imageSaveAlpha($ime, true);

        $ink = $pony[0]["imgink"];
        file_put_contents(public_path('storage/users/' . $user . '_ink.png'), $ink);
        $imi = imagecreatefrompng(public_path('storage/users/' . $user . '_ink.png'));
        imageAlphaBlending($imi, true);
        imageSaveAlpha($imi, true);

        $shade = $pony[0]["imgshade"];
        file_put_contents(public_path('storage/users/' . $user . '_shade.png'), $shade);
        $ims = imagecreatefrompng(public_path('storage/users/' . $user . '_shade.png'));
        imageAlphaBlending($ims, true);
        imageSaveAlpha($ims, true);

        $white = $pony[0]["imgwhite"];
        file_put_contents(public_path('storage/users/' . $user . '_white.png'), $white);
        $imw = imagecreatefrompng(public_path('storage/users/' . $user . '_white.png'));
        imageAlphaBlending($imw, true);
        imageSaveAlpha($imw, true);

        $mask = $pony[0]["imgmask"];
        file_put_contents(public_path('storage/users/' . $user . '_mask.png'), $mask);
        $imm = imagecreatefrompng(public_path('storage/users/' . $user . '_mask.png'));
        imageAlphaBlending($imm, true);
        imageSaveAlpha($imm, true);

        //COLORIZE THE IMAGE
        imagefilter($imb, IMG_FILTER_COLORIZE, rand(0, 255), rand(0, 255), rand(0, 255));
        imagefilter($ime, IMG_FILTER_COLORIZE, rand(0, 255), rand(0, 255), rand(0, 255));
        imagefilter($imh, IMG_FILTER_COLORIZE, rand(0, 255), rand(0, 255), rand(0, 255));
        imagefilter($ima, IMG_FILTER_COLORIZE, rand(0, 255), rand(0, 255), rand(0, 255));
        imagefilter($ima2, IMG_FILTER_COLORIZE, rand(0, 255), rand(0, 255), rand(0, 255));

        //GENERATE THE PUBLI PATH
        $storebase = public_path('storage/users/' . $user . '_base.png');
        $storeeye = public_path('storage/users/' . $user . '_eye.png');
        $storehair = public_path('storage/users/' . $user . '_hair.png');
        $storeaccent = public_path('storage/users/' . $user . '_accent.png');
        $storeaccent2 = public_path('storage/users/' . $user . '_accent2.png');
        $storeink = public_path('storage/users/' . $user . '_ink.png');
        $storemask = public_path('storage/users/' . $user . '_mask.png');
        $storewhite = public_path('storage/users/' . $user . '_white.png');
        $storeshade = public_path('storage/users/' . $user . '_shade.png');


        //STORE IN PUBLIC STORE FOLDER THIS WILL OVERWRITE NEW CHANGES
        imagepng($imb, $storebase);
        imagepng($ime, $storeeye);
        imagepng($imh, $storehair);
        imagepng($ima, $storeaccent);
        imagepng($ima2, $storeaccent2);
        imagepng($imi, $storeink);
        imagepng($imm, $storemask);
        imagepng($ims, $storeshade);
        imagepng($imw, $storewhite);

        //DESTROY 
        imagedestroy($imb);
        imagedestroy($imh);
        imagedestroy($ime);
        imagedestroy($ima);
        imagedestroy($ima2);

        return redirect(route('generator'));
    }

    public function gencolor(Request $request)
    {
        //ASSIGN ALL THE USER INPUTS TO USABLE PHP VARIABLES
        $user = Auth::user()->id;
        $baseCol = $request->input('baseCol');
        //CONVERT TO RGB FORMAT
        list($br, $bg, $bb) = sscanf($baseCol, "#%02x%02x%02x");
        $eyeCol = $request->input('eyeCol');
        list($er, $eg, $eb) = sscanf($eyeCol, "#%02x%02x%02x");
        $accentCol = $request->input('accentCol');
        list($ar, $ag, $ab) = sscanf($accentCol, "#%02x%02x%02x");
        $accentCol2 = $request->input('accentCol2');
        list($ar2, $ag2, $ab2) = sscanf($accentCol2, "#%02x%02x%02x");
        $hairCol = $request->input('hairCol');
        list($hr, $hg, $hb) = sscanf($hairCol, "#%02x%02x%02x");
        $hairCol2 = $request->input('hairCol2');
        list($hr2, $hg2, $hb2) = sscanf($hairCol2, "#%02x%02x%02x");
        $typeName = $request->input('typeName');
        $sex = $request->input('sex');

        //REQUEST THE SPECIFIC PONY TYPE URLS
        //THIS RETURNS A PONY OBJECT LENGTH 1 WITH COLUMNS AS KEY VALUES
        $pony = Buildpony::where('typeName', $typeName)->get();

        //CHECK IF TRAIT INFORMATION IS SUBMITTED
        $test1 = $request->input('hairtrait');
        $test2 = $request->input('facetrait');
        $test3 = $request->input('bodytrait');
        if ($test1 == "none") {
            //NO HAIR TRAIT THEN REPLACE HAIR TRAIT IMAGE WITH BLANK
            $hairname = $test1;
            $hairtrait = SpecialTrait::where('traitname', $hairname)->get();

            $hairtrait = $hairtrait[0][$typeName];
            file_put_contents(public_path('storage/users/' . $user . '_hairtrait.png'), $hairtrait);
            $imht = imagecreatefrompng(public_path('storage/users/' . $user . '_hairtrait.png'));
            imageAlphaBlending($imht, true);
            imageSaveAlpha($imht, true);
        } else {

            //GET THE TRAIT INFORMATION
            $hairname = $request->input('hairtrait');
            $hairtrait = SpecialTrait::where('traitname', $hairname)->get();

            $hairtrait = $hairtrait[0][$typeName];
            file_put_contents(public_path('storage/users/' . $user . '_hairtrait.png'), $hairtrait);
            $imht = imagecreatefrompng(public_path('storage/users/' . $user . '_hairtrait.png'));
            imageAlphaBlending($imht, true);
            imageSaveAlpha($imht, true);
            //COLORIZE THE FACE TRAIT WITH HAIR 2
            imagefilter($imht, IMG_FILTER_COLORIZE, $hr2, $hg2, $hb2);
            //GENERATE THE PUBLI PATH
            $storehairt = public_path('storage/users/' . $user . '_hairtrait.png');
            //STORE IN PUBLIC STORE FOLDER THIS WILL OVERWRITE NEW CHANGES
            imagepng($imht, $storehairt);
            //DESTROY 
            imagedestroy($imht);
        }
        if ($test2 == "none") {
            //NO FACE TRAIT THEN REPLACE HAIR TRAIT IMAGE WITH BLANK
            $facename = $test2;
            $facetrait = SpecialTrait::where('traitname', $facename)->get();

            $facetrait = $facetrait[0][$typeName];
            file_put_contents(public_path('storage/users/' . $user . '_facetrait.png'), $facetrait);
            $imft = imagecreatefrompng(public_path('storage/users/' . $user . '_facetrait.png'));
            imageAlphaBlending($imft, true);
            imageSaveAlpha($imft, true);
        } else {
            $facename = $request->input('facetrait');
            $facetrait = SpecialTrait::where('traitname', $facename)->get();

            $facetrait = $facetrait[0][$typeName];
            file_put_contents(public_path('storage/users/' . $user . '_facetrait.png'), $facetrait);
            $imft = imagecreatefrompng(public_path('storage/users/' . $user . '_facetrait.png'));
            imageAlphaBlending($imft, true);
            imageSaveAlpha($imft, true);
            //COLORIZE THE FACE TRAIT WITH ACCENT 2
            imagefilter($imft, IMG_FILTER_COLORIZE, $ar2, $ag2, $ab2);
            //GENERATE THE PUBLI PATH
            $storefacet = public_path('storage/users/' . $user . '_facetrait.png');
            //STORE IN PUBLIC STORE FOLDER THIS WILL OVERWRITE NEW CHANGES
            imagepng($imft, $storefacet);
            //DESTROY 
            imagedestroy($imft);
        }
        if ($test3 == "none") {
            //NO BODY TRAIT THEN REPLACE HAIR TRAIT IMAGE WITH BLANK
        } else {
        }




        //BUILD THE PONY IMAGE AND CONVERT TO GD IMAGE
        $base = $pony[0]["imgbase"];
        file_put_contents(public_path('storage/users/' . $user . '_base.png'), $base);
        $imb = imagecreatefrompng(public_path('storage/users/' . $user . '_base.png'));
        imageAlphaBlending($imb, true);
        imageSaveAlpha($imb, true);

        $hair = $pony[0]["imghair"];
        file_put_contents(public_path('storage/users/' . $user . '_hair.png'), $hair);
        $imh = imagecreatefrompng(public_path('storage/users/' . $user . '_hair.png'));
        imageAlphaBlending($imh, true);
        imageSaveAlpha($imh, true);


        $accent = $pony[0]["imgaccent"];
        file_put_contents(public_path('storage/users/' . $user . '_accent.png'), $accent);
        $ima = imagecreatefrompng(public_path('storage/users/' . $user . '_accent.png'));
        imageAlphaBlending($ima, true);
        imageSaveAlpha($ima, true);

        $accent2 = $pony[0]["imgaccent2"];
        file_put_contents(public_path('storage/users/' . $user . '_accent2.png'), $accent2);
        $ima2 = imagecreatefrompng(public_path('storage/users/' . $user . '_accent2.png'));
        imageAlphaBlending($ima2, true);
        imageSaveAlpha($ima2, true);


        $eye = $pony[0]["imgeye"];
        file_put_contents(public_path('storage/users/' . $user . '_eye.png'), $eye);
        $ime = imagecreatefrompng(public_path('storage/users/' . $user . '_eye.png'));
        imageAlphaBlending($ime, true);
        imageSaveAlpha($ime, true);

        $ink = $pony[0]["imgink"];
        file_put_contents(public_path('storage/users/' . $user . '_ink.png'), $ink);
        $imi = imagecreatefrompng(public_path('storage/users/' . $user . '_ink.png'));
        imageAlphaBlending($imi, true);
        imageSaveAlpha($imi, true);

        $shade = $pony[0]["imgshade"];
        file_put_contents(public_path('storage/users/' . $user . '_shade.png'), $shade);
        $ims = imagecreatefrompng(public_path('storage/users/' . $user . '_shade.png'));
        imageAlphaBlending($ims, true);
        imageSaveAlpha($ims, true);

        $white = $pony[0]["imgwhite"];
        file_put_contents(public_path('storage/users/' . $user . '_white.png'), $white);
        $imw = imagecreatefrompng(public_path('storage/users/' . $user . '_white.png'));
        imageAlphaBlending($imw, true);
        imageSaveAlpha($imw, true);

        $mask = $pony[0]["imgmask"];
        file_put_contents(public_path('storage/users/' . $user . '_mask.png'), $mask);
        $imm = imagecreatefrompng(public_path('storage/users/' . $user . '_mask.png'));
        imageAlphaBlending($imm, true);
        imageSaveAlpha($imm, true);


        //COLORIZE THE IMAGE
        imagefilter($imb, IMG_FILTER_COLORIZE, $br, $bg, $bb);
        imagefilter($ime, IMG_FILTER_COLORIZE, $er, $eg, $eb);
        imagefilter($imh, IMG_FILTER_COLORIZE, $hr, $hg, $hb);
        imagefilter($ima, IMG_FILTER_COLORIZE, $ar, $ag, $ab);
        imagefilter($ima2, IMG_FILTER_COLORIZE, $ar2, $ag2, $ab2);

        //GENERATE THE PUBLI PATH
        $storebase = public_path('storage/users/' . $user . '_base.png');
        $storeeye = public_path('storage/users/' . $user . '_eye.png');
        $storehair = public_path('storage/users/' . $user . '_hair.png');
        $storeaccent = public_path('storage/users/' . $user . '_accent.png');
        $storeaccent2 = public_path('storage/users/' . $user . '_accent2.png');
        $storeink = public_path('storage/users/' . $user . '_ink.png');
        $storemask = public_path('storage/users/' . $user . '_mask.png');
        $storewhite = public_path('storage/users/' . $user . '_white.png');
        $storeshade = public_path('storage/users/' . $user . '_shade.png');


        //STORE IN PUBLIC STORE FOLDER THIS WILL OVERWRITE NEW CHANGES
        imagepng($imb, $storebase);
        imagepng($ime, $storeeye);
        imagepng($imh, $storehair);
        imagepng($ima, $storeaccent);
        imagepng($imi, $storeink);
        imagepng($imm, $storemask);
        imagepng($ims, $storeshade);
        imagepng($imw, $storewhite);
        imagepng($ima2, $storeaccent2);


        //DESTROY 
        imagedestroy($imb);
        imagedestroy($imh);
        imagedestroy($ime);
        imagedestroy($ima);
        imagedestroy($ima2);


        return redirect(route('generator'));
    }
    public function gencolor2(Request $request)
    {
        //ASSIGN ALL THE USER INPUTS TO USABLE PHP VARIABLES
        $user = Auth::user()->id;
        $baseCol = $request->input('baseCol');
        //CONVERT TO RGB FORMAT
        list($br, $bg, $bb) = sscanf($baseCol, "#%02x%02x%02x");
        $eyeCol = $request->input('eyeCol');
        list($er, $eg, $eb) = sscanf($eyeCol, "#%02x%02x%02x");
        $accentCol = $request->input('accentCol');
        list($ar, $ag, $ab) = sscanf($accentCol, "#%02x%02x%02x");
        $accentCol2 = $request->input('accentCol2');
        list($ar2, $ag2, $ab2) = sscanf($accentCol2, "#%02x%02x%02x");
        $hairCol = $request->input('hairCol');
        list($hr, $hg, $hb) = sscanf($hairCol, "#%02x%02x%02x");
        $hairCol2 = $request->input('hairCol2');
        list($hr2, $hg2, $hb2) = sscanf($hairCol2, "#%02x%02x%02x");
        $typeName = $request->input('typeName');
        $sex = $request->input('sex');

        //REQUEST THE SPECIFIC PONY TYPE URLS
        //THIS RETURNS A PONY OBJECT LENGTH 1 WITH COLUMNS AS KEY VALUES
        $pony = Buildpony::where('typeName', $typeName)->get();

        //CHECK IF TRAIT INFORMATION IS SUBMITTED
        $test1 = $request->input('hairtrait');
        $test2 = $request->input('facetrait');
        $test3 = $request->input('bodytrait');
        if ($test1 == "none") {
            //NO HAIR TRAIT THEN REPLACE HAIR TRAIT IMAGE WITH BLANK
            $hairname = $test1;
            $hairtrait = SpecialTrait::where('traitname', $hairname)->get();

            $hairtrait = $hairtrait[0][$typeName];
            file_put_contents(public_path('storage/users/' . $user . '_hairtrait.png'), $hairtrait);
            $imht = imagecreatefrompng(public_path('storage/users/' . $user . '_hairtrait.png'));
            imageAlphaBlending($imht, true);
            imageSaveAlpha($imht, true);
        } else {

            //GET THE TRAIT INFORMATION
            $hairname = $request->input('hairtrait');
            $hairtrait = SpecialTrait::where('traitname', $hairname)->get();

            $hairtrait = $hairtrait[0][$typeName];
            file_put_contents(public_path('storage/users/' . $user . '_hairtrait.png'), $hairtrait);
            $imht = imagecreatefrompng(public_path('storage/users/' . $user . '_hairtrait.png'));
            imageAlphaBlending($imht, true);
            imageSaveAlpha($imht, true);
            //COLORIZE THE FACE TRAIT WITH HAIR 2
            imagefilter($imht, IMG_FILTER_COLORIZE, $hr2, $hg2, $hb2);
            //GENERATE THE PUBLI PATH
            $storehairt = public_path('storage/users/' . $user . '_hairtrait.png');
            //STORE IN PUBLIC STORE FOLDER THIS WILL OVERWRITE NEW CHANGES
            imagepng($imht, $storehairt);
            //DESTROY 
            imagedestroy($imht);
        }
        if ($test2 == "none") {
            //NO FACE TRAIT THEN REPLACE HAIR TRAIT IMAGE WITH BLANK
            $facename = $test2;
            $facetrait = SpecialTrait::where('traitname', $facename)->get();

            $facetrait = $facetrait[0][$typeName];
            file_put_contents(public_path('storage/users/' . $user . '_facetrait.png'), $facetrait);
            $imft = imagecreatefrompng(public_path('storage/users/' . $user . '_facetrait.png'));
            imageAlphaBlending($imft, true);
            imageSaveAlpha($imft, true);
        } else {
            $facename = $request->input('facetrait');
            $facetrait = SpecialTrait::where('traitname', $facename)->get();

            $facetrait = $facetrait[0][$typeName];
            file_put_contents(public_path('storage/users/' . $user . '_facetrait.png'), $facetrait);
            $imft = imagecreatefrompng(public_path('storage/users/' . $user . '_facetrait.png'));
            imageAlphaBlending($imft, true);
            imageSaveAlpha($imft, true);
            //COLORIZE THE FACE TRAIT WITH ACCENT 2
            imagefilter($imft, IMG_FILTER_COLORIZE, $ar2, $ag2, $ab2);
            //GENERATE THE PUBLI PATH
            $storefacet = public_path('storage/users/' . $user . '_facetrait.png');
            //STORE IN PUBLIC STORE FOLDER THIS WILL OVERWRITE NEW CHANGES
            imagepng($imft, $storefacet);
            //DESTROY 
            imagedestroy($imft);
        }
        if ($test3 == "none") {
            //NO BODY TRAIT THEN REPLACE HAIR TRAIT IMAGE WITH BLANK
        } else {
        }




        //BUILD THE PONY IMAGE AND CONVERT TO GD IMAGE
        $base = $pony[0]["imgbase"];
        file_put_contents(public_path('storage/users/' . $user . '_base.png'), $base);
        $imb = imagecreatefrompng(public_path('storage/users/' . $user . '_base.png'));
        imageAlphaBlending($imb, true);
        imageSaveAlpha($imb, true);

        $hair = $pony[0]["imghair"];
        file_put_contents(public_path('storage/users/' . $user . '_hair.png'), $hair);
        $imh = imagecreatefrompng(public_path('storage/users/' . $user . '_hair.png'));
        imageAlphaBlending($imh, true);
        imageSaveAlpha($imh, true);


        $accent = $pony[0]["imgaccent"];
        file_put_contents(public_path('storage/users/' . $user . '_accent.png'), $accent);
        $ima = imagecreatefrompng(public_path('storage/users/' . $user . '_accent.png'));
        imageAlphaBlending($ima, true);
        imageSaveAlpha($ima, true);

        $accent2 = $pony[0]["imgaccent2"];
        file_put_contents(public_path('storage/users/' . $user . '_accent2.png'), $accent2);
        $ima2 = imagecreatefrompng(public_path('storage/users/' . $user . '_accent2.png'));
        imageAlphaBlending($ima2, true);
        imageSaveAlpha($ima2, true);


        $eye = $pony[0]["imgeye"];
        file_put_contents(public_path('storage/users/' . $user . '_eye.png'), $eye);
        $ime = imagecreatefrompng(public_path('storage/users/' . $user . '_eye.png'));
        imageAlphaBlending($ime, true);
        imageSaveAlpha($ime, true);

        $ink = $pony[0]["imgink"];
        file_put_contents(public_path('storage/users/' . $user . '_ink.png'), $ink);
        $imi = imagecreatefrompng(public_path('storage/users/' . $user . '_ink.png'));
        imageAlphaBlending($imi, true);
        imageSaveAlpha($imi, true);

        $shade = $pony[0]["imgshade"];
        file_put_contents(public_path('storage/users/' . $user . '_shade.png'), $shade);
        $ims = imagecreatefrompng(public_path('storage/users/' . $user . '_shade.png'));
        imageAlphaBlending($ims, true);
        imageSaveAlpha($ims, true);

        $white = $pony[0]["imgwhite"];
        file_put_contents(public_path('storage/users/' . $user . '_white.png'), $white);
        $imw = imagecreatefrompng(public_path('storage/users/' . $user . '_white.png'));
        imageAlphaBlending($imw, true);
        imageSaveAlpha($imw, true);

        $mask = $pony[0]["imgmask"];
        file_put_contents(public_path('storage/users/' . $user . '_mask.png'), $mask);
        $imm = imagecreatefrompng(public_path('storage/users/' . $user . '_mask.png'));
        imageAlphaBlending($imm, true);
        imageSaveAlpha($imm, true);


        //COLORIZE THE IMAGE
        imagefilter($imb, IMG_FILTER_COLORIZE, $br, $bg, $bb);
        imagefilter($ime, IMG_FILTER_COLORIZE, $er, $eg, $eb);
        imagefilter($imh, IMG_FILTER_COLORIZE, $hr, $hg, $hb);
        imagefilter($ima, IMG_FILTER_COLORIZE, $ar, $ag, $ab);
        imagefilter($ima2, IMG_FILTER_COLORIZE, $ar2, $ag2, $ab2);

        //GENERATE THE PUBLI PATH
        $storebase = public_path('storage/users/' . $user . '_base.png');
        $storeeye = public_path('storage/users/' . $user . '_eye.png');
        $storehair = public_path('storage/users/' . $user . '_hair.png');
        $storeaccent = public_path('storage/users/' . $user . '_accent.png');
        $storeaccent2 = public_path('storage/users/' . $user . '_accent2.png');
        $storeink = public_path('storage/users/' . $user . '_ink.png');
        $storemask = public_path('storage/users/' . $user . '_mask.png');
        $storewhite = public_path('storage/users/' . $user . '_white.png');
        $storeshade = public_path('storage/users/' . $user . '_shade.png');


        //STORE IN PUBLIC STORE FOLDER THIS WILL OVERWRITE NEW CHANGES
        imagepng($imb, $storebase);
        imagepng($ime, $storeeye);
        imagepng($imh, $storehair);
        imagepng($ima, $storeaccent);
        imagepng($imi, $storeink);
        imagepng($imm, $storemask);
        imagepng($ims, $storeshade);
        imagepng($imw, $storewhite);
        imagepng($ima2, $storeaccent2);


        //DESTROY 
        imagedestroy($imb);
        imagedestroy($imh);
        imagedestroy($ime);
        imagedestroy($ima);
        imagedestroy($ima2);


        return redirect(route('generator'));
    }
}
