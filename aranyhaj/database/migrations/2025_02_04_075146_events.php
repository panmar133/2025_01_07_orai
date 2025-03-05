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
            $table->string('title', 50)->collation('utf8_hungarian_ci');
            $table->string('location', 150)->nullable()->collation('utf8_hungarian_ci');
            $table->string('information', 500)->nullable()->collation('utf8_hungarian_ci');
            $table->string('image_name', 500)->nullable()->default('https://cdni.iconscout.com/illustration/premium/thumb/event-planning-illustration-download-in-svg-png-gif-file-formats--plan-party-managing-service-manager-pack-entertainment-illustrations-4693328.png');
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
