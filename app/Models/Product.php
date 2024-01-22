<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id_Product';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Product',
        'producName',
        'SKU',
        'minQty',
        'Quantity',
        'description',
        'price',
        'cost',
        'tax',
        'proPic',
        'expiryDate',
        'barcode',
        'availableforsale',
        'soldby',
        'status',
        'id_U',
        'id_Discount',
        'id_Unit',
        'id_Cat',
        'id_Brand',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'id_U');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'id_Cat');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class,'id_Unit');
    }
    public function discount()
    {
        return $this->belongsTo(Discount::class,'id_Discount');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'id_U');
    }
    public function productlist()
    {
        return $this->hasMany(ProductList::class,'id_Product');
    }
}
