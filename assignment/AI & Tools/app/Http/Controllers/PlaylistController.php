<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    // create API endpoint to add a song to user’s playlist
    public function addSong(Request $request)
    {
        $validated = $request->validate([
            'song_id' => ['required', 'integer', 'exists:songs,id'],
            'playlist_id' => ['nullable', 'integer', 'exists:playlists,id'],
        ]);

        $user = Auth::user();

        if (! $user) {
            return response()->json([
                'message' => 'Unauthenticated.',
            ], 401);
        }

        $playlist = null;

        if (! empty($validated['playlist_id'])) {
            $playlist = $user->playlists()->find($validated['playlist_id']);

            if (! $playlist) {
                return response()->json([
                    'message' => 'Playlist not found for this user.',
                ], 404);
            }
        } else {
            $playlist = $user->playlists()->firstOrCreate([
                'name' => 'Favorites',
            ]);
        }

        $song = Song::findOrFail($validated['song_id']);

        if ($playlist->songs()->where('songs.id', $song->id)->exists()) {
            return response()->json([
                'message' => 'Song already exists in this playlist.',
                'playlist_id' => $playlist->id,
                'song_id' => $song->id,
            ], 200);
        }

        $playlist->songs()->attach($song->id);

        return response()->json([
            'message' => 'Song added to playlist successfully.',
            'playlist_id' => $playlist->id,
            'song_id' => $song->id,
        ], 201);
    }
}
