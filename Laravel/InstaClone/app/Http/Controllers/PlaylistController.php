<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Playlist;
use Illuminate\Http\JsonResponse;

class PlaylistController extends Controller
{
   /* 
   public function showTopSongs()
    {
        $songs = [
            'Shape of You',
            'Blinding Lights',
            'Levitating',
            'Perfect',
            'Stay'
        ];
        // session-3 Task-4
        $userName = 'Aditi';

        return view('top-songs', compact('songs', 'userName'));
    }
    */
    
    //sesion-3 Task-3
    /*
    public function topSongs()
    {
        $songs = ['Kesariya', 'Apna Bana Le', 'Tum Hi Ho', 'Chaleya'];

        return view('top-songs', compact('songs'));
    }
    */
    
    //session-5 Task-1
    /*
   public function create()
    {
        return view('playlist.create');
    }
    */
	
    /*
    //session-5 Task-4,1
    public function create()
    {
        return view('playlist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        return "Playlist added successfully!";
    }
    */
	
	/*
	//session-5 Task-5
	public function create()
    {
        return view('create-playlist');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable',
        ]);

        return redirect('/playlist/create')
            ->with('success', 'Playlist added successfully!');
    }
	*/
	
	//session-7 Task-4
	//session-8 Task-4
	/*
	public function latestPlaylists()
    {
        $playlists = Playlist::latest()->take(5)->get();

        return response()->json($playlists);
    }
	*/
	/*
	//session-7 Task-4
	public function bollywood()
	{
		$playlists = Playlist::where('genre', 'Bollywood')->get();

		return response()->json($playlists);
	}
	*/
	
	/*
	//sesson-9 Task-2
	public function createPlaylists()
	{
		Playlist::create([
			'title' => 'Bollywood Hits',
			'description' => 'Best Bollywood songs collection.',
			'cover_image' => 'https://example.com/bollywood.jpg',
		]);

		Playlist::create([
			'title' => 'Romantic Songs',
			'description' => 'A collection of romantic songs.',
			'cover_image' => 'https://example.com/romantic.jpg',
		]);

		Playlist::create([
			'title' => 'Workout Music',
			'description' => 'Energetic songs for your workout.',
			'cover_image' => 'https://example.com/workout.jpg',
		]);

		return redirect('/playlists');
	}
	*/
	
	//session-9 Task-3
	/*
	public function updatePlaylist($id)
	{
		$playlist = Playlist::find($id);

		if (!$playlist) {
			return 'Playlist not found';
		}

		$playlist->update([
			'title' => 'Updated Playlist',
		]);

		return view('playlist', compact('playlist'));
	}
	*/
	
	//session-9 Task-4
    /*
	public function deletePlaylist($id)
    {
        $playlist = Playlist::find($id);

        if (!$playlist) {
            return 'Playlist not found';
        }

        $playlist->delete();

        return 'Playlist deleted successfully!';
    }
    */

    //session-10 Task-2 
    /*
     // Fetch all songs for a specific playlist.
    public function getSongs(Playlist $playlist): JsonResponse
    {
        // Option 1: Retrieve songs directly via the relationship method
        $songs = $playlist->songs;

        return response()->json([
            'playlist' => $playlist->name,
            'songs'    => $songs,
        ]);
    }
*/

/*
//session-10 Task-2
    public function songs($id)
    {
        $playlist = Playlist::findOrFail($id);

        $songs = $playlist->songs;

        return view('playlist.songs', compact('playlist', 'songs'));
    }
    */ 
    /*
    //session-10 TAsk-4
    public function index()
    {
        $playlist = Playlist::with('songs')->get();

        return view('playlist.index', compact('playlist'));
    }
    */
    //session-10 Task-1 &
    /*
     public function index()
    {
        $playlist = Playlist::with('songs')->get();

        return view('playlist.index', compact('playlist'));
    }
    public function create()
    {
        return view('playlist.create');
    }
    //session-10 Task-2 & session-10 Task-5
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|string|max:200',          
            'cover_image' => 'nullable|image',
        ]);

        $playlist = new Playlist();

        $playlist->name = $request->input('name');
        $playlist->description = $request->input('description');

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads'), $imageName);

            $playlist->cover_image = $imageName;
        }

        $playlist->save();

        return redirect('/playlist')
            ->with('success', 'Playlist added successfully!');
    }
            */
    //session-11 Task-5
   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|max:200',
        ]);

        // ...
    }
}