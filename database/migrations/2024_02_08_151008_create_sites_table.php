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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('site_builder')->nullable();
            $table->integer('Visitors')->default(0);
            $table->text('site_title');
            $table->text('introduction');
            $table->string('logo')->nullable();
            $table->string('BasicImage')->nullable();
            $table->string('tags');
            $table->text('link');


            $table->unsignedBigInteger('design_template_id');

            $table->unsignedBigInteger('color_id');

            $table->boolean('is_public')->default(false);
            $table->boolean('is_accepted')->default(true);


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('design_template_id')->references('id')->on('design_templates');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
