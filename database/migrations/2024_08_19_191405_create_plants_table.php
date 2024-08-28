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
        Schema::disableForeignKeyConstraints();

        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->double('price');
            $table->string('image_1');
            $table->string('image_2')->nullable();
            $table->string('category');
            $table->double('rate')->nullable();
            $table->string('description');
            $table->text('reviews')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant');
    }
};
