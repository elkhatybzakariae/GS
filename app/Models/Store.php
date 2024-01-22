<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'stores';
    protected $primaryKey = 'id_Store';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Store',
        'storeName',
        'storeImage',
        'status',
        'id_City',
    ];
    public function city()
    {
        return $this->belongsTo(City::class,'id_City');
    }
    public function transfer()
    {
        return $this->hasMany(Transfer::class,'id_Transfer');
    }
}
