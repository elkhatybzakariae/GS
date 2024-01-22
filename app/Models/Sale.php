<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $primaryKey = 'id_Sale';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Sale',
        'date',
        'tax',
        'discount',
        'shipping',
        'status',
        'reference',
        'total',
        'id_Supplier',
        'id_Cus',
    ];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'id_Supplier');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'id_Cus');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class,'id_Sale');
    }
    public function productlist()
    {
        return $this->morphMany(ProductList::class, 'producttable');
    }
}
