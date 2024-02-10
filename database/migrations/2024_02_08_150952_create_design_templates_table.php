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
        Schema::create('design_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('template_type', ['vertical_menu', 'horizontal_menu', 'burger_menu'])->default('vertical_menu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('design_templates');
    }
};
