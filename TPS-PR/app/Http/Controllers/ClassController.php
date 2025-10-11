<?php

namespace App\Http\Controllers;

use App\Models\ClassLevel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classLevels = ClassLevel::with(['streams', 'subjects'])->get()->groupBy('section');
        return view('classes.index', compact('classLevels'));
    }
}