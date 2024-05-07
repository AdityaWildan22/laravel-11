<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'nip',
        'username',
        'nama',
        'password',
        'jabatan',
        'alamat',
        'jenis_kelamin',
        'role',
    ];
}