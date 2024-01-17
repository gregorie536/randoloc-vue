<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Member;
use App\Models\BoardMember;
use Illuminate\Http\Request;
use App\Http\Requests\BoardRequest;
use Inertia\Inertia;


class BoardController extends Controller
{
    // public function index()
    // {
    //     $boards = Board::with('member')->get();
    //     return Inertia::render('Boards/Index', ['boards' => $boards]);
    // }

    // public function index()
    // {
    //     $members = Member::all();
    //     $boards = Board::with('member')->get();
    //     return Inertia::render('Organization/Member/Index', [
    //         'members' => $members,
    //         'boards' => $boards
    //     ]);
    // }
    // test

    // public function index()
    // {
    //     $boardMembers = BoardMember::all();
    //     return Inertia::render('Organization', [
    //         'boardMembers' => $boardMembers,
    //     ]);
    // }

    // test

    public function create()
    {
        $members = Member::all();
        $boards = Board::all();

        return Inertia::render('Organization/Board/Create', [
            'members' => $members,
            'boards' => $boards
        ]);
    }

    public function store(BoardRequest $request)
    {
        if (Board::where('role', $request->role)->exists()) {
            return redirect()->back()->withErrors(['role' => 'Ce rôle est déjà attribué !']);
        }

        Board::create($request->all());

        return redirect()->route('dashboard')->with('successMessage', 'Le rôle a été créé !');
    }

    public function edit(Board $board)
    {
        $members = Member::all();
        $roles = ['Présidence', 'Vice-présidence', 'Secrétariat', 'Secrétariat adjoint', 'Trésorerie', 'Trésorerie adjointe'];

        return Inertia::render('Organization/Board/Edit', [
            'board' => $board,
            'members' => $members,
            'roles' => $roles
        ]);
    }

    public function update(BoardRequest $request, Board $board)
    {
        $board->update($request->all());

        return redirect()->route('dashboard')->with('successMessage', 'Le rôle a été mis à jour !');
    }

    // public function destroy(Board $board)
    // {
    //     $board->delete();

    //     return redirect()->route('dashboard')->with('successMessage', 'Le rôle a été supprimé !');
    // }

    // public function show(Board $board)
    // {
    //     return Inertia::render('Boards/Show', ['board' => $board]);
    // }

    public function choice()
    {
        return Inertia::render('Organization/Board/Choice');
    }

    public function manage()
    {
        $boards = Board::with('member')->get();
        return Inertia::render('Organization/Board/Manage', ['boards' => $boards]);
    }

    public function editBoardMembers()
    {
        $members = Member::all();
        $currentBoardMemberIds = BoardMember::pluck('member_id')->toArray();

        return Inertia::render('Organization/Board/EditBoardMembers', [
            'members' => $members,
            'currentBoardMemberIds' => $currentBoardMemberIds
        ]);
    }


    public function updateBoardMembers(Request $request)
    {
        $request->validate([
            'member_ids' => 'required|array',
            'member_ids.*' => 'exists:members,id'
        ]);

        BoardMember::truncate();

        foreach ($request->member_ids as $memberId) {
            BoardMember::create(['member_id' => $memberId]);
        }

        return redirect()->route('dashboard')->with('successMessage', 'Membres du conseil mis à jour.');
    }
}
