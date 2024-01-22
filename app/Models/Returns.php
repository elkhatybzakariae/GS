<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    use HasFactory;
    protected $table = 'returns';
    protected $primaryKey = 'id_Ret';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Ret',
        // 'question',
        'returntable_id',
        'returntable_type',
        'date',
        'reference',
        'tax',
        'discount',
        'shipping',
        'status',
        'description',
    ];
    public function returntable()
    {
        return $this->morphTo();
    }
    // public function person()
    // {
    //     return $this->belongsTo(Person::class,'id_P');
    // }
}
