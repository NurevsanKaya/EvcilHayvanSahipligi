<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AdShowController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavoriteAdController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PetTypeController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', [AdController::class, 'showAds'])->name('index');
Route::get('/Ad-Filter', [AdController::class, 'filter'])->name('filter');

Route::get('/Contact', [ContactController::class, 'index'])->name('contact');
Route::post('/Contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/About',[PageController::class,'getAbout']);
Route::get('/index',[PageController::class,'getIndex']);

Route::get('/Ad',[AdController::class,'getAd'])->name('ad');
Route::post('/Ad',[AdController::class,'store'])->name('ads.store');

Route::get('/pet-breeds/{petTypeId}', [PetTypeController::class, 'getBreeds'])->name('breed');
Route::get('/district/{cityId}', [CityController::class, 'getdistrict'])->name('district');

Route::get('/AdShow/{id}',[AdShowController::class,'show'])->name('AdShow');

Route::get('/Ad/Dogs',[AdController::class,'dogShow'])->name('DogShow');
Route::get('/Ad/Cats',[AdController::class,'catShow'])->name('CatShow');

Route::post('/favorites/add',[FavoriteAdController::class,'store']);

Route::get('/favorites',[FavoriteAdController::class,'favStore'])->name('favorites');

Route::delete('/favorites/{id}', [FavoriteAdController::class, 'destroy'])->name('favorites.destroy');
Route::get('/MyAds',[AdController::class,'getMyAd'])->name('myAds');


Route::delete('/Ad/{id}', [AdController::class, 'destroy'])->name('Ad.destroy');

Route::get('MyAd/{id}',[AdController::class,'getUpdateAd'])->name('MyAdShow');
Route::put('/Ad/{id}',[AdController::class,'UpdateAd'])->name('AdUpdate');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
