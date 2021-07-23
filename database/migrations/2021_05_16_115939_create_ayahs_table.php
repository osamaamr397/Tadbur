<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayahs', function (Blueprint $table) {
            $table->id();
            $table->string('juz');
            $table->string('JuzNameArabic');
            $table->string('JuzNameEnglish');
            $table->integer('surah_id');
            $table->string('SurahNameArabic');
            $table->string('SurahNameEnglish');
            $table->string('SurahMeaning');
            $table->integer('page');
            $table->string('Classification');
            $table->integer('AyahNo');
            $table->string('EnglishTranslation');
            $table->string('OrignalArabicText');
            $table->string('ArabicText');
            $table->integer('ArabicWordCount');
            $table->integer('ArabicLetterCount');
            $table->integer('line_start');
            $table->integer('line_end');
            $table->text('aya_tafseer_moussar');

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
