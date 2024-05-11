<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAcademics extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'academics';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'education_insitution', 'course', 'major' , 'date_started', 'date_ended', 'user_id'
    ];

    protected $casts = [
        'date_started' => 'datetime',
        'date_ended' => 'datetime',
    ];
}
