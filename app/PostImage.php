<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = ['post_id', 'images'];

    public function post()
    {
        /* Relacion tipo belong video 61 */
        return $this->belongsTo(Post::class);
    }
}
