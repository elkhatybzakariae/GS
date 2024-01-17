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
        Schema::create('pos', function (Blueprint $table) {
            $table->string('id_pos')->primary();
            $table->string('subtotal');
            $table->string('tax');
            $table->string('total');
            $table->string('paymenttype')->constraint(['Cash','Debit', 'Scan']);
            
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
        Schema::dropIfExists('pos');
    }
};
