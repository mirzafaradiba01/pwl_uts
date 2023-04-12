<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IceCreamModel extends Model
{
    use HasFactory;
    protected $table = 'ice_cream';
    protected $fillable =[
        'kode_barang',
        'nama_ice',
        'harga',
        'qty',
    ];
}
