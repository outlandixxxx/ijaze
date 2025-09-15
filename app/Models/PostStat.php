<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostStat extends Model
{
   
      protected $fillable = [
        'post_id',
        'views',
        'likes',
        'shares',
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    
}

}
