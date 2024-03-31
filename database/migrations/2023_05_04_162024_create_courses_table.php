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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->string('adresse_depart');
            $table->string('adresse_livraison');
            //$table->string('numero_client');
            $table->string('date_de_livraison')->nullable();
            $table->string('heure_de_confirmation')->nullable();
            $table->string('montant_total')->nullable();
            $table->string('prix')->default('500');
            $table->string('mode_de_paiement')->nullable();
            $table->enum('status_livraison',['en cours de validation','Rejeter', 'Valider', 'en cours de livraison', 'Démarrer', 'Terminer', 'nonPayer', 'Payer']); 
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('livreur_id')->nullable()->constrained();
            $table->foreignId('gestionnaire_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
