<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\NewsletterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Log\Logger;
use Illuminate\Validation\ValidationException;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\support\Facades\File;
use PhpParser\Node\Stmt\TryCatch;


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

// L'API mailchimp, Single action controller
Route::post('newsletter', NewsletterController::class);


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

/* Section administrateur */

Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');
