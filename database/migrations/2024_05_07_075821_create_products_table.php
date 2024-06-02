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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('uuid');
            $table->string('title');
            $table->string('category_title');
            $table->double('price');
            $table->string('photo');
            $table->string('detail');
            $table->timestamps();



            $table->foreign('category_title')->references('title')->on('categories')->onDelete('cascade');
             $table->unique(['category_title', 'title']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
