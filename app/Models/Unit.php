<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'unit';
    protected $primaryKey = 'id_Unit';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Unit',
        'unitName',
    ];
    public function product()
    {
        return $this->hasMany(Product::class,'id_Unit');
    }
}
