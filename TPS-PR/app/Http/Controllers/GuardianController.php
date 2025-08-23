<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuardianController extends Controller
{
    public function index()
    {
        return view('guardian.dashboard'); // load guardian dashboard view
    }
}

