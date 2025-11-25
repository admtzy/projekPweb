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
        Schema::create('pupuks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lahan_id');
            $table->unsignedBigInteger('user_id');
            $table->string('jenis_pupuk');
            $table->integer('jumlah');
            $table->text('catatan')->nullable();
            $table->enum('status', ['pending','approve','tolak'])->default('pending');
            $table->timestamps();
            $table->string('foto_petani')->nullable();
            $table->longText('tanda_tangan')->nullable();
            $table->foreign('lahan_id')->references('id')->on('lahans')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pupuks');
    }
};
