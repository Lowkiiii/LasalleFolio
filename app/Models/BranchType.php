<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchType extends Model
{
    use HasFactory;

    protected $table = 'tbl_branch_profile';

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['branch_name'];

    /**
     * Get the users associated with the user type.
     */
    
}
