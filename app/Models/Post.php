<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model { 


  protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'content',
    ];



    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function media() {
        return $this->hasMany(Media::class);
    }

    public function stats() {
        return $this->hasOne(PostStat::class);
    }
}
