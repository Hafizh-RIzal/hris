<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        $data = Absensi::with('karyawan')->latest()->get();
        return view('absensi.index', compact('data'));
    }

    public function create()
    {
        $karyawan = Karyawan::all();
        return view('absensi.create', compact('karyawan'));
    }
    public function show(Absensi $absensi)
{
    return view('absensi.show', compact('absensi'));
}


    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id',
            'tanggal' => 'required|date|unique:absensi,tanggal,NULL,id,karyawan_id,' . $request->karyawan_id,
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'status' => 'required|in:Hadir,Terlambat,Izin,Sakit,Alpha',
            'catatan' => 'nullable|string',
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function edit(Absensi $absensi)
    {
        $karyawan = Karyawan::all();
        return view('absensi.edit', compact('absensi', 'karyawan'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id',
            'tanggal' => 'required|date|unique:absensi,tanggal,' . $absensi->id . ',id,karyawan_id,' . $request->karyawan_id,
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'status' => 'required|in:Hadir,Terlambat,Izin,Sakit,Alpha',
            'catatan' => 'nullable|string',
        ]);

        $absensi->update($request->all());

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus.');
    }

    public function formAbsen()
    {
        $user = Auth::user();
        $karyawan = $user->karyawan;

        if (!$karyawan) {
    Auth::logout();
    return redirect()->route('login')->with('error', 'Akun Anda belum terhubung ke data karyawan.');
}
        return view('absensi.presensi', compact('karyawan'));
    }

    public function simpanAbsen(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'catatan' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $karyawan = $user->karyawan;

        if (!$karyawan) {
            return back()->with('error', 'User belum terhubung ke data karyawan.');
        }

        $sudah = Absensi::where('karyawan_id', $karyawan->id)
            ->where('tanggal', $request->tanggal)
            ->first();

        if ($sudah) {
            return back()->with('info', 'Kamu sudah mengisi absensi hari ini.');
        }

        $jamMasuk = $request->jam_masuk ?? now()->format('H:i');
        $status = ($jamMasuk <= '08:00') ? 'Hadir' : 'Terlambat';

        Absensi::create([
            'karyawan_id' => $karyawan->id,
            'tanggal'     => $request->tanggal,
            'jam_masuk'   => $jamMasuk,
            'jam_keluar'  => $request->jam_keluar,
            'status'      => $status,
            'catatan'     => $request->catatan,
        ]);

        return redirect()->route('absensi.presensi')->with('success', 'Absensi berhasil disimpan.');
    }
}
