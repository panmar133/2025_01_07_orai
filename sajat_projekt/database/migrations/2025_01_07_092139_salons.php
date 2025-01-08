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
        Schema::create('salons', function (Blueprint $table) {
            $table->id(); 
            $table->integer('owner_id');
            $table->string('salon_name')->unique();
            $table->string('salon_location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('salons');
    }
};
