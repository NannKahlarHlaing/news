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
        Schema::create('cartoons', function (Blueprint $table) {
            $table->id();
            $table->string('img_link')->nullable();
            $table->string('category_id')->nullable();
            $table->string('title_en');
            $table->string('title_mm')->nullable();
            $table->string('title_ch')->nullable();
            $table->string('cartoonist_en')->nullable();
            $table->string('cartoonist_mm')->nullable();
            $table->string('cartoonist_ch')->nullable();
            $table->string('views');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartoons');
    }
};
