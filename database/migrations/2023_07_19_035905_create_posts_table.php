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
            $table->string('tags')->nullable();
            $table->string('title');
            $table->string('topic')->nullable();
            $table->text('short_desc');
            $table->longText('desc')->nullable();
            $table->string('lang');
            $table->integer('views')->nullable();
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
