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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('terms')->nullable();
            $table->string('location')->nullable();
            $table->text('org_background', 65535)->nullable();
            $table->text('job_overview', 65535)->nullable();
            $table->text('role', 65535)->nullable();
            $table->text('qualification', 65535);
            $table->string('benefits')->nullable();
            $table->string('latest_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
