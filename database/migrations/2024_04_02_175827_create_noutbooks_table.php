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
        Schema::create('noutbooks', function (Blueprint $table) {
            $table->id();
            
            $table->string('name', 100);
            $table->string('brend', 50);                      
            $table->decimal('price')->unsigned();

            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();

            $table->string('color', 50);            
            $table->string('processor', 50);
            $table->integer('speed')->unsigned();

            $table->string('videocard', 100);
            $table->string('os', 50);
            $table->decimal('screen')->unsigned();
            $table->string('resolution', 50);
            $table->smallInteger('ram')->unsigned();
            $table->smallInteger('memory')->unsigned();
            $table->string('memotype');
            $table->boolean('variant');
            $table->tinyInteger('battery')->unsigned();    
            $table->timestamps();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noutbooks');
    }
};
