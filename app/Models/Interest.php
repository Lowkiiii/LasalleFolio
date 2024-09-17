<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\User;


class Interest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'interest_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
