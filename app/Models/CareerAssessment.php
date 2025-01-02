<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',             // Add this line
        'data_engineering_score',
        'data_science_score',
        'ai_engineering_score'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
