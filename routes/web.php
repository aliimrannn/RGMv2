<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\GrantMemberController;
use App\Http\Controllers\AcademicianController;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Routes for Projects (iRMC Admin, iRMC Staff, Project Leader)
Route::resource('projects', ProjectController::class);

// Search Projects (iRMC Admin, iRMC Staff)
Route::get('projects/search', [ProjectController::class, 'search'])->name('projects.search');

// Routes for Milestones (Project Leader)
Route::resource('milestones', MilestoneController::class);

// Routes for Grant Members (Project Leader)
Route::resource('grantmembers', GrantMemberController::class);

// Routes for Academician Management (iRMC Admin)
Route::resource('academicians', AcademicianController::class);

// Auth Routes (for login, registration, etc.)
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

