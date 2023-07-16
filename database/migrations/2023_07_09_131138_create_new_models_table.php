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
            $table->string('topic')->nullable();
            $table->string('short_desc');
            $table->text('desc', 65535)->nullable();
            $table->string('img_link')->nullable();
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
