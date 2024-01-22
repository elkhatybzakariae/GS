<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = 'discounts';
    protected $primaryKey = 'id_Discount';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Discount',
        'discountName',
        'type',
        'value',
        'restrictedAccess',
    ];
    public function product()
    {
        return $this->hasMany(Product::class,'id_Discount');
    }
}
