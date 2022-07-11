<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
Use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
    return view('post.index', [
        'mesPost' => Post::latest()->filter(request(['search', 'category', 'author']))
                                    ->paginate(3)
                                    ->withQueryString()
    ]);
    }

    public function show(Post $post)
    {
        // Find a post by it slug and pass it to a view called "title"
    return view('post.show', [
        'content' => $post
    ]);
    }

    public function category(Category $category)
    {
        return view('post.category', [
            'mesPost' => $category->posts
        ]);
    }

    public function author(User $author)
    {
        // On cherche tout les posts d'un Auteur en fonction de son id
        // La classe User comprend une méthode 'posts' qui représente
        // la clé étrangère user_id dans la table post

        return view('post.index', [
            'mesPost' => $author->posts
        ]);
    }



}
