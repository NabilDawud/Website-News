<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('parent', 'cms.parent');
Route::view('temp', 'cms.temp');

Route::prefix('cms/admin')->group(function () {
    Route::resource('countries', CountryController::class);
    Route::post('countries-update/{id}' , [CountryController::class , 'update'])->name('countries-update');
    Route::get('countries-trashed' , [CountryController::class ,'trashed'])->name('countries-trashed');
    Route::get('countries-restore/{id}' , [CountryController::class ,'restore'])->name('countries-restore');
    Route::get('countries-force/{id}' , [CountryController::class ,'force'])->name('countries-force');
    Route::get('countries-deleteAll' , [CountryController::class ,'deleteAll'])->name('countries-deleteAll');


    Route::resource('cities', CityController::class);
    Route::post('cities-update/{id}' , [CityController::class , 'update'])->name('cities-update');

    Route::resource('admins', AdminController::class);
    Route::post('admins-update/{id}' , [AdminController::class , 'update'])->name('admins-update');

    Route::resource('authors', AuthorController::class);
    Route::post('authors-update/{id}' , [AuthorController::class , 'update'])->name('authors-update');
});

// Nabil
