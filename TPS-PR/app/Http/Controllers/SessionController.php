<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\SchoolSession;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['sessions'] = \App\Models\SchoolSession::all();
        return view('components.Session.create-session', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'school_session_title' => 'required|string|max:255|unique:school_sessions,school_session_title',
            'session_start_date' => 'required|date|after_or_equal:today',
            'session_end_date' => 'required|date|after_or_equal:session_start_date',
        ]);

        $session = new \App\Models\SchoolSession();
        $session->school_session_title = $request->school_session_title;
        $session->session_start_date = $request->session_start_date;
        $session->session_end_date = $request->session_end_date;
        $session->school_session_status = $request->school_session_status ?? 'active';
        $session->save();

        return redirect()->route('admin.sessions.index')->with('success', 'Session created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
