<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author', 'comments'];

    /* protected $guarded = ['id']; */
    protected $fillable = [
        'title',
        'excerpt',
        'date',
        'body',
        'thumbnail',
        'category_id',
        'user_id',
        'slug'
    ];

    // Le nom de cette fonction se compose de 'scope' => obligatoire
    //                                        'Filter' => le nom de ta foncton de filtre
    public function scopeFilter($query, array $filters)
     {

        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query
            ->where(fn($query) =>
                $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('excerpt', 'like', '%' . $search . '%')
                )

        );




        // Post, donne moi le(s) post(s) qui a une catégorie dont le slug correspond
        // au slug que l'utilisateur me donne ($category)
        // Pour tester cette requête : localhost/?category=#TonSlug
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query
            ->whereHas('category', fn($query) =>
                $query
                ->where('slug', $category))

        );

        // Donne le moi le post qui a un auteur dont l'username correspond
        // à l'username que l'utilisateur me donne @author
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query
            ->whereHas('author', fn($query) =>
                $query
                ->where('username', $author))

        );


        /* return $query->get(); */
     }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function comments()
    {
        // Ici, je précise que la clé étrangère n'est pas 'author_id'
        // Mais bien 'user_id'
        return $this->hasMany(Comment::class);
    }

    public function author()
    {
        // Ici, je précise que la clé étrangère n'est pas 'author_id'
        // Mais bien 'user_id'
        return $this->belongsTo(User::class, 'user_id');
    }
}

