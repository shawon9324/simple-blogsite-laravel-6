<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Laravelista\Comments\Commentable;


class Blog extends Model
{
    protected $fillable = ['blog_title', 'category_id', 'slug', 'blog_description', 'image'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    use Commentable;
    
}