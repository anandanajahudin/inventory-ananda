<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\User;

class PenjualanController extends Controller
{
    public function index() {
        $barangs = Barang::all();
        $users = User::all();
        $penjualans = Penjualan::with('barang', 'user')->get();

        return view('admin.penjualans.index', [
            'barangs' => $barangs,
            'users' => $users,
            'penjualans' => $penjualans,
        ]);
    }

    public function store(Request $request)
    {
        $values = $request->validate([
            'barang' => 'required',
            'pembeli' => 'required',
        ]);

        $penjualan = new Penjualan;

        $penjualan->id_barang = $values['barang'];
        $penjualan->id_user = $values['pembeli'];
        $penjualan->save();

        return redirect()->route('penjualan.index')->with('status', 'Data Berhasil Disimpan');
    }

    public function show(Penjualan $penjualan)
    {
        $barangs = Barang::all();
        $users = User::all();
        $penjualans = Penjualan::with('barang', 'user')->get();

        return view('admin.penjualans.show', [
            'barangs' => $barangs,
            'users' => $users,
            'penjualans' => $penjualans ], compact('penjualan'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $values = $request->validate([
            'barang' => 'required',
            'pembeli' => 'required',
        ]);

        Penjualan::where('id', $penjualan->id)->update([
            'id_barang' => $values['barang'],
            'id_user' => $values['pembeli']
        ]);

        return redirect()->route('penjualan.index')->with('status', 'Data Berhasil Diubah');
    }

    public function destroy(Penjualan $penjualan)
    {
        Penjualan::destroy($penjualan->id);
        return redirect()->route('penjualan.index')->with('status', 'Data Berhasil Dihapus');
    }
}