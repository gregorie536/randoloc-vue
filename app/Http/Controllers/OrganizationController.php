<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{
    Board,
    Member,
    BoardMember,
    Committee
};

class OrganizationController extends Controller
{
    public function choice()
    {
        return Inertia::render('Organization/Choice');
    }

    // public function index()
    // {
    //     $members = Member::all();
    //     $boards = Board::with('member')->get();
    //     return Inertia::render('Organization', [
    //         'members' => $members,
    //         'boards' => $boards

    //     ]);
    // }
    public function index()
    {
        $members = Member::all();
        $boards = Board::with('member')->get();
        $boardMemberIds = BoardMember::pluck('member_id');
        $boardMembers = Member::whereIn('id', $boardMemberIds)->get();
        $committees = Committee::with('members')->get();

        return Inertia::render('Organization', [
            'members' => $members,
            'boards' => $boards,
            'boardMembers' => $boardMembers,
            'committees' => $committees
        ]);
    }
}
