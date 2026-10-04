<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Song;


class Playlist extends Model
{
	/*
    use HasFactory;
	*/
	//session-7 Task-2 ya 3
	//session-9 Task-2 & 3
	/*
    protected $fillable = [
        'title',
        'description',
        'cover_image',
    ];
	*/
	
	/*
	//session- 9 Task-1
	//
	*/

	/**
     * Get all songs for the playlist.
     */

    /*
	//session-10 Task-2
    protected $fillable = [
        'name',
    ];

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }
        */
    //sesssion-10 Task-4   
    /* 
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    */
    //session-10 Task-1
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cover_image',
    ];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}