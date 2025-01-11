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
        Schema::create('research_grants', function (Blueprint $table) {
            $table->id('GrantID');
            $table->string('ProjectTitle');
            $table->decimal('GrantAmount', 10, 2);
            $table->string('GrantProvider');
            $table->date('StartDate');
            $table->integer('Duration');
            $table->unsignedBigInteger('LeaderID');
            $table->timestamps();
    
            $table->foreign('LeaderID')->references('StaffID')->on('academians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_grant');
    }
};
