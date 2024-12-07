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
        Schema::table('noutbooks', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('name')->default(1);

            $table->index('category_id', 'noutbook_category_idx');

            $table->foreign('category_id', 'noutbook_category_fk')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('noutbooks', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }
};
