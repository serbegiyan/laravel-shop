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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->integer('all_purchases')->unsigned();
            $table->string('details_purchases', 3000);
            $table->decimal('order_price')->unsigned();
            $table->string('user_name', 100);
            $table->string('user_surname', 100);
            $table->string('user_email', 100);
            $table->string('user_phone', 100);
            $table->string('user_address', 100);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
