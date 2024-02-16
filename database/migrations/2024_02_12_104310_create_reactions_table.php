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
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('site_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('site_builder_id');
            $table->enum('reaction_type', ['like', 'dislike', 'love'])->default('like');
            $table->timestamps();


            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('site_builder_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['site_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reactions');
    }
};
