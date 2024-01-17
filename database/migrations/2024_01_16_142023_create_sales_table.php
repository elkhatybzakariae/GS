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
        Schema::create('sales', function (Blueprint $table) {
            $table->string('id_Sale')->primary();
            $table->string('date');
            $table->string('tax');
            $table->string('discount');
            $table->string('shipping');
            $table->boolean('status');
            $table->string('reference');
            $table->string('total');
            
            $table->string('id_Supplier');
            $table->foreign('id_Supplier')->references('id_Supplier')->on('suppliers');
            $table->string('id_Cus');
            $table->foreign('id_Cus')->references('id_Cus')->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
