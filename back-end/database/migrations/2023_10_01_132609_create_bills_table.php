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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->string('services');
            $table->foreignId('contract_id')->constrained()->cascadeOnDelete();
            $table->foreignId('seller_id')->constrained('requisites');
            $table->foreignId('customer_id')->constrained('requisites');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
