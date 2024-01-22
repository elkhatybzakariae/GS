<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expenses';
    protected $primaryKey = 'id_Expense';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Expense',
        'date',
        'amount',
        'reference',
        'expensefor',
        'description',
        'status',
        'id_Cat',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'id_Cat');
    }
}
