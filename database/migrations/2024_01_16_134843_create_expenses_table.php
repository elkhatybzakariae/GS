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
        Schema::create('expenses', function (Blueprint $table) {
            $table->string('id_Expense')->primary();
            $table->string('date');
            $table->string('amount');
            $table->string('reference');
            $table->string('expensefor');
            $table->string('description');
            $table->boolean('status');
            $table->string('id_Cat');
            $table->foreign('id_Cat')->references('id_Cat')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
