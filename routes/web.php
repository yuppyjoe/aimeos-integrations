<?php

use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController as LivewireUserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', '\Aimeos\Shop\Controller\CatalogController@homeAction')->name('aimeos_home');

Route::middleware('auth')->group(function () {

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile/me', [LivewireUserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/me', [LivewireUserProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/me', [LivewireUserProfileController::class, 'destroy'])->name('profile.destroy');
});
