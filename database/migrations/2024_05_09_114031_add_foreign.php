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
        Schema::table('eleve_models', function (Blueprint $table) {
            $table->unsignedBigInteger('id_club');
            $table->foreign('id_club')->references('id')->on('club_models');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eleve_models', function (Blueprint $table) {
            //
        });
    }
};
