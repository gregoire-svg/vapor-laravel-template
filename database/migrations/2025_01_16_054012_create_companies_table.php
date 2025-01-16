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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('legal_name', 255)->nullable();
            $table->string('alias', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('trn_number', 100)->nullable();
            $table->text('trn_url');
            $table->string('trade_licence_number', 100)->nullable();
            $table->text('trade_licence_url')->nullable();
            $table->dateTime('trade_licence_expiry_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
