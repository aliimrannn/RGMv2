<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResearchGrantController;

Route::resource('research-grants', ResearchGrantController);
Route::resource('academians', AcademianController);
Route::resource('milestones', ProjectMilestoneController);
