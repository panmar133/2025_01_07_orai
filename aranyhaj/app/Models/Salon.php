<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    protected $fillable = ['salon_name', 'owner_id', 'image_name', 'information', 'location', 'x-location', 'y-location'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}