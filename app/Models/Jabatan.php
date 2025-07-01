<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';

    protected $fillable = [
        'kode_jabatan',
        'nama_jabatan',
        'tingkat',
        'gaji_pokok',
    ];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'id_jabatan');
    }
}