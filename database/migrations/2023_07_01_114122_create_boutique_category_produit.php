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
        Schema::create('boutique_category_produit', function (Blueprint $table) {
            $table->foreignId('boutique_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_produit_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_produit_boutique');
    }
};
