<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeachersController extends Controller
{
    //
    public function index()
    {
        // Logic to display the list of teachers
        return view('components.staff.manage');
    }

    public function create()
    {
        // Logic to show the form for creating a new teacher
        return view('components.staff.create');
        
    }
}
