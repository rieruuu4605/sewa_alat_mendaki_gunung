<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable =[
        'iduser',
        'alamat',
        'telepon',
        'kodepos',
        'jeniskelamin',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
