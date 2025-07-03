<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\Departemen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = Karyawan::with(['jabatan', 'departemen'])->latest()->get();
        return view('karyawan.index', compact('data'));
    }

    public function create()
    {
        $jabatan = Jabatan::all();
        $departemen = Departemen::all();
        return view('karyawan.create', compact('jabatan', 'departemen'));
    }

   public function store(Request $request)
{
    $request->validate([
        'nip' => 'required|unique:karyawan,nip',
        'nama_lengkap' => 'required|string|max:100',
        'email' => 'required|email|unique:karyawan,email|unique:users,email',
        'telepon' => 'nullable|string|max:20',
        'no_ktp' => 'nullable|string|max:30',
        'npwp' => 'nullable|string|max:30',
        'alamat' => 'nullable|string',
        'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
        'tempat_lahir' => 'nullable|string|max:50',
        'tanggal_lahir' => 'nullable|date',
        'id_jabatan' => 'required|exists:jabatan,id',
        'id_departemen' => 'required|exists:departemen,id',
    ]);

    $karyawan = Karyawan::create([
        'nip' => $request->nip,
        'nama_lengkap' => $request->nama_lengkap,
        'email' => $request->email,
        'telepon' => $request->telepon,
        'no_ktp' => $request->no_ktp,
        'npwp' => $request->npwp,
        'alamat' => $request->alamat,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'id_jabatan' => $request->id_jabatan,
        'id_departemen' => $request->id_departemen,
    ]);

    $user = User::create([
        'name' => $karyawan->nama_lengkap,
        'email' => $karyawan->email,
        'password' => Hash::make('password'), 
        'role' => 'karyawan',
        'karyawan_id' => $karyawan->id, 
    ]);

    $karyawan->update([
        'user_id' => $user->id
    ]);

    return redirect()->route('karyawan.index')->with('success', 'Karyawan & user login berhasil ditambahkan.');
}


    public function edit(Karyawan $karyawan)
    {
        $jabatan = Jabatan::all();
        $departemen = Departemen::all();
        return view('karyawan.edit', compact('karyawan', 'jabatan', 'departemen'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nip' => 'required|unique:karyawan,nip,' . $karyawan->id,
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|email|unique:karyawan,email,' . $karyawan->id . '|unique:users,email,' . $karyawan->user->id ?? 'null',
            'telepon' => 'nullable|string|max:20',
            'no_ktp' => 'nullable|string|max:30',
            'npwp' => 'nullable|string|max:30',
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'id_jabatan' => 'required|exists:jabatan,id',
            'id_departemen' => 'required|exists:departemen,id',
        ]);

        $karyawan->update([
            'nip' => $request->nip,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'no_ktp' => $request->no_ktp,
            'npwp' => $request->npwp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_jabatan' => $request->id_jabatan,
            'id_departemen' => $request->id_departemen,
        ]);

        $user = User::where('karyawan_id', $karyawan->id)->first();
        if ($user) {
            $user->update([
                'name' => $request->nama_lengkap,
                'email' => $request->email,
            ]);
        }

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
    }

    public function destroy(Karyawan $karyawan)
    {
        User::where('karyawan_id', $karyawan->id)->delete();

        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan & user login berhasil dihapus.');
    }
}
