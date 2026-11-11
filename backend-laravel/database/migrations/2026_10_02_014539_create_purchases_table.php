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
        Schema::create('purchase', function (Blueprint $table) {
        $table->increments('purchase_id');
        $table->decimal('total_price', 13, 2)->default(0);
        $table->timestamp('purchase_time');
        $table->integer('payment_id');
        $table->string('email', 320);
        $table->foreign('email')->references('email')->on('user')->cascadeOnDelete();
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
