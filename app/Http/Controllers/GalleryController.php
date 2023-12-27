<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class GalleryController extends Controller
{

    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        return inertia('GalleryPhotos', ['galleries' => $galleries]);
    }

    public function create()
    {
        return inertia('Gallery/Create');
    }

    public function store(GalleryRequest $request)
    {
        $imagePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'image' => $imagePath,
            'comment' => $request->input('comment')
        ]);

        return redirect()->route('dashboard')->with('successMessage', 'L\'image à été ajoutée !');
    }

    public function edit(Gallery $gallery)
    {
        return inertia('Gallery/Edit', ['gallery' => $gallery]);
    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image);

            $imagePath = $request->file('image')->store('gallery', 'public');
            $gallery->image = $imagePath;
        }

        $gallery->comment = $request->input('comment');
        $gallery->save();

        return redirect()->route('dashboard')->with('successMessage', 'L\'image a été mis à jour !');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect()->route('dashboard')->with('successMessage', 'L\'image a été supprimée !');
    }

    public function choice()
    {
        return Inertia::render('Gallery/Choice');
    }

    public function manage()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        return inertia('Gallery/Manage', ['galleries' => $galleries]);
    }
}
