<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
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

// Ces deux routes ne sont plus nécessaire car une méthode de recherche de type '?author/'
// a été mis en place dans le controleur + model Post
/* Route::get('categories/{category:slug}', [PostController::class, 'category']); */
/* Route::get('authors/{author:username}', [PostController::class, 'author']); */

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);
