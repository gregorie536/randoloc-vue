<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Inertia\Inertia;
use App\Models\Category;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('active', true)->get();
        $categories = Category::all();

        return Inertia::render('Event', [
            'events' => $events,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return Inertia::render('Event/Create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'supervisor' => 'nullable|string',
            'day' => 'nullable|string',
            'date' => 'nullable|date',
            'number_km' => 'nullable|numeric',
            'location' => 'required|string',
            'active' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Créer une nouvelle instance de l'événement
        $event = new Event($validatedData);

        // Définir user_id comme l'ID de l'utilisateur connecté
        $event->user_id = auth()->id();

        // Enregistrer l'événement
        $event->save();

        // Rediriger vers une page appropriée avec un message de succès
        return redirect()->route('events.manage')->with('success', 'Événement créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return Inertia::render('EventShow', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::all();

        return Inertia::render('Event/Edit', [
            'event' => $event,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'supervisor' => 'nullable|string',
            'day' => 'nullable|string',
            'date' => 'nullable|date',
            'number_km' => 'nullable|numeric',
            'location' => 'required|string',
            'active' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        $event = Event::findOrFail($id);
        $event->update($validatedData);

        return redirect()->route('events.manage')->with('success', 'Événement mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.manage')->with('success', 'Événement supprimé avec succès.');
    }

    public function choice()
    {
        return Inertia::render('Event/Choice');
    }

    public function manage()
    {
        $events = Event::all();
        return Inertia::render('Event/Manage', ['events' => $events]);
    }
}
