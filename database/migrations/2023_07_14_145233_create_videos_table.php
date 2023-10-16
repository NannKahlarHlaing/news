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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_url');
            $table->string('img_url');
            $table->string('category_id');
            $table->string('title_en')->nullable();
            $table->string('title_mm')->nullable();
            $table->string('title_ch')->nullable();
            $table->string('title_ta')->nullable();
            $table->longText('desc_en')->nullable();
            $table->longText('desc_mm')->nullable();
            $table->longText('desc_ch')->nullable();
            $table->longText('desc_ta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
