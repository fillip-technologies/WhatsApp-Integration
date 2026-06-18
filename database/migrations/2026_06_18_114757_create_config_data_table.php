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
        Schema::create('config_data', function (Blueprint $table) {
            $table->id();
            $table->string('WHATSAPP_PHONE_NUMBER_ID')->nullable();
            $table->string('WHATSAPP_BUSINESS_ACCOUNT_ID')->nullable();
            $table->string('WHATSAPP_TOKEN')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_data');
    }
};
