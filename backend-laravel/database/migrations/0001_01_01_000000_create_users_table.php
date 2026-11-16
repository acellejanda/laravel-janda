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
    Schema::create('user', function (Blueprint $table) {
        $table->string('email', 320)->primary();
        $table->string('username', 30);
        $table->char('password', 60);
        $table->string('first_name', 50);
        $table->string('last_name', 50);
        $table->string('phone_number', 15);
        $table->timestamp('last_login_time');
        $table->integer('address_id');
    });
}

public function down(): void
{
    Schema::dropIfExists('user');
}
};
