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
        
        Schema::create('new_models', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('topic');
            $table->string('short_desc');
            $table->string('desc');
            $table->string('img_link');
            $table->string('fb_link');
            $table->string('tw_link');
            $table->string('li_link');
            $table->integer('views');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_models');
    }
};
