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
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('header_status')->default(true)->after('name');
            $table->boolean('footer_status')->default(true)->after('name');
            $table->integer('block')->unique()->nullable()->after('name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('header_status');
            $table->dropColumn('footer_status');
            $table->dropColumn('block');
        });
    }
};
