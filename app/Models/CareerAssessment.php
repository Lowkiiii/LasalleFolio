<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',             // Add this line
        'junior_programmer_score',
        'junior_technical_artist_score',
        'junior_game_designer_score',
        'ui_ux_designer_score',
        'qa_tester_score'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
