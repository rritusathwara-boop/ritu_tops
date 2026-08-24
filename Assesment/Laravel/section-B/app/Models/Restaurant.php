<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
    ];

    /**
     * Relationship: A Restaurant has many MenuItems.
     */
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }
}
