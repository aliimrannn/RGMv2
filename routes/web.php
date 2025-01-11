<?php

use App\Http\Controllers\ResearchGrantController;
use App\Http\Controllers\ProjectMilestoneController;
use App\Http\Controllers\GrantMemberController;
use App\Http\Controllers\AcademicianController;
use Illuminate\Support\Facades\Route;

// Route for the homepage (or a default page)
Route::get('/', function () {
    return view('welcome');
});

// Routes for Research Grant (Project) Management by iRMC Admin
Route::resource('projects', ResearchGrantController::class); // Resource route for projects (Create, Edit, Delete, etc.)
Route::resource('academicians', AcademicianController::class); // Resource route for academicians

// Routes for Project Milestones (linked to ResearchGrant)
Route::resource('milestones', ProjectMilestoneController::class); // Resource route for milestones (Create, Update, etc.)

// Routes for Grant Members
Route::resource('grant-members', GrantMemberController::class); // Resource route for adding/removing members

// Routes for iRMC Staff (view and edit projects, no authentication)
Route::get('staff/projects', [ResearchGrantController::class, 'index'])->name('staff.projects.index');
Route::get('staff/projects/{id}', [ResearchGrantController::class, 'show'])->name('staff.projects.show');
Route::put('staff/projects/{id}', [ResearchGrantController::class, 'update'])->name('staff.projects.update');

// Routes for Project Leaders (manage members and milestones)
Route::get('leader/projects/{id}/members', [GrantMemberController::class, 'index'])->name('leader.projects.members');
Route::post('leader/projects/{id}/members', [GrantMemberController::class, 'store'])->name('leader.projects.members.store');
Route::delete('leader/projects/{id}/members/{member_id}', [GrantMemberController::class, 'destroy'])->name('leader.projects.members.destroy');

Route::get('leader/projects/{id}/milestones', [ProjectMilestoneController::class, 'index'])->name('leader.projects.milestones');
Route::post('leader/projects/{id}/milestones', [ProjectMilestoneController::class, 'store'])->name('leader.projects.milestones.store');
Route::put('leader/projects/{id}/milestones/{milestone_id}', [ProjectMilestoneController::class, 'update'])->name('leader.projects.milestones.update');

Route::resource('research-grants', ResearchGrantController::class);