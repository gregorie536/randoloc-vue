<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommitteeController extends Controller
{
    public function index()
    {
        $committees = Committee::all();
        return Inertia::render('Committees/Index', ['committees' => $committees]);
    }

    public function create()
    {
        return Inertia::render('Organization/Committee/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Committee::create($request->all());

        return redirect()->route('committees.index')->with('successMessage', 'La commission a été créée !');
    }

    public function edit(Committee $committee)
    {
        return Inertia::render('Organization/Committee/Edit', ['committee' => $committee]);
    }

    public function update(Request $request, Committee $committee)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $committee->update($request->all());

        return redirect()->route('committees.index')->with('successMessage', 'La commission a été mise à jour !');
    }

    public function destroy(Committee $committee)
    {
        $committee->delete();

        return redirect()->route('committees.index')->with('successMessage', 'La commission a été supprimée !');
    }

    public function show(Committee $committee)
    {
        return Inertia::render('Committees/Show', ['committee' => $committee]);
    }

    public function choice()
    {
        return Inertia::render('Organization/Committee/Choice');
    }

    public function manage()
    {
        $committees = Committee::all();
        return Inertia::render('Organization/Committee/Manage', ['committees' => $committees]);
    }
}

