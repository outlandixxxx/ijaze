<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

      protected $fillable = ['article_id', 'type', 'path', 'caption', 'order', 'thumbnail'];

    public function posts() {
        return $this->belongsTo(Post::class);
    }
}
