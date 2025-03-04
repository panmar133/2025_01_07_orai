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
        //
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('location', 150)->nullable();
            $table->string('information', 350)->nullable();
            $table->string('image_name', 255)->nullable();
            $table->timestamp('posted_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('starts_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('events');
    }
};
