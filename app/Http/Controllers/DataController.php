<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\User;

class DataController extends Controller
{
    public function index() {
        $jml_barang = Barang::count();
        $jml_penjualan = Penjualan::count();
        $jml_user = User::count();

        return view('index', [
            'jml_barang' => $jml_barang,
            'jml_penjualan' => $jml_penjualan,
            'jml_user' => $jml_user,
        ]);
    }

    public function dashboard() {
        $barangs = Barang::all();
        $penjualans = Penjualan::all();
        $users = User::all();

        $jml_barang = Barang::count();
        $jml_penjualan = Penjualan::count();
        $jml_user = User::count();


        return view('admin.index', [
            'barangs' => $barangs,
            'penjualans' => $penjualans,
            'users' => $users,
            'jml_barang' => $jml_barang,
            'jml_penjualan' => $jml_penjualan,
            'jml_user' => $jml_user,
        ]);
    }

}