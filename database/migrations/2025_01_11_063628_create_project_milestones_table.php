<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_milestones', function (Blueprint $table) {
            $table->id('MilestoneID');
            $table->unsignedBigInteger('GrantID');
            $table->string('MilestoneName');
            $table->date('TargetCompletionDate');
            $table->string('Status')->nullable();
            $table->text('Remarks')->nullable();
            $table->string('Deliverable')->nullable();
            $table->timestamps();
    
            $table->foreign('GrantID')->references('GrantID')->on('research_grants')->onDelete('cascade');
        });    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_milestones');
    }
};
