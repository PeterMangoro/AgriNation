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
        Schema::table('chemicals', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('uuid')->index();
             $table->softDeletes();
        });

        Schema::table('expenditures', function (Blueprint $table) {
            $table->uuid('uuid')->index();
             $table->softDeletes();
        });

        // Schema::table('chemicals', function (Blueprint $table) {
        //     $table->uuid('uuid')->index();
        //      $table->softDeletes();
        // });

        Schema::table('attachments', function (Blueprint $table) {
            $table->uuid('uuid')->index();
             $table->softDeletes();
        });

        Schema::table('growths', function (Blueprint $table) {
            $table->uuid('uuid')->index();
             $table->softDeletes();
        });

        Schema::table('sprays', function (Blueprint $table) {
            $table->uuid('uuid')->index();
             $table->softDeletes();
        });
    }
};
