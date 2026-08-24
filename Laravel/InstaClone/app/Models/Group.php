<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}