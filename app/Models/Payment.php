<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $primaryKey = 'id_Payment';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Payment',
        'date',
        'reference',
        'receivedAmount',
        'payingAmount',
        'paymentType',
        'note',
        'id_Sale',
    ];
    public function sale()
    {
        return $this->belongsTo(Sale::class,'id_Sale');
    }
}
