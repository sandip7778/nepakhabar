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
        Schema::table('posts', function (Blueprint $table) {
            $table->text('sub_title')->nullable()->default(null)->after('title');
            $table->string('context')->nullable()->default(null)->after('slug');
            $table->string('image_desc')->nullable()->default(null)->after('youtube');
            $table->integer('trending_status')->nullable()->default(null)->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('sub_title');
            $table->dropColumn('context');
            $table->dropColumn('image_desc');
            $table->boolean('trending_status')->default(true);

        });
    }
};
