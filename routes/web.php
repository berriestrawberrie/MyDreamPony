<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\GenController;
use App\Http\Controllers\NPC;
use App\Http\Controllers\PonyController;
use Illuminate\Support\Facades\Auth;

//HOMEPAGE
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::User();
        return view('REDESIGN.redesign', compact('user'));
    }
    return view('REDESIGN.home');
})->name('home');


//REDESIGN ROUTES CHECK IF USER LOGGED IN TO ACCESS
Route::get('/re-inventory', function () {
    if (Auth::check()) {
        $user = Auth::User();
        return view('REDESIGN.inventory', compact('user'));
    }
    return view('REDESIGN.home');
})->name('reinventory');



Route::get('/re-signup', function () {
    return view('REDESIGN.register');
})->name('resignup');


//DYNAMIC SECTION EXAMPLE
Route::get('/master', [AdminController::class, 'tester'])->name('test');

Route::get('/signup', [AdminController::class, 'signup'])->name('signup');
Route::get('/blade', [AdminController::class, 'tester2'])->name('blade');

//REGISTER
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');

//LOGIN
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/inventory', [UserController::class, 'myInventory'])->name('inventory');
Route::get('/shop/{npc}', [UserController::class, 'npcShop']);
Route::get('/beauty', [UserController::class, 'beauty'])->name('beauty');


//NPC CONTROLLERS FOR SHOPS ETC...
Route::get('/purchase/{npc}/{itemid}', [NPC::class, 'itemPurchase']);
Route::get('/restock/{npc}', [NPC::class, 'restockShop']);
Route::get('/unstock/{npc}', [NPC::class, 'unstockShop']);

//USER ROUTES
Route::post('/basehue', [UserController::class, 'avatardesgin'])->name('basehue');
Route::get('/re-stable', [UserController::class, 'remyStables'])->name('restable');
Route::get('/re-stable2', [UserController::class, 'remyStables2'])->name('restable2');
Route::get('/stable', [UserController::class, 'myStables'])->name('stable');
Route::post('/newstable', [UserController::class, 'updateStables'])->name('newstable');
Route::get('/wardrobe', function () {
    if (Auth::check()) {
        $user = Auth::User();
        return view('REDESIGN.wardrobe', compact('user'));
    }
    return view('REDESIGN.home');
})->name('wardrobe');

//LOGOUT
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/map', [UserController::class, 'explore'])->name('map');


//ADD NEW PET DESIGN ADMIN
Route::get('/admin', [AdminController::class, 'adminhome'])->name('admin');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admincolor', [AdminController::class, 'colors'])->name('admin.color');
Route::get('/adminindex', [AdminController::class, 'indeximage'])->name('admin.index');
Route::get('/dbimage/{id}/{type}', [AdminController::class, 'getImage']);


Route::get('/dbtest/{user}/{id}/{type}', [AdminController::class, 'getGD']);

//GENERATOR 
Route::get('generator', [GenController::class, 'generator'])->name('generator');
Route::post('gencolor', [GenController::class, 'gencolor'])->name('gencolor');
Route::get('randColor', [GenController::class, 'randColor'])->name('randColor');
Route::post('reponygen', [GenController::class, 'reponygen'])->name('reponygencode');
Route::get('/re-ponygen', [GenController::class, 'reponygenform'])->name('reponygen');

//PONY CONTROLLERS
Route::get('/pony/{id}', [PonyController::class, 'ponyProfile']);
Route::get('/nextpony/{current}', [PonyController::class, 'nextPony']);
Route::get('/previouspony/{previous}', [PonyController::class, 'previousPony']);
Route::post('/unequip/{ponyid}', [PonyController::class, 'unequipItem']);
Route::post('/equip/{itemid}', [PonyController::class, 'equipItem']);
Route::get('/equipForm/{itemid}', [PonyController::class, 'equipForm'])->name('equipForm');
Route::get('/re-ponyprofile/{id}', [PonyController::class, 'reponyProfile'])->name('reponyprofile');
Route::get('/renextpony/{stable}/{current}', [PonyController::class, 'renextPony']);
Route::get('/repreviouspony/{stable}/{previous}', [PonyController::class, 'repreviousPony']);



//IMAGES
Route::get('/trait/{type}/{traitid}', [ImageController::class, 'getTrait']);
Route::get('/item/{itemid}/{type}', [ImageController::class, 'getItem']);
Route::get('/breedicon/{breed}', [ImageController::class, 'getBreedIcon']);
Route::get('/buildavatar/{avatarid}/{imgtype}', [ImageController::class, 'buildAvatar']);




//IMAGE TESTING
Route::controller(ImageController::class)->group(function () {
    Route::get('image', 'fileUpload')->name('image');
    Route::post('image', 'storeImage')->name('image.store');
    Route::get('/ponyImage/{id}', 'getPony');
});
