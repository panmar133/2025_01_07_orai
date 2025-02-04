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
        Schema::create('interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->boolean('liked')->nullable();
            $table->timestamp('liked_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('watched')->nullable();
            $table->timestamp('watched_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('participation')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('interactions');
    }
};
