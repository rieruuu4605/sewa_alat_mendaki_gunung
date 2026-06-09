<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable =[
        'iduser',
        'idproduct'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'iduser','id');
    }

    public function product()
    {
        return $this->belongsTo(product::class,'idproduct','id');
    }
}
