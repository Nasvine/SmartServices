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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->enum('type_de_commande',['Boutique', 'Restaurant', 'Autres']);
            $table->enum('status_commande',['en préparation', 'non payer', 'payer']);
            $table->string('montant_commande');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('livreur_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
