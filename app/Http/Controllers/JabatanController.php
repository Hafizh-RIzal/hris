<?php

namespace App\Http\Controllers;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
   public function index()
{
    $jabatan = Jabatan::latest()->paginate(10);
return view('jabatan.index', compact('jabatan'));

}


    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_jabatan' => 'required|unique:jabatan,kode_jabatan',
            'nama_jabatan' => 'required',
            'tingkat' => 'nullable|in:junior,middle,senior,lead',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        Jabatan::create($request->all());
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'kode_jabatan' => 'required|unique:jabatan,kode_jabatan,' . $jabatan->id,
            'nama_jabatan' => 'required',
            'tingkat' => 'nullable|in:junior,middle,senior,lead',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        $jabatan->update($request->all());
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil diperbarui.');
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}