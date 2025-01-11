<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResearchGrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grants = ResearchGrant::with('leader')->get();
        return view('research-grants.index', compact('grants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academicians = Academian::all();
        return view('research-grants.create', compact('academicians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ProjectTitle' => 'required|string|max:255',
            'GrantAmount' => 'required|numeric',
            'GrantProvider' => 'required|string|max:255',
            'StartDate' => 'required|date',
            'Duration' => 'required|integer',
            'LeaderID' => 'required|exists:academians,StaffID',
        ]);
    
        ResearchGrant::create($request->all());
        return redirect()->route('research-grants.index')->with('success', 'Research grant created successfully.');
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
        $grant = ResearchGrant::findOrFail($id);
        $academicians = Academian::all();
        return view('research-grants.edit', compact('grant', 'academicians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ProjectTitle' => 'required|string|max:255',
            'GrantAmount' => 'required|numeric',
            'GrantProvider' => 'required|string|max:255',
            'StartDate' => 'required|date',
            'Duration' => 'required|integer',
            'LeaderID' => 'required|exists:academians,StaffID',
        ]);
    
        $grant = ResearchGrant::findOrFail($id);
        $grant->update($request->all());
        return redirect()->route('research-grants.index')->with('success', 'Research grant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ResearchGrant::findOrFail($id)->delete();
        return redirect()->route('research-grants.index')->with('success', 'Research grant deleted successfully.');
    }
}
