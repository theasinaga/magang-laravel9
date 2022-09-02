<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'asal_instansi',
        'semester'
    ];
}
