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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departement_id');
            $table->unsignedBigInteger('fonction_id');
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('profil')->nullable();
            $table->string('sexe');
            $table->string('contrat');
            $table->string('email');
            $table->bigInteger('cin');
            $table->bigInteger('numCnaps')->nullable();
            $table->decimal('salaire',30,2);
            $table->date('dateEmbauche');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
