<?php

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


/* BÁSICOS */

// Route::get('/test', function () {
//     return "Hola Mundo";
// });

// Route::get('/hola/{nombre?}', function ($nombre = "carlos") {
//     return "Hola $nombre conocenos <a href='" . route("nosotros") . "'>nosotros</a>";
// });

// Route::get('/sobre-nosotros-en-la-web', function () {
//     return "<h1>Todo sobre nosotros</h1>";
// })->name("nosotros");

// Route::get('/home/{nombre?}/{apellido?}', function ($nombre = "Carlos", $apellido = "Rayon") {
//     // return view('home')->with('nombre', $nombre)->with('apellido', $apellido);
//     return view('home', ['nombre' => $nombre, 'apellido' => $apellido]);
// })->name("home");

// Route::get('/estructuras', function () {
//     $posts = ['post1', 'post2', 'post3', 'post4'];
//     $posts2 = [];
//     return view('estructuras', ['posts' => $posts, 'posts2' => $posts2]);
// })->name('estructuras');


/* Llamando a un controlador */

Route::resource('dashboard/post', 'dashboard\PostController');