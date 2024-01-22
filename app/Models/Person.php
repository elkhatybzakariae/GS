<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'persons';
    protected $primaryKey = 'id_P';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_P',
        'firstName',
        'lastName',
        'email',
        'phone',
        'address1',
        'address2',
        'avatar',
        'codePostal',
        'note',
        'id_City',
    ];
    public function city()
    {
        return $this->belongsTo(City::class,'id_City');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'id_P');
    }
}
