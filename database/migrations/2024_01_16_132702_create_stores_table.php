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
        Schema::create('stores', function (Blueprint $table) {
            $table->string('id_Store')->primary();
            $table->string('storeName');
            $table->string('storeImage'); 
            $table->boolean('status')->default(0);
            $table->string('id_City'); 
            $table->foreign('id_City')->references('id_City')->on('city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
