<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FedayPayController;
use App\Http\Controllers\client\boutique\ClientProduitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
Route::get('/toto', function () {
    return view('welcome');
});
Route::any('/', function () {
    return view('index');
});
*/

//Artisan::call('optimize');


Route::view('/', 'index');
Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/home', function () {
    return view('home');
})->name('home');


/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/counter', Counter::class);


/* Les routes de l'admin */

require __DIR__.'/partials/admin.php';  

/* Les routes des gestionnaires */
require __DIR__.'/partials/gestionnaire.php';  

/* Les routes des clients */
require __DIR__.'/partials/client.php';  

/* Les routes des livreurs */
require __DIR__.'/partials/livreur.php';  


require __DIR__.'/auth.php';
