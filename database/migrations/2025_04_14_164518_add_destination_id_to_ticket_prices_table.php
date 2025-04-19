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
            if (!Schema::hasColumn('ticket_prices', 'destination_id')) {
                $table->foreignId('destination_id')->nullable()->constrained();
            }
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
