<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $withinTransaction = false;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key', 255)->primary();  // <- longitud explícita
            $table->mediumText('value');
            $table->integer('expiration')->nullable();
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key', 255)->primary(); // <- longitud explícita
            $table->string('owner', 255);
            $table->integer('expiration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
