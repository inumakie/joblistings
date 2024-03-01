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

// All listings
Route::get('/', [ListingController::class, 'index']);

// Create form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store new listing
Route::post('/listings', [ListingController::class, 'store']);

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Submit edit of job posting
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete job posting
Route::delete('listings/{listing}', [ListingController::class, 'destroy']);

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show register form
Route::get('/register', [UserController::class, 'create']);

// USER REGISTRATION AND LOGIN

// Register user
Route::post('/users', [UserController::class, 'store']);

// Log out
Route::post('/logout', [UserController::class, 'logout']);

// Show login form
Route::get('/login', [UserController::class, 'login']);

// Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



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
