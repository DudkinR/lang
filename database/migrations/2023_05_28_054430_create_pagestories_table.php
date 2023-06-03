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
        Schema::create('pagestories', function (Blueprint $table) {
            $table->id();
            // order of the story
            $table->integer('order');
            // text of the story
            $table->text('text');
            // timer animation
            $table->integer('timer')->nullable();
            // image background
            $table->string('background');
            $table->timestamps();
        });
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            // type of the story
            $table->string('type');
            // languge
            $table->string('lng');
            $table->timestamps();
        });
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            // type of the story
            $table->string('name');
            // languge
            $table->string('lng');
            // data birth
            $table->date('birthday');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagestories');
        Schema::dropIfExists('types');
        Schema::dropIfExists('profiles');
    }
};
