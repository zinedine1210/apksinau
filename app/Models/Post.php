<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
