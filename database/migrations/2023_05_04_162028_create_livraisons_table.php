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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            //$table->string('titre');
            $table->string('adresse_depart');
            $table->string('adresse_arrivee');
            $table->string('heure_de_confirmation')->nullable();
            $table->string('heure_de_demarrage')->nullable();
            $table->enum('status_livraison', ['en cours de validation', 'Confirmer', 'Valider', 'Rejeter', 'en cours de livraison','Démarrer', 'Terminer', 'Non payée', 'Payée']); 
            $table->enum('type_de_colis', ['Document et livre','Nourriture et boisson','Habit et accessoire','Fourniture de maison','Appareil électronique','Fourniture de bureau','Produit pharmaceutique'])->nullable(); 
            $table->string('messageLivreur')->nullable();
            $table->string('prix')->default(700);
            $table->string('mode_de_paiement')->nullable();
            $table->foreignId('commande_id')->nullable()->constrained();
            $table->foreignId('livreur_id')->nullable()->constrained('livreurs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('montant_total')->nullable();
            $table->foreignId('gestionnaire_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('restaurant_id')->nullable()->constrained('restaurants');
            $table->foreignId('boutique_id')->nullable()->constrained('boutiques');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();

            //New motif

            $table->date('livraison_date');

            // $table->date('created_at');
            // $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
