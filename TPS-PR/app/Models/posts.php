<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'content', 'user_id', 'status'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

