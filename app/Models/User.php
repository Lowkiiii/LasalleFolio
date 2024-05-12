<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany; 
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'full_address',
        'user_type_id',
        'email',
        'password',
        'sex',
        'public_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userType(){
        return $this->belongsTo(UserType::class, 'user_type_id', 'id');
    }
    
    public function userProjects(): HasMany
    {
        return $this->hasMany(UserProject::class);
    }

    public function userSkills(): HasMany
    {
        return $this->hasMany(UserSkills::class);
    }

    public function userAcademics(): HasMany
    {
        return $this->hasMany(UserAcademics::class);
    }

    public function userHonorsAndAwards(): HasMany
    {
        return $this->hasMany(UserHonorsAndAwards::class);
    }

    public function userPosts()
    {
        return $this->hasMany(UserPosts::class);
    }

    public function index()
    {
        $userPosts = Auth::user()->userPosts;
        return view('student.studentDashboard', compact('userPosts'));
    }

    // User.php

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
