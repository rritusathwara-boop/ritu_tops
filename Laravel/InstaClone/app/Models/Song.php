<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Song;

class Song extends Model
{
    /*
    protected $fillable = [
        'playlist_id',
        'name',
        'artist',
    ];

    public function playlist(): BelongsTo
    {
        return $this->belongsTo(Playlist::class);
    }
        */
    //session-10 Task-4
    use HasFactory;

    protected $fillable = [
        'title',
        'playlist_id',
    ];
}