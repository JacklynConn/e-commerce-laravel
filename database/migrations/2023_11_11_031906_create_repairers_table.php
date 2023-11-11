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
        Schema::create('repairers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicetype_id')->constrained('service_types');
            $table->string('name');
            $table->integer('sex');
            $table->integer('age');
            $table->string('phone');
            $table->integer('like_id');
            $table->string('facebook');
            $table->integer('status')->default(1);
            $table->string('image');
            $table->string('email');
            $table->string('address');
            $table->string('details');
            $table->double('lat');
            $table->double('lng');
            $table->string('username');
            $table->string('password');
            $table->string('is_delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairers');
    }
};
