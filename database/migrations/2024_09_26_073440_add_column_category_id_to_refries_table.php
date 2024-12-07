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
        Schema::table('refries', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('name')->default(2);

            $table->index('category_id', 'refry_category_idx');

            $table->foreign('category_id', 'refry_category_fk')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('refries', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }
};
