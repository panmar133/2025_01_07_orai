<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    protected $fillable = ['owner_id', 'salon_name', 'image_name', 'information', 'city', 'street', 'zip_code', 'created_at', 'updated_at'];
}