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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('img_link')->nullable();
            $table->string('category_id');
            $table->string('sub_category_id')->nullable();
            $table->string('tags');
            $table->string('title_en')->nullable();
            $table->string('title_mm')->nullable();
            $table->string('title_ch')->nullable();
            $table->string('topic_en')->nullable();
            $table->string('topic_mm')->nullable();
            $table->string('topic_ch')->nullable();
            $table->text('short_desc_en', 65535)->nullable();
            $table->text('short_desc_mm', 65535)->nullable();
            $table->text('short_desc_ch', 65535)->nullable();
            $table->longText('desc_en')->nullable();
            $table->longText('desc_mm')->nullable();
            $table->longText('desc_ch')->nullable();
            $table->integer('views');
            $table->integer('like')->nullable();
            $table->integer('love')->nullable();
            $table->integer('wow')->nullable();
            $table->integer('sad')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
