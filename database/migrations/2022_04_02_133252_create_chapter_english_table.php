<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_english', function (Blueprint $table) {
            $table->foreignId('chapter_id')->references('id')->on('chapters')->cascadeOnDelete();
            $table->foreignId('english_id')->references('id')->on('englishes')->cascadeOnDelete();
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter_english');
    }
};
