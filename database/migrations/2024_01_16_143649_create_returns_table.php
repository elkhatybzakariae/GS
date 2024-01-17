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
        Schema::create('returns', function (Blueprint $table) {
            $table->string('id_Ret')->primary();
            $table->string('question');
            $table->string('returntable_id');
            $table->string('returntable_type');
            $table->string('date');
            $table->string('reference');
            $table->string('tax');
            $table->string('discount');
            $table->string('shipping');
            $table->boolean('status');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returns');
    }
};
