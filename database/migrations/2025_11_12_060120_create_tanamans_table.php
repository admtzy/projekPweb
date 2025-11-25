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
        Schema::create('tanamans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tanaman');
            $table->string('jenis_tanah');  
            $table->float('suhu_min')->nullable();
            $table->float('suhu_max')->nullable();
            $table->float('curah_hujan_min');
            $table->float('curah_hujan_max');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanamans');
    }
};
