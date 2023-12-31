<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Member;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\CommitteeMember;

class CommitteeController extends Controller
{
    public function index()
    {
        $committees = Committee::all();
        return Inertia::render('Committees/Index', ['committees' => $committees]);
    }

    public function create()
    {
        $members = Member::all();
        return Inertia::render(
            'Organization/Committee/Create',
            [
                'members' => $members
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'member_ids' => 'required|array',
            'member_ids.*' => 'exists:members,id'
        ]);

        $committee = Committee::create(['name' => $request->name]);

        foreach ($request->member_ids as $memberId) {
            CommitteeMember::create([
                'committee_id' => $committee->id,
                'member_id' => $memberId
            ]);
        }

        return redirect()->route('dashboard')->with('successMessage', 'La commission a été créée avec succès.');
    }

    public function edit(Committee $committee)
    {
        $committee->load('members');
        $selectedMemberIds = $committee->members->pluck('id')->toArray();

        $members = Member::all();

        return Inertia::render('Organization/Committee/Edit', [
            'committee' => $committee,
            'members' => $members,
            'selectedMemberIds' => $selectedMemberIds,
        ]);
    }





    public function update(Request $request, Committee $committee)
    {
        $request->validate([
            'name' => 'required',
            'member_ids' => 'required|array',
            'member_ids.*' => 'exists:members,id'
        ]);

        $committee->update(['name' => $request->name]);
        $committee->updateMembers($request->member_ids);

        return redirect()->route('dashboard')->with('successMessage', 'La commission a été mise à jour !');
    }


    public function destroy(Committee $committee)
    {
        $committee->delete();

        return redirect()->route('dashboard')->with('successMessage', 'La commission a été supprimée !');
    }

    public function show(Committee $committee)
    {
        return Inertia::render('Organization/Committees/Show', ['committee' => $committee]);
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
