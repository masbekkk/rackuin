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
        Schema::create('data_apps', function (Blueprint $table) {
            $table->id();
            $table->text('about_us');
            $table->text('visi');
            $table->text('misi');
            $table->string('image');
            $table->string('logo')->nullable();
            $table->string('company_name');
            $table->string('link_ig')->nullable();
            $table->string('link_wa')->nullable();
            $table->string('link_fb')->nullable();
            $table->string('file_katalog')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_apps');
    }
};
