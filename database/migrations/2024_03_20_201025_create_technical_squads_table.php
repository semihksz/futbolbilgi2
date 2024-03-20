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
        Schema::create('technical_squads', function (Blueprint $table) {
            $table->id();
            $table->string('lang');
            $table->string('team');
            $table->string('season_id');
            $table->string('image');
            $table->string('mission');
            $table->string('name');
            $table->string('nationality');
            $table->date('birthday');
            $table->longText('biography');
            $table->enum('is_active', ['0', '1'])->default('1');
            $table->string('slug');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technical_squads');
    }
};
