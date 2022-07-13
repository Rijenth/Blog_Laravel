<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  \App\Models\User;
use  \App\Models\Category;
use  \App\Models\Post;
use  \App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // On crée un nouveau faux utilisateur
        /* $user =  User::factory()->create(/* [
            'name' => 'Tom Bennet'
        ] );*/



        // On crée un post à partir du faux utilisateur
        Post::factory(50)->create(/* [
            'user_id' => $user->id
        ] */);

        /* On crée des commentaires sur certains posts */
        Comment::factory(30)->create();

        User::factory()->create([
            'name' => 'rijenth',
            'username' => 'rijenth',
            'email' => 'rijenth@live.fr',
            'password' => 'rijenth',
            'is_admin' => 1
        ]);

    }
}
