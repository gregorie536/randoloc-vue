<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Member;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\CommitteeMember;
use App\Http\Requests\CommitteeRequest;

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

    public function store(CommitteeRequest $request)
    {
        $committee = Committee::create(['name' => $request->name]);

        foreach ($request->member_ids as $memberId) {
            CommitteeMember::create([
                'committee_id' => $committee->id,
                'member_id' => $memberId
            ]);
        }

        return redirect()->route('organization.committees.manage');
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

    public function update(CommitteeRequest $request, Committee $committee)
    {
        $committee->update(['name' => $request->name]);
        $committee->updateMembers($request->member_ids);

        return redirect()->route('organization.committees.manage');
    }

    public function destroy(Committee $committee)
    {
        $committee->delete();

        return redirect()->route('organization.committees.manage');
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
