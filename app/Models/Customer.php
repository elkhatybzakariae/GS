<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'id_Cus';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Cus',
        'customerCode',
        'id_P',
    ];
    public function person()
    {
        return $this->belongsTo(Person::class,'id_P');
    }
    // public function person()
    // {
    //     return $this->hasMany(Person::class,'id_City');
    // }
    public function returns()
    {
        return $this->morphMany(Returns::class, 'returntable');
    }
    public function sale()
    {
        return $this->hasMany(Sale::class, 'id_Cus');
    }
    public function pos()
    {
        return $this->hasMany(POS::class, 'id_Cus');
    }
}
