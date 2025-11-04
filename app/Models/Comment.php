<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'name',
        'email',
        'content',
        'parent_id',
        'likes_count',
        'dislikes_count',
    ];

    // ✅ Relationship with Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // ✅ Replies (nested comments)
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

  
}
