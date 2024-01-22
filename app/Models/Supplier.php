<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $primaryKey = 'id_Supplier';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Supplier',
        'Website',
        'id_P',
    ];
    public function person()
    {
        return $this->belongsTo(Person::class,'id_P');
    }
    public function returns()
    {
        return $this->morphMany(Returns::class, 'returntable');
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'id_Supplier');
    }
    public function sale()
    {
        return $this->hasMany(Sale::class, 'id_Supplier');
    }
}
