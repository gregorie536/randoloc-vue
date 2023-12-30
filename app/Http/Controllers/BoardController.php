<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Member;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::with('member')->get();
        return Inertia::render('Boards/Index', ['boards' => $boards]);
    }

    public function create()
    {
        $members = Member::all();
        return Inertia::render('Organization/Board/Create', ['members' => $members]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'role' => 'required'
        ]);

        Board::create($request->all());

        return redirect()->route('boards.index')->with('successMessage', 'Le rôle a été créé !');
    }

    public function edit(Board $board)
    {
        $members = Member::all();
        return Inertia::render('Organization/Board/Edit', [
            'board' => $board,
            'members' => $members
        ]);
    }

    public function update(Request $request, Board $board)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'role' => 'required'
        ]);

        $board->update($request->all());

        return redirect()->route('boards.index')->with('successMessage', 'Le rôle a été mis à jour !');
    }

    public function destroy(Board $board)
    {
        $board->delete();

        return redirect()->route('boards.index')->with('successMessage', 'Le rôle a été supprimé !');
    }

    public function show(Board $board)
    {
        return Inertia::render('Boards/Show', ['board' => $board]);
    }

    public function choice()
    {
        return Inertia::render('Organization/Board/Choice');
    }

    public function manage()
    {
        $boards = Board::with('member')->get();
        return Inertia::render('Organization/Board/Manage', ['boards' => $boards]);
    }
}
