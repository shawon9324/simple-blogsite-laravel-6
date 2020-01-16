<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Category extends Model
{
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function getRouteKeyName()
    {
    	return 'category_name';
    }   
}