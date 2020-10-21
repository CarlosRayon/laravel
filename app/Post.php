<?php

namespace App;

use App\Category;
use App\PostImage;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'url_clean', 'content', 'category_id', 'posted'];

    public function category()
    {
        /* Relacion tipo belong video 61 */
        return $this->belongsTo(Category::class);
    }
    public function image()
    {
        /* Relacion tipo belong video 61 */
        return $this->hasOne(PostImage::class);
    }
}
