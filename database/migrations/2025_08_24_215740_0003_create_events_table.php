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
        if (!Schema::hasTable('events')) {
            Schema::create('events', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->text('description')->nullable();
                $table->string('location', 150);
                $table->dateTime('start_date');
                $table->dateTime('end_date')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('events')) {
            Schema::dropIfExists('events');
        }
    }
};
