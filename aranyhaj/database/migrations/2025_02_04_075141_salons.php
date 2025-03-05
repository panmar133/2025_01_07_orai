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
            $table->string('salon_name', 100)->collation('utf8_hungarian_ci');
            $table->string('image_name', 500)->default('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbi3vhR6pmsVH4vEmM9xbYFajAJXlOaUFI6Q&s');
            $table->string('information', 350)->collation('utf8_hungarian_ci');
            $table->string('city', 21)->collation('utf8_hungarian_ci');
            $table->string('street', 80)->collation('utf8_hungarian_ci');
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

