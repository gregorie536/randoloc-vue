<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Models\Event;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('active', true)
            ->orderBy('created_at', 'desc')
            ->get();
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
        return inertia('Event/Create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $event = new Event($request->validated());
        $event->user_id = auth()->id();
        $event->save();

        return redirect()->route('dashboard')->with('successMessage', 'L\'évènement a été créé !');
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
    public function update(EventRequest $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->validated());

        return redirect()->route('dashboard')->with('successMessage', 'L\'évènement a été mis à jour !');
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

        return redirect()->route('dashboard')->with('successMessage', 'L\'évènement a été supprimé !');
    }

    public function choice()
    {
        return Inertia::render('Event/Choice');
    }

    public function manage()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return Inertia::render('Event/Manage', ['events' => $events]);
    }
}
