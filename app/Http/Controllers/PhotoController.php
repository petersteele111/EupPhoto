<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('uploadPhotos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photos' => 'required',
        ]);
    
        if($request->hasfile('photos'))
        {
            foreach($request->file('photos') as $file)
            {
                $name = $file->getClientOriginalName();
                $photo = new Photo();
                $photo->fileName = $name;
                $photo->title = $name;
                $photo->caption = $name;
                $photo->description = $name;
                $photo->mime_type = $file->getClientMimeType();
                $photo->extension = $file->getClientOriginalExtension();
                $photo->size = $file->getSize();
                $file->move(public_path().'/images/', $name);  // Move the file to the 'images' directory in the public folder
                list($width, $height) = getimagesize(public_path().'/images/'.$name);
                $photo->width = $width;
                $photo->height = $height;
                $request->user()->photos()->save($photo);
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
}
