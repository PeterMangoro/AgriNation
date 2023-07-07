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
        Schema::table('incomes', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->uuid('uuid')->index();
        });

        Schema::table('growths', function (Blueprint $table) {
            $table->uuid('uuid')->index();
        });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->uuid('uuid')->index();
        // });
    }
};
