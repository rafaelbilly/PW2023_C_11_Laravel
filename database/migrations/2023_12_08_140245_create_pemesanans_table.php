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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_event')->constrained('events')->onDelete('cascade');
            $table->date('tanggal_event');
            $table->string('tempat_event');
            $table->double('total_biaya');
            $table->string('invoice');
            $table->string('payment_type');
            $table->string('cardholder_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('card_cvc')->nullable();
            $table->string('card_exp')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
