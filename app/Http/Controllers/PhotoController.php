<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Album; // Import the Album model class
use Intervention\Image\ImageManager; // Import the Image class
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage; // Import the Storage class


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::all();
        return view('photos.index', compact('photos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($albumId)
    {
        $albums = Album::all();
        return view('photos.create', ['albums' => $albums, 'selectedAlbumId' => $albumId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photos' => 'required',
            'album_id' => 'required|exists:albums,id',  // Validate that an album ID is provided and it exists in the albums table
        ]);

        if($request->hasfile('photos'))
        {
            $album = Album::find($request->album_id);
            $directory = 'photos/' . $album->id;

            foreach($request->file('photos') as $file)
            {
                $name = $file->getClientOriginalName();
                $path = $file->storeAs($directory, $name, 'public');  // Store the file in the 'photos' directory in the storage folder

                // Check if a record for this file already exists in the same directory
                $existingPhoto = Photo::where('fileName', $name)->where('directory', $directory)->first();
                if (!$existingPhoto) {
                    // If not, create a new record
                    $photo = new Photo();
                    $photo->fileName = $name;
                    $photo->directory = $directory;
                    $photo->title = $name;
                    $photo->caption = $name;
                    $photo->description = $name;
                    $photo->mime_type = $file->getClientMimeType();
                    $photo->extension = $file->getClientOriginalExtension();
                    $photo->size = $file->getSize();
                    list($width, $height) = getimagesize(storage_path('app/public/'.$path));
                    $photo->width = $width;
                    $photo->height = $height;

                    // Generate a thumbnail
                    $imageManager = new ImageManager(new Driver());
                    $image = $imageManager->read(storage_path('app/public/' . $path));
                    $thumbnailDirectory = $directory . '/thumbnails';
                    $thumbnailPath = $thumbnailDirectory . '/' . $name;

                    $image->scaleDown(200);

                    // Save the thumbnail to a temporary path
                    $tempPath = tempnam(sys_get_temp_dir(), 'thumbnail');
                    $image->save($tempPath);

                    // Use Laravel's Storage facade to store the thumbnail image
                    Storage::disk('public')->put($thumbnailPath, file_get_contents($tempPath));

                    $photo->thumbnail = $thumbnailPath;
                    $album->photos()->save($photo);
                }
            }
        }

        return back()->with('success', 'Photos uploaded successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showAlbumPhotos($id)
    {
        $album = Album::with('photos')->find($id);  // Fetch the album and its photos
        return view('albumPhotos', ['album' => $album]);  // Return the 'albumPhotos' view with the album
    }
}
