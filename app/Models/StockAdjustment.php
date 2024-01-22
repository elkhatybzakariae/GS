<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAdjustment extends Model
{
    use HasFactory;
    protected $table = 'stockadjustments';
    protected $primaryKey = 'id_SA';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_SA',
        'reason',
        'notes',
    ];
    public function productlist()
    {
        return $this->morphMany(ProductList::class, 'producttable');
    }
}
