<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class OrganizationController extends Controller
{
    public function choice()
    {
        return Inertia::render('Organization/Choice');
    }
}
