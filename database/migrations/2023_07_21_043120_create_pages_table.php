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
        ['img_url', 'title_en', 'title_mm', 'title_ch', 'desc_en', 'desc_mm', 'desc_ch'];
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('img_url');
            $table->string('title_en');
            $table->string('title_mm');
            $table->string('title_ch');
            $table->text('desc_en', 65535)->nullable();
            $table->text('desc_mm', 65535)->nullable();
            $table->text('desc_ch', 65535)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
