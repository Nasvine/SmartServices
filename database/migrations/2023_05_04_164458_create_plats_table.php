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
        Schema::create('plats', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description');
            $table->string('prix');
            $table->string('lienPhoto');
            $table->foreignId('restaurant_id')->nullable()->constrained();
            $table->foreignId('category_plat_id')->nullable()->constrained();
            $table->foreignId('promotion_id')->nullable()->constrained();
            $table->foreignId('ligne_commande_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plats');
    }
};
