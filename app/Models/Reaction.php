<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
    ];

    /**
     * The user who reacted to the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The post that received the reaction.
     */
    public function post()
    {
        return $this->belongsTo(UserPosts::class);
    }
}
