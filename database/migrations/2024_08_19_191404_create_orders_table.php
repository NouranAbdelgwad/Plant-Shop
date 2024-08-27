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

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user');
            $table->text('first_name');
            $table->text('last_name');
            $table->longText('compant_name');
            $table->enum('country', ["Egypt"]);
            $table->string('street_address');
            $table->enum('city', ["Cairo", "Giza", "Alex"]);
            $table->integer('zip_code')->nullable();
            $table->bigInteger('phone');
            $table->text('email_address');
            $table->string('notes');
            $table->enum('state', [""]);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
