<?php

namespace App\Http\Controllers;

use App\Models\ResearchGrant;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = ResearchGrant::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        ResearchGrant::create($request->all());
        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        $project = ResearchGrant::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = ResearchGrant::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = ResearchGrant::findOrFail($id);
        $project->update($request->all());
        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        $project = ResearchGrant::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index');
    }
}  