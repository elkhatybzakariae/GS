<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    protected $primaryKey = 'id_Purchase';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Purchase',
        'supplierName',
        'reference',
        'date',
        'status',
        'PaymentStatus',
        'due',
        'paid',
        'grandTotal',
        'discount',
        'tax',
        'shipping',
        'description',
        'notes',
        'purchaseOrderDate',
        'expectedOn',
        'id_Supplier',
    ];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'id_Supplier');
    }
    public function productlist()
    {
        return $this->morphMany(ProductList::class, 'producttable');
    }
}
