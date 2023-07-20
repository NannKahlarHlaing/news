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
        Schema::create('photo_essays', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_mm')->nullable();
            $table->string('title_ch')->nullable();
            $table->string('topic_en')->nullable();
            $table->string('topic_mm')->nullable();
            $table->string('topic_ch')->nullable();
            $table->text('short_desc_en', 65535)->nullable();
            $table->text('short_desc_mm', 65535)->nullable();
            $table->text('short_desc_ch', 65535)->nullable();
            $table->text('desc_en', 65535)->nullable();
            $table->text('desc_mm', 65535)->nullable();
            $table->text('desc_ch', 65535)->nullable();
            $table->string('img_link');
            $table->string('author');
            $table->string('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_essays');
    }
};
