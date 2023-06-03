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
        //
        Schema::table('pagestories', function (Blueprint $table) {
			$table->foreignId('story_id')->constrained();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('pagestories', function (Blueprint $table) {
        $table->dropForeign(['story_id']);
        });

    }
};
