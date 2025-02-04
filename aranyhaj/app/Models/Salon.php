<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    protected $fillable = ['salon_name', 'owner_id', 'image_name', 'information', 'city', 'street', 'zip_code'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}