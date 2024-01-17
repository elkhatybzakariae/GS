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
        Schema::create('transfers', function (Blueprint $table) {
            $table->string('id_Transfer')->primary();
            $table->string('DateOfTransferOrder');
            $table->string('SourceStore'); 
            $table->string('DestinationStore'); 
            $table->string('Reference'); 
            $table->string('GrandTotal'); 
            $table->string('notes'); 
            $table->boolean('status')->default(0);
            $table->string('id_Store'); 
            $table->foreign('id_Store')->references('id_Store')->on('stores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
