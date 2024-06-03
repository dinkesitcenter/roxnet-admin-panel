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
        Schema::create('barcode', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jabatan_id')->nullable();
            $table->bigInteger('kategori_id')->nullable();
            $table->string('name',50);
            $table->string('link',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barcode');
    }
};
