<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable =[
        'kode_pegawai',
        'nama',
        'jk',
        'alamat',
        'hp'
    ];
}
