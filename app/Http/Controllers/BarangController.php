<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index() {
        $barangs = Barang::all();
        return view('admin.barangs.index', ['barangs' => $barangs]);
    }

    public function store(Request $request)
    {
        $values = $request->validate([
            'nama' => 'required|max:20',
            'jenis' => 'required|max:20',
            'harga' => 'required'
        ]);

        $barang = new Barang;

        $barang->nama = $values['nama'];
        $barang->jenis = $values['jenis'];
        $barang->harga = $values['harga'];
        $barang->save();

        return redirect()->route('barang.index')->with('status', 'Data Berhasil Disimpan');
    }

    public function show(Barang $barang)
    {
        return view('admin.barangs.show', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $values = $request->validate([
            'nama' => 'required|max:20',
            'jenis' => 'required|max:20',
            'harga' => 'required',
        ]);

        Barang::where('id', $barang->id)->update([
            'nama' => $values['nama'],
            'jenis' => $values['jenis'],
            'harga' => $values['harga']
        ]);

        return redirect()->route('barang.index')->with('status', 'Data Berhasil Diubah');
    }

    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);
        return redirect()->route('barang.index')->with('status', 'Data Berhasil Dihapus');
    }
}