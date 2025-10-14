<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model { 


  protected $fillable = [
         'author_id',
        'title',
        'slug',
        'description',
        'content',
    ];



     // Author relationship
    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Many-to-many categories
    public function categories() {
        return $this->belongsToMany(Category::class, 'post_category_subcategory')
                    ->withPivot('sub_category_id')
                    ->withTimestamps();
    }

    // Many-to-many subcategories
    public function subcategories() {
        return $this->belongsToMany(SubCategory::class, 'post_category_subcategory')
                    ->withPivot('category_id')
                    ->withTimestamps();
    }

    // Tags
    public function tags() {
        return $this->belongsToMany(Tag::class, 'posts_tags');
    }

    // Comments
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    // Likes
    public function likes() {
        return $this->morphMany(Like::class, 'likeable');
    }

    // Views
    public function views() {
        return $this->hasMany(View::class);
    }

    // Media
    public function media() {
        return $this->hasMany(Media::class);
    }

    /**
     * Helper: Get all category/subcategory pairs for this post
     */
    public function placements() {
        return $this->belongsToMany(SubCategory::class, 'post_category_subcategory')
                    ->withPivot('category_id')
                    ->withTimestamps();
    }
}
