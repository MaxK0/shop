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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('status_id')->nullable()->constrained('order_statuses')->nullOnDelete()->cascadeOnUpdate();
            $table->integer('total_price')->unsigned()->default(0);
            $table->string('phone', 15)->nullable();
            $table->text('comment')->nullable();
            $table->string('address_to')->nullable();
            $table->foreignId('address_from_id')->nullable()->constrained('addresses')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
