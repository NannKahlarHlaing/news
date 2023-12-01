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
            $table->string('title_ta')->nullable();
            $table->string('topic_en')->nullable();
            $table->string('topic_mm')->nullable();
            $table->string('topic_ch')->nullable();
            $table->string('topic_ta')->nullable();
            $table->text('short_desc_en')->nullable();
            $table->text('short_desc_mm')->nullable();
            $table->text('short_desc_ch')->nullable();
            $table->text('short_desc_ta')->nullable();
            $table->longText('desc_en')->nullable();
            $table->longText('desc_mm')->nullable();
            $table->longText('desc_ch')->nullable();
            $table->longText('desc_ta')->nullable();
            $table->string('img_link');
            $table->string('author')->nullable();
            $table->string('date')->nullable();
            $table->integer('like')->nullable();
            $table->integer('love')->nullable();
            $table->integer('wow')->nullable();
            $table->integer('sad')->nullable();
            $table->string('country')->nullable();
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
