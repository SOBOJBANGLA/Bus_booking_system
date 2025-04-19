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
        Schema::table('ticket_prices', function (Blueprint $table) {
            $table->decimal('vat_percentage', 5, 2)->default(0); // new field for VAT
            $table->decimal('total_price', 8, 2)->nullable(); // final price including VAT
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_prices', function (Blueprint $table) {
            //
        });
    }
};
