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
        $attributes = $this->validatePost();


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

    public function update(Post $post)
    {
        $attributes = $this->validatePost();

        if(isset($attributes['thumbnail']))
        {
          $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        };
        $attributes['redirect'] = $attributes['slug'];
        $post->update($attributes);

        return back()->with('success', 'Post updated !');

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted !');
    }

    protected function validatePost(?Post $post = null): array
    {
        // Si on ne nous donne pas de post en parametre,
        // Alors on créer un post pour la suite.
        $post ??= new Post();

        return request()->validate([
            'title' => 'required|max:30',
            'thumbnail' => $post->exists ? 'mimes:png,jpg' : 'required|mimes:png,jpg|max:20000',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)], // La valeur ne doit pas déjà existé dans la table
            'category_id' => ['required', Rule::exists('categories', 'id')], // La valeur existe dans la table categories, colonne id
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}
