<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('product', function (Blueprint $table) {
    $table->char('code', 12)->primary();
    $table->string('name', 100);
    $table->text('description');
    $table->string('manufacturer', 100);
    $table->string('photo', 1000);
    $table->decimal('price', 7, 2);
    $table->decimal('cost', 7, 2);
    $table->integer('inventory_quantity');
});
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};