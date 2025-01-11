<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicians = Academian::all();
        return view('academians.index', compact('academicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('academians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|email|unique:academians,Email',
            'College' => 'required|string|max:255',
            'Department' => 'required|string|max:255',
            'Position' => 'required|string|max:255',
        ]);
    
        Academian::create($request->all());
        return redirect()->route('academians.index')->with('success', 'Academician added successfully.');
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
        $academian = Academian::findOrFail($id);
        return view('academians.edit', compact('academian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|email|unique:academians,Email,' . $id . ',StaffID',
            'College' => 'required|string|max:255',
            'Department' => 'required|string|max:255',
            'Position' => 'required|string|max:255',
        ]);
    
        $academian = Academian::findOrFail($id);
        $academian->update($request->all());
        return redirect()->route('academians.index')->with('success', 'Academician updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Academian::findOrFail($id)->delete();
        return redirect()->route('academians.index')->with('success', 'Academician deleted successfully.');
    }
}
