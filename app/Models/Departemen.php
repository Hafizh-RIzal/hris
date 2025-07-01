<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departemen extends Model
{
    use HasFactory;

    protected $table = 'departemen';

    protected $fillable = [
        'kode_departemen',
        'nama_departemen',
        'lokasi',
    ];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'id_departemen');
    }
}