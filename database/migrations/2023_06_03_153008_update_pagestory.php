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
        Schema::table('pagestories', function (Blueprint $table) {
            // изменить тип поля background на integer foring key for table pict
            $table->integer('background')->unsigned()->change();
         //   $table->foreign('background')->references('id')->on('picts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //очистить таблицу перед изменением
      //s  DB::table('pagestories')->delete();
        Schema::table('pagestories', function (Blueprint $table) {
            // изменить тип поля background на integer foring key for table pict
            $table->integer('background')->unsigned(false)->change();
           // $table->dropForeign('pagestories_background_foreign');
        });
    }
};
