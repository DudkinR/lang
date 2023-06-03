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
Schema::table('tests', function (Blueprint $table) {
			$table->string('title');
			$table->text('anatation');
            // drop column 'task'
$table->dropColumn('task');
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
Schema::table('tests', function (Blueprint $table) {
$table->dropColumn('title');
$table->dropColumn('anatation');
$table->text('task');
        });
    }
};
