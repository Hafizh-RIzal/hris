<?php


namespace App\Http\Controllers;
use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $data = Departemen::latest()->get();
        return view('departemen.index', compact('data'));
    }


    public function create()
    {
        return view('departemen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_departemen' => 'required|unique:departemen,kode_departemen',
            'nama_departemen' => 'required',
            'lokasi' => 'nullable|string',
        ]);

        Departemen::create($request->all());
        return redirect()->route('departemen.index')->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function edit(Departemen $departemen)
    {
        return view('departemen.edit', compact('departemen'));
    }

    public function update(Request $request, Departemen $departemen)
    {
        $request->validate([
            'kode_departemen' => 'required|unique:departemen,kode_departemen,' . $departemen->id,
            'nama_departemen' => 'required',
            'lokasi' => 'nullable|string',
        ]);

        $departemen->update($request->all());
        return redirect()->route('departemen.index')->with('success', 'Departemen berhasil diperbarui.');
    }

    public function destroy(Departemen $departemen)
    {
        $departemen->delete();
        return redirect()->route('departemen.index')->with('success', 'Departemen berhasil dihapus.');
    }
}