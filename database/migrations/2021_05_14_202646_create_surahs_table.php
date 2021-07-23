<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surahs', function (Blueprint $table) {
            $table->id();
            $table->string('arabic');
            $table->string('latin');
            $table->string('english');
            $table->string('location');
            $table->string('sajda');
            $table->string('ayah');



           // (`id`, `arabic`, `latin`, `english`, `localtion`, `sajda`, `ayah`)
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayahs');
    }
}
