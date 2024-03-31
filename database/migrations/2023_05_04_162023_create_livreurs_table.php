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
        Schema::create('livreurs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('sexe')->nullable();
            $table->string('adress')->nullable();
            $table->string('photo')->nullable();
            $table->string('email')->nullable();
            $table->enum('disponibilite', ['disponible', 'indisponible'])->default('disponible');
            $table->string('nbre_livraison')->nullable();
            $table->string('nbre_commande')->nullable();
            $table->string('nbre_course')->nullable();

            $table->unsignedBigInteger('livreur_id')->unsigned()->index()->nullable();
            $table->foreign('livreur_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade')->nullable();

            $table->unsignedBigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livreurs');
    }
};
