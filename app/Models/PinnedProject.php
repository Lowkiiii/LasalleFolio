<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\User;

class PinnedProject extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'project_id'];

    public function pinnedByUsers()
    {
        return $this->belongsToMany(User::class, 'pinned_projects');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pinnedBy()
    {
        return $this->hasMany(PinnedProject::class);
    }

    public function project()
    {
        return $this->belongsTo(UserProject::class, 'project_id');
    }

}
