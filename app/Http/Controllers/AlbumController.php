<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album; // Import the Album class
use App\Models\User; // Import the User class
use Illuminate\Support\Facades\Log; // Import the Log class
use Illuminate\Support\Facades\DB; // Import the DB class
use Intervention\Image\ImageManager; // Import the Image class
use Intervention\Image\Drivers\Gd\Driver;

class AlbumController extends Controller
{

    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

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

            // Compress the cover image
            $imageManager = new ImageManager(new Driver());
            $image = $imageManager->read(storage_path('app/public/' . $path));
            $image->save(storage_path('app/public/' . $path), 60);
        }

        $album = new Album($validated);
        $album->save();

        // Attach the album to the user
        $user = User::find($validated['owner_id']);
        $user->albums()->attach($album->id);

        return redirect('/albums/create');
    }

    public function edit($id)
    {
        $album = Album::find($id);
        $users = User::all();
        return view('albums.edit', ['album' => $album, 'users' => $users]);
    }

    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'cover_image' => 'image',
            'owner_id' => 'required|exists:users,id',
        ]);

        // Get the old owner's id before updating the album
        $oldOwnerId = $album->owner_id;

        if ($request->hasFile('cover_image')) {
            $filename = $request->cover_image->getClientOriginalName();
            $path = $request->cover_image->storeAs('cover_images', $filename, 'public');
            $validated['cover_image'] = $path;

            // Compress the cover image
            $imageManager = new ImageManager(new Driver());
            $image = $imageManager->read(storage_path('app/public/' . $path));
            $image->save(storage_path('app/public/' . $path), 10);
        }

        $album->update($validated);

        // Update the owner_id in the pivot table
        DB::table('album_user') // replace with your pivot table name
            ->where('album_id', $album->id)
            ->where('user_id', $oldOwnerId)
            ->update(['user_id' => $request->owner_id, 'updated_at' => now()]);

        return redirect()->route('albums.index');
    }

    public function destroy(Album $album)
    {
        // Remove the album from the pivot table
        $album->users()->detach();

        // Delete the album
        $album->delete();

        return redirect()->route('albums.index');
    }

    public function editPhotos($id)
    {
        $album = Album::with('photos')->find($id);
        $photos = $album->photos()->paginate(10);
        return view('albums.editPhotos', ['album' => $album, 'photos' => $photos]);
    }
}
