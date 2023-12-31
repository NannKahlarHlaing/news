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
            $table->string('img_link');
            $table->string('title');
            $table->string('cartoonist')->nullable();
            $table->string('lang');
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
