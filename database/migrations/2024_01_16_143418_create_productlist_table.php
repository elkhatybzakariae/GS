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
        Schema::create('productlist', function (Blueprint $table) {
            $table->string('id_PL')->primary();
            // $table->string('question');
            $table->string('producttable_id');
            $table->string('producttable_type');
            $table->string('QTY');
            $table->string('id_Product');            
            $table->foreign('id_Product')->references('id_Product')->on('products');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productlist');
    }
};
