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
            $table->string('title');
            $table->string('topic')->nullable();
            $table->text('short_desc');
            $table->longText('desc')->nullable();
            $table->string('img_link');
            $table->string('author')->nullable();
            $table->string('lang');
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
