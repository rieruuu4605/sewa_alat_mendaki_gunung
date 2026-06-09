<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'idproduct',
        'iduser',
        'metode_pembayaran',
        'total_pembayaran'
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
