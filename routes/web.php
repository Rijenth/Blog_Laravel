<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCommentController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Console\DbCommand;
use Illuminate\Log\Logger;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\support\Facades\File;


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

Route::get('/', [PostController::class, 'index']);
                  //   || Pas défaut, pointe 'id'
Route::get('/title/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store'])->middleware('auth');;


// Ces deux routes ne sont plus nécessaire car une méthode de recherche de type '?author/'
// a été mis en place dans le controleur + model Post
/* Route::get('categories/{category:slug}', [PostController::class, 'category']); */
/* Route::get('authors/{author:username}', [PostController::class, 'author']); */
Route::get('register', [RegisterController::class, 'create'])->middleware('guest'); // Only a guess can visit this page
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// Un connecté ne peut pas se faire rediriger vers la page de connexion
// Un guest ne peut pas se faire rediriger vers la page de deconnexion
Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');


Route::post('logout', [SessionController::class, "destroy"])->middleware('auth');
