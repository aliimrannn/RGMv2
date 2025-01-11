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
        Schema::create('grant_members', function (Blueprint $table) {
            $table->unsignedBigInteger('GrantID');
            $table->unsignedBigInteger('StaffID');
            $table->timestamps();
    
            $table->foreign('GrantID')->references('GrantID')->on('research_grants')->onDelete('cascade');
            $table->foreign('StaffID')->references('StaffID')->on('academians')->onDelete('cascade');
            $table->primary(['GrantID', 'StaffID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grant_members');
    }
};
