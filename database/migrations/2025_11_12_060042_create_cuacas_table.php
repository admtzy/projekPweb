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
        Schema::create('cuacas', function (Blueprint $table) {
            $table->id();
            $table->string('provinsi'); 
            $table->string('kabupaten'); 
            $table->string('bulan');  
            $table->float('suhu')->nullable();
            $table->float('curah_hujan')->nullable();
            $table->float('kelembapan')->nullable();
            $table->string('musim')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuacas');
    }
};
