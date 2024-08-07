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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('meta_tag')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('path')->nullable();
            $table->string('youtube')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedInteger('share')->default(0);
            $table->boolean('trending_status')->default(true);
            $table->boolean('status')->default(true);
            $table->longText('description');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
