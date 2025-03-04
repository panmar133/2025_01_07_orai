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
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            $table->string('salon_name', 100);
            $table->string('image_name', 255)->default('salon.png');
            $table->string('information', 350);
            $table->string('city', 21);
            $table->string('street', 80);
            $table->integer('zip_code');
            $table->timestamps();
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

class Salon extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}

