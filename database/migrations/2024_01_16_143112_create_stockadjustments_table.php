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
        Schema::create('stockadjustments', function (Blueprint $table) {
            $table->string('id_SA')->primary();
            $table->string('reason')->constraint(['ReceiveItems','InventoryCount', 'Loss', 'Damage']);
            $table->string('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stockadjustments');
    }
};
