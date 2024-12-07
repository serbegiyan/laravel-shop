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
        Schema::create('smartphones', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('brend', 50);
            $table->decimal('price')->unsigned();

            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();

            $table->string('short');
            $table->string('color', 50);

            $table->string('processor', 100);
            $table->smallInteger('speed')->unsigned();

            $table->decimal('screen', 2, 1)->unsigned();
            $table->string('resolution', 50);
            $table->string('tehnology', 50);

            $table->smallInteger('camera');
            $table->string('corpus', 50);
            $table->smallInteger('ram');
            $table->smallInteger('memory');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smartphones');
    }
};
