<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'country';
    protected $primaryKey = 'id_Country';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Country',
        'countryName',
        'description',
        'status',
    ];
    public function city()
    {
        return $this->hasMany(User::class,'id_Country');
    }
}
