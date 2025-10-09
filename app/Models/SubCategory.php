<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

     
   protected $fillable = [
        'name',
        'slug',
       
    ];

     public function posts() {
        return $this->belongsToMany(Post::class, 'post_category_subcategory')
                    ->withPivot('category_id')
                    ->withTimestamps();
    }
}
