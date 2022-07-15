<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => 'required|max:30',
            'thumbnail' => 'required|mimes:png,jpg|max:20000',
            'slug' => ['required', Rule::unique('posts', 'slug')], // La valeur ne doit pas déjà existé dans la table
            'category_id' => ['required', Rule::exists('categories', 'id')], // La valeur existe dans la table categories, colonne id
            'excerpt' => 'required',
            'body' => 'required'
        ]);


        $attributes['user_id'] = auth()->id();
        $attributes['redirect'] = $attributes['slug'];
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {

        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }
}
