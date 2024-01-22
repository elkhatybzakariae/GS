<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'city';
    protected $primaryKey = 'id_City';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_City',
        'cityName',
        'description',
        'status',
        'id_Country',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class,'id_Country');
    }
    public function person()
    {
        return $this->hasMany(Person::class,'id_City');
    }
    public function store()
    {
        return $this->hasMany(Store::class,'id_City');
    }
}
