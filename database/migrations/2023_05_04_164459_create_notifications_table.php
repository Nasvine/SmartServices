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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->enum('type_de_notification', ['Courses', 'Livraison', 'Commandes', 'Autres'])->default('Autres');
            $table->enum('type_d_acteur', ['Client', 'Gestionnaire', 'Livreur', 'Autres'])->default('Autres');
            $table->enum('status', ['non lu', 'lu'])->default('non lu');
            $table->string('message');
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->foreignId('user_receive_id')->nullable()->constrained('users')->nullable();
            $table->unsignedBigInteger('livraison_id')->unsigned()->nullable()->index();
            $table->foreign('livraison_id')->references('id')->on('livraisons')->onDelete('cascade')->onUpdate('cascade')->nullable();
            // $table->unsignedBigInteger('course_id')->unsigned()->index()->nullable();
            // $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
