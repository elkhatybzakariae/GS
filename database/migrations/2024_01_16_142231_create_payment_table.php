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
        Schema::create('payment', function (Blueprint $table) {
            $table->string('id_Payment')->primary();
            $table->string('date');
            $table->string('reference');
            $table->string('receivedAmount');
            $table->string('payingAmount');
            $table->string('paymentType')->constraint(['Cash','Online', 'InProgress']);
            $table->string('note');
            
            $table->string('id_Sale');
            $table->foreign('id_Sale')->references('id_Sale')->on('sales')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
