<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus_id');
            $table->integer('seat_number');
            $table->enum('status', ['empty', 'reserved', 'full'])->default('empty');
            $table->integer('row')->nullable();     // For grid layout
            $table->integer('column')->nullable();  // For grid layout
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');

            // Optional unique constraint (one seat number per bus)
            $table->unique(['bus_id', 'seat_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
}
