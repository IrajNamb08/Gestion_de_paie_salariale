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
        Schema::create('bulletin_paies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->date('mois');
            $table->decimal('salaire_brute',15,2);
            $table->decimal('salaire_net',15,2);
            $table->foreign('employer_id')->references('id')->on('employers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulletin_paies');
    }
};
