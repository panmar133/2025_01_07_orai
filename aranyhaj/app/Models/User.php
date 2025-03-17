<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * A mass assignment-nél engedélyezett mezők.
     */
    protected $fillable = [
        'id',
        'user_name',
        'email',
        'address',
        'password',
        'image_name',
        'admin',
        'created_at',
        'updated_at',
    ];

    /**
     * A sorosításnál elrejtendő mezők.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Az attribútumok típuskényszerítése.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean',
    ];

    /**
     * Kapcsolat a szalonokkal (egy user-nek több szalonja lehet).
     */
    public function salons()
    {
        return $this->hasMany(Salon::class, 'owner_id', 'id');
    }
}
