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
        Schema::create('products', function (Blueprint $table) {
            $table->string('id_Product')->primary();
            $table->string('producName');
            $table->string('SKU');
            $table->string('minQty');
            $table->string('Quantity');
            $table->string('description');
            $table->string('price');
            $table->string('cost');
            $table->string('tax');
            $table->string('proPic');
            $table->string('expiryDate');
            $table->string('barcode');
            $table->boolean('availableforsale');

            $table->string('soldby')->constraint(['Each', 'Volume']);
            $table->boolean('status');

            $table->string('id_U');
            $table->foreign('id_U')->references('id_U')->on('users');
            $table->string('id_Discount');
            $table->foreign('id_Discount')->references('id_Discount')->on('discounts');
            $table->string('id_Unit');
            $table->foreign('id_Unit')->references('id_Unit')->on('unit');
            $table->string('id_Cat');
            $table->foreign('id_Cat')->references('id_Cat')->on('categories');
            $table->string('id_Brand');
            $table->foreign('id_Brand')->references('id_Brand')->on('brands');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
