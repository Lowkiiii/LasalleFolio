<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class QuizPoints extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_quiz_points';

    protected $fillable = ['user_id', 'points'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
