<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Affichage de toutes les images
    public function index()
    {
        $galleries = Gallery::all();
        return inertia('GalleryPhotos', ['galleries' => $galleries]);
    }

    // Formulaire pour ajouter une nouvelle image
    public function create()
    {
        return inertia('Gallery/Create');
    }

    // Stocker une nouvelle image dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'comment' => 'nullable|string'
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'image' => $imagePath,
            'comment' => $request->input('comment')
        ]);

        return redirect()->route('dashboard')->with('successMessage', 'Mise à jour réussie !');
    }

    // Formulaire pour éditer une image existante
    public function edit(Gallery $gallery)
    {
        return inertia('Gallery/Edit', ['gallery' => $gallery]);
    }

    // Mettre à jour l'image dans la base de données
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image' => 'sometimes|image|max:2048',
            'comment' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            Storage::disk('public')->delete($gallery->image);

            // Ajouter la nouvelle image
            $imagePath = $request->file('image')->store('gallery', 'public');
            $gallery->image = $imagePath;
        }

        $gallery->comment = $request->input('comment');
        $gallery->save();

        return redirect()->route('gallery.index')->with('message', 'Image mise à jour avec succès!');
    }

    // Supprimer l'image de la base de données
    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect()->route('gallery.index')->with('message', 'Image supprimée avec succès!');
    }
}
