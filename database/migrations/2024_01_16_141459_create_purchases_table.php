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
        Schema::create('purchases', function (Blueprint $table) {
            $table->string('id_Purchase')->primary();
            $table->string('supplierName');
            $table->string('reference');
            $table->string('date');
            $table->boolean('status');
            $table->boolean('PaymentStatus');
            $table->string('due');
            $table->string('paid');
            $table->string('grandTotal');
            $table->string('discount');
            $table->string('tax');
            $table->string('shipping');
            $table->string('description');
            $table->string('notes');
            $table->string('purchaseOrderDate');
            $table->string('expectedOn');

            $table->string('id_Supplier');
            $table->foreign('id_Supplier')->references('id_Supplier')->on('suppliers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
