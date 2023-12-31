<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album; // Import the Album class
use App\Models\User; // Import the User class
use Illuminate\Support\Facades\Log; // Import the Log class

class AlbumController extends Controller
{

    public function create()
    {
        $users = User::all();
        return view('createAlbum', ['users' => $users]);
    }

    public function store(Request $request)
    {
        Log::info($request->all()); // add this line
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'cover_image' => 'required|image',
            'owner_id' => 'required|exists:users,id',
        ]);

        if ($request->hasFile('cover_image')) {
            $filename = $request->cover_image->getClientOriginalName();
            $path = $request->cover_image->storeAs('cover_images', $filename, 'public');
            $validated['cover_image'] = $path;
        }

        $album = new Album($validated);
        $album->save();

        // Attach the album to the user
        $user = User::find($validated['owner_id']);
        $user->albums()->attach($album->id);

        return redirect('/albums/create');
    }
}
