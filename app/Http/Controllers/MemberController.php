<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use Illuminate\Http\Request;
use App\Models\Member;
use Inertia\Inertia;

class MemberController extends Controller
{
    // public function index()
    // {
    //     $members = Member::all();
    //     return Inertia::render('Members/Index', ['members' => $members]);
    // }

    public function create()
    {
        return Inertia::render('Organization/Member/Create');
    }

    public function store(MemberRequest $request)
    {
        Member::create($request->all());

        return redirect()->route('organization.members.manage');
    }

    public function edit(Member $member)
    {
        return Inertia::render('Organization/Member/Edit', ['member' => $member]);
    }

    public function update(MemberRequest $request, Member $member)
    {
        $member->update($request->all());

        return redirect()->route('organization.members.manage');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('organization.members.manage');
    }

    // public function show(Member $member)
    // {
    //     return Inertia::render('Members/Show', ['member' => $member]);
    // }

    public function choice()
    {
        return Inertia::render('Organization/Member/Choice');
    }

    public function manage()
    {
        $members = Member::all();
        return Inertia::render('Organization/Member/Manage', ['members' => $members]);
    }
}
