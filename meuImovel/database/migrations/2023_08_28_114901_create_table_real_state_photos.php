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
        Schema::create('real_state_photos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('real_state_id');

            $table->string('photo');
            $table->boolean('is_thumb');

            $table->timestamps();

            $table->foreign('real_state_id')->references('id')->on('real_state');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_state_photos');
    }
};
