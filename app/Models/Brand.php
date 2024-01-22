<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $primaryKey = 'id_Brand';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Brand',
        'brandPic',
        'brandName',
        'description',
    ];
    public function product()
    {
        return $this->hasMany(Product::class,'id_Discount');
    }
}
