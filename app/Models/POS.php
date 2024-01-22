<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POS extends Model
{
    use HasFactory;
    protected $table = 'pos';
    protected $primaryKey = 'id_pos';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_pos',
        'subtotal',
        'tax',
        'total',
        'paymenttype',
        'id_Cus',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class,'id_Cus');
    }
    public function productlist()
    {
        return $this->morphMany(ProductList::class, 'producttable');
    }
}
