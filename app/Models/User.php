<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;

// use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;
    // public function getJWTCustomClaims()
    // {
    //     return [];implements JWTSubject
    // }
    // public function getJWTIdentifier()
    // {
    //     return $this->getKey();
    // }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $primaryKey = 'id_U';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_U',
        'firstName',
        'lastName',
        'userName',
        'pin',
        'email',
        'phone',
        'image',
        'status',
        'password',
        'id_R',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];


    public function role()
    {
        return $this->belongsTo(Role::class, 'id_R');
    }
    public function categories()
    {
        return $this->hasMany(Category::class, 'id_U');
    }
}
