<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'nip',
        'nama_lengkap',
        'email',
        'telepon',
        'no_ktp',
        'npwp',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'id_jabatan',
        'id_departemen',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'id_departemen');
    }
}