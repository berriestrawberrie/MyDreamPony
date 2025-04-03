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
/*Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::User();
        return view('templates.logged', compact('user'));
    }
    return view('templates.welcome');
})->name('home');
*/

Route::get('/', function () {
    return view('REDESIGN.redesign');
});


//REDESIGN ROUTES
Route::get('/re-stable', function () {
    return view('REDESIGN.stables');
})->name('restable');
Route::get('/re-ponyprofile', function () {
    return view('REDESIGN.ponyprofile');
})->name('reponyprofile');
Route::get('/re-inventory', function () {
    return view('REDESIGN.inventory');
})->name('reinventory');
Route::get('/re-ponygen', function () {
    return view('REDESIGN.ponygen');
})->name('reponygen');


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

//USER WELCOME PAGE
Route::get('/logged', function () {
    return view('templates.logged');
})->name('logged');
Route::get('/test', function () {
    return view('userplay');
});
Route::get('/avatardesigner', [UserController::class, 'avatardesgin'])->name('avatardesigner');


//LOGOUT
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/newstable', [UserController::class, 'updateStables'])->name('newstable');
Route::get('/stable', [UserController::class, 'myStables'])->name('stable');
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
Route::post('ponygen', [GenController::class, 'ponygen'])->name('ponygencode');
Route::get('/ponygen', [GenController::class, 'ponygenform'])->name('ponygen');

//PONY CONTROLLERS
Route::get('/pony/{id}', [PonyController::class, 'ponyProfile']);
Route::get('/nextpony/{current}', [PonyController::class, 'nextPony']);
Route::get('/previouspony/{previous}', [PonyController::class, 'previousPony']);
Route::post('/unequip/{ponyid}', [PonyController::class, 'unequipItem']);
Route::post('/equip/{itemid}', [PonyController::class, 'equipItem']);
Route::get('/equipForm/{itemid}', [PonyController::class, 'equipForm'])->name('equipForm');


//IMAGES
Route::get('/trait/{type}/{traitid}', [ImageController::class, 'getTrait']);
Route::get('/item/{itemid}/{type}', [ImageController::class, 'getItem']);




//IMAGE TESTING
Route::controller(ImageController::class)->group(function () {
    Route::get('image', 'fileUpload')->name('image');
    Route::post('image', 'storeImage')->name('image.store');
    Route::get('/ponyImage/{id}', 'getPony');
});
