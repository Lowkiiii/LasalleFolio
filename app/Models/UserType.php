<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_types';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_type'];

    /**
     * Get the users associated with the user type.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'user_type_id', 'id');
    }
}
