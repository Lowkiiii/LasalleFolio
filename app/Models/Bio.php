<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    use HasFactory;
        // Define the fillable attributes
        protected $fillable = [
            'user_id', // Foreign key to the users table
            'bio',     // The bio text
        ];
    
        // Define the relationship with the User model
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    
}
