<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('message_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('campaign_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('phone', 20);

            $table->longText('message')->nullable();

            $table->enum('status', [
                'pending',
                'sent',
                'delivered',
                'read',
                'failed'
            ])->default('pending');

            $table->json('response')->nullable();

            $table->timestamps();

            $table->index('phone');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('message_logs');
    }
};
