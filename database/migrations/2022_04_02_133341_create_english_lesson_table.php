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
        Schema::create('english_lesson', function (Blueprint $table) {
           $table->foreignId('english_id')->references('id')->on('englishes')->cascadeOnDelete();
            $table->foreignId('lesson_id')->references('id')->on('lessons')->cascadeOnDelete();
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('english_lesson');
    }
};
