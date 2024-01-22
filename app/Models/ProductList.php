<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    use HasFactory;
    
    protected $table = 'productlist';
    protected $primaryKey = 'id_PL';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_PL',
        'producttable_id',
        'producttable_type',
        'QTY',
        'id_Product',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'id_Product');
    }
    public function producttable()
    {
        return $this->morphTo();
    }
}
