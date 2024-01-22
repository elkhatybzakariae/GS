<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $table = 'transfers';
    protected $primaryKey = 'id_Transfer';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Transfer',
        'DateOfTransferOrder',
        'SourceStore',
        'DestinationStore',
        'Reference',
        'GrandTotal',
        'notes',
        'status',
        'id_Store',
    ];
    public function store()
    {
        return $this->belongsTo(Store::class,'id_Store');
    }
    public function productlist()
    {
        return $this->morphMany(ProductList::class, 'producttable');
    }
    // public function transfer()
    // {
    //     return $this->hasMany(Person::class,'id_Transfer');
    // }
}
