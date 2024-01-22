<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id_Cat';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_Cat',
        'catName',
        'catPic',
        'catCode',
        'description',
        'id_U'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'id_U');
    }
    public function expenses()
    {
        return $this->hasMany(Expense::class,'id_Cat');
    }
    public function product()
    {
        return $this->hasMany(Product::class,'id_Cat');
    }
}
