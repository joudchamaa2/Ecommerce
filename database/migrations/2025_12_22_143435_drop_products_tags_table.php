<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('products_tags');
    }

    public function down(): void
    {
        Schema::create('products_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id');
            $table->unsignedBigInteger('tags_id');
            $table->unique(['products_id', 'tags_id']);
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }
};
