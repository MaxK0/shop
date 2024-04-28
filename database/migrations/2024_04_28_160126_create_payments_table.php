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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('amount')->unsigned()->default(0);
            $table->foreignId('order_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('type_id')->nullable()->constrained('payment_types')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('status_id')->nullable()->constrained('payment_statuses')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('payment_system_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->string('transaction_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
