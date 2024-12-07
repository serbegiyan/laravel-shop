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
        Schema::create('refries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('brend', 50);
            $table->decimal('price')->unsigned();

            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();

            $table->string('short');
            $table->string('color', 50);

            $table->string('conrtol', 50);
            $table->string('no_frost', 50);

            $table->decimal('height')->unsigned();
            $table->decimal('width')->unsigned();
            $table->decimal('depth')->unsigned();
            $table->decimal('volume')->unsigned();

            $table->boolean('variant')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refries');
    }
};
