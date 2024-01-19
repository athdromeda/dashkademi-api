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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->tinyInteger('latihan_1');
            $table->tinyInteger('latihan_2');
            $table->tinyInteger('latihan_3');
            $table->tinyInteger('latihan_4');
            $table->tinyInteger('harian_1');
            $table->tinyInteger('harian_2');
            $table->tinyInteger('uts');
            $table->tinyInteger('uas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
