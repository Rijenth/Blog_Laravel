<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body'
    ];

    public function post() // Laravel devine que la colonne s'appelle 'post_id'
    {
        return $this->belongsTo(Post::class);
    }

    public function author() // Ici on doit préciser car le nom de la fonction =/= du nom de la colonne
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
