<?php

namespace App\Http\Controllers;

use App\Models\ResearchGrant;
use App\Models\Academian;
use Illuminate\Http\Request;

class GrantMemberController extends Controller
{
    public function create($grantId, Request $request)
    {
        $request->validate([
            'StaffID' => 'required|exists:academians,StaffID',
        ]);

        $grant = ResearchGrant::findOrFail($grantId);
        $academian = Academian::findOrFail($request->StaffID);

        $grant->academians()->attach($academian->StaffID);

        return redirect()->route('research-grants.show', $grantId)
            ->with('success', 'Member added to project successfully.');
    }

    public function index($grantId)
    {
        $grant = ResearchGrant::findOrFail($grantId);
        return view('grant-members.index', compact('grant'));
    }

    public function update($grantId, $academianId, Request $request)
    {
        return redirect()->route('research-grants.show', $grantId)
            ->with('success', 'Member details updated successfully.');
    }

    public function destroy($grantId, $academianId)
    {
        $grant = ResearchGrant::findOrFail($grantId);

        $grant->academians()->detach($academianId);

        return redirect()->route('research-grants.show', $grantId)
            ->with('success', 'Member removed from project successfully.');
    }
}

