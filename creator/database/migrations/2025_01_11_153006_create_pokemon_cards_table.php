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
        Schema::create('pokemon_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->integer('hp');
            $table->string('category');
            $table->string('length');
            $table->string('weight');
            $table->json('attacks');
            $table->string('weakness')->nullable();
            $table->string('resistance')->nullable();
            $table->integer('retreat_cost')->nullable();
            $table->text('description');
            $table->string('image_url')->nullable();
            $table->string('card_number');
            $table->string('artist');
            $table->string('set');
            $table->string('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_cards');
    }
};
