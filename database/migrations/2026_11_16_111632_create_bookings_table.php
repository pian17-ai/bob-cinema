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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code', 12)->unique();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('showtime_id')->constrained('showtimes');
            $table->decimal('total_amount');
            $table->enum('payment_status', ['pending', 'paid', 'expired', 'failed']);
            $table->string('payment_token');
            $table->timestamp('expires_at');
            $table->boolean('is_printed')->default(false);
            $table->timestamp('printed_at')->nullable();
            $table->foreignId('printed_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
