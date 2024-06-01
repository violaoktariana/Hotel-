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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name_room');
            $table->integer('price');
            $table->string('short_desc');
            $table->text('detail_desc');
            $table->enum('category_room', ['private', 'date', 'meeting']);
            $table->text('path')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('ready')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
