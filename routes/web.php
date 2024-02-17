<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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
Route::get('/', function () {
    return view('listings', [
        'heading' => 'latest listings',
        'listings' => Listing::all()
    ]);
});

// Single listing
Route::get('/listings/{id}', function ($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});





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
