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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('rental_date');            // tarikh mula sewa
            $table->date('return_date');            // tarikh dijangka pulang
            $table->decimal('total_price', 10, 2);  // jumlah harga sewa
            $table->tinyInteger('status')->default(0);
            // 0 = Pending, 1 = Approved, 2 = Active, 3 = Completed, 4 = Cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
