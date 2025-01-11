<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectMilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grant = ResearchGrant::with('milestones')->findOrFail($grantId);
        return view('project-milestones.index', compact('grant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grant = ResearchGrant::findOrFail($grantId);
        return view('project-milestones.create', compact('grant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'MilestoneName' => 'required|string|max:255',
            'TargetCompletionDate' => 'required|date',
            'Deliverable' => 'required|string|max:500',
        ]);
    
        $grant = ResearchGrant::findOrFail($grantId);
        $grant->milestones()->create($request->all());
    
        return redirect()->route('project-milestones.index', $grantId)
            ->with('success', 'Milestone created successfully.');
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
        $grant = ResearchGrant::findOrFail($grantId);
        $milestone = ProjectMilestone::findOrFail($milestoneId);
    
        return view('project-milestones.edit', compact('grant', 'milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'MilestoneName' => 'required|string|max:255',
            'TargetCompletionDate' => 'required|date',
            'Deliverable' => 'required|string|max:500',
            'Status' => 'required|string|max:255',
            'Remarks' => 'nullable|string|max:500',
            'DateUpdated' => 'required|date',
        ]);
    
        $milestone = ProjectMilestone::findOrFail($milestoneId);
        $milestone->update($request->all());
    
        return redirect()->route('project-milestones.index', $grantId)
            ->with('success', 'Milestone updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $milestone = ProjectMilestone::findOrFail($milestoneId);
        $milestone->delete();
    
        return redirect()->route('project-milestones.index', $grantId)
            ->with('success', 'Milestone deleted successfully.');
    }
}
