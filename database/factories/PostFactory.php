<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        // Attribue une catégorie préexistance à un post si elle existe
        // Sinon, créer une nouvelle catégorie
        $myCategory = (Category::find($random = rand(1, 10))) ? $random : Category::factory();


        return [

            'title' => $this->faker->words(3, true),
            'excerpt' => '<p>'.implode('</p><p>', $this->faker->paragraphs(2)).'</p>',
            'body' => '<p>'.implode('</p><p>', $this->faker->paragraphs(6)).'</p>',
            'slug' => $this->faker->sentence,
            'user_id' => User::factory(),
            'category_id' => $myCategory


        ];
    }
}

