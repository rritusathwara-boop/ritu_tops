<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserProfile; //session-10 Task-1
use App\Models\Group;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //session-10 Task-1 
    /*
     public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
    */

    //session-10 Task-3
    /*
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    */
    //session-12 Task-3
    protected $fillable = [
    'name',
    'email',
    'password',
    'profile_picture',
];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

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

}
