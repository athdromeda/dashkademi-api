<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
        });

        DB::collection('classrooms')->insert([
            ['name' => '10A', 'description' => 'Kelas 10 rombel A'],
            ['name' => '10B', 'description' => 'Kelas 10 rombel B'],
            ['name' => '10C', 'description' => 'Kelas 10 rombel C'],
            ['name' => '11A', 'description' => 'Kelas 11 rombel A'],
            ['name' => '11B', 'description' => 'Kelas 11 rombel B'],
            ['name' => '11C', 'description' => 'Kelas 11 rombel C'],
            ['name' => '12A', 'description' => 'Kelas 12 rombel A'],
            ['name' => '12B', 'description' => 'Kelas 12 rombel B'],
            ['name' => '12C', 'description' => 'Kelas 12 rombel C'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
