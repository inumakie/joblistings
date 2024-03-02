<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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

// Show all jobs
Route::get('/', [ListingController::class, 'index']);

// Create job - form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store new job
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Edit job - form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Submit edit of job posting
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete job posting
Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single job posting
Route::get('/listings/{listing}', [ListingController::class, 'show']);



// USER REGISTRATION AND LOGIN

// Show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Register user
Route::post('/users', [UserController::class, 'store']);

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');



// EJEMPLO RESPONSE
Route::get('/test', function () {
    return response('<h1>This is a prueba!</h1>', '200', ['Mi-header-personalizado' => 'Valor cualquiera']);
});

// EJEMPLO WILDCARD, DD, DDD, WHERE()
Route::get('/posts/{id}', function ($id) {
    dd($id);
    ddd($id);
    return response('Post ' . $id);
})->where('id', '[0-9]+');

// EJEMPLO ACCESO A QUERY PARAMETERS /search?name=pepe&ciudad=varela
Route::get('/search', function (Request $request) {
    return $request->name . ' ' . $request->ciudad;
});
