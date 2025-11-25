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
         Schema::create('lahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_lahan');
            $table->decimal('luas_lahan', 8, 2);
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('bulan_tanam');
            $table->string('jenis_tanah');
            $table->json('tanaman_filter')->nullable(); 
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lahans');
    }
};
