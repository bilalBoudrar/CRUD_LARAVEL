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
        schema::create('eleve_active', function(Blueprint $table){
            $table->unsignedBigInteger('id_eleve');
            $table->unsignedBigInteger('id_activ');
            $table->foreign('id_activ')->references('id')->on('activite_models');
            $table->foreign('id_eleve')->references('id')->on('eleve_models');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
