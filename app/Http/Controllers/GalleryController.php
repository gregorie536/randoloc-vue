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
        // $request->validate([
        //     'image' => 'required|image|max:2048',
        //     'comment' => 'nullable|string'
        // ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'image' => $imagePath,
            'comment' => $request->input('comment')
        ]);

        return redirect()->route('gallery.choice')->with('successMessage', 'Mise à jour réussie !');
    }

    public function edit(Gallery $gallery)
    {
        return inertia('Gallery/Edit', ['gallery' => $gallery]);
    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        // $request->validate([
        //     'image' => 'sometimes|image|max:2048',
        //     'comment' => 'nullable|string'
        // ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image);

            $imagePath = $request->file('image')->store('gallery', 'public');
            $gallery->image = $imagePath;
        }

        $gallery->comment = $request->input('comment');
        $gallery->save();

        return redirect()->route('gallery.choice')->with('message', 'Image mise à jour avec succès!');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect()->route('gallery.choice')->with('message', 'Image supprimée avec succès!');
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
