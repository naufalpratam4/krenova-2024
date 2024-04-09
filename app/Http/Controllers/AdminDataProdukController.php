<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\alert;

class AdminDataProdukController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::with('namaKategori')->paginate(5); // 10 adalah jumlah item per halaman

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['data' => $produk]);
        } else {
            return view('Admin.DataProduk.Products', compact('produk'));
        }
    }

    public function showAddProduk(Request $request)
    {
        $kategori = Kategori::all();
        $penjual = User::where('role_id', 1)->get();
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['Data' => $penjual]);
        } else {
            return view('Admin.DataProduk.AddProduk', compact('penjual', 'kategori'));
        }
    }
    public function addProduk(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kd_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'lokasi' => 'required',
            'ukuran' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'penjual_id' => 'required',
        ]);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'kd_produk' => $request->kd_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'lokasi' => $request->lokasi,
            'ukuran' => $request->ukuran,
            'gambar' => $request->gambar,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'penjual_id' => $request->penjual_id,
        ]);
        return redirect()->route('admin.addProduk', compact('data'))->with('success', 'Produk berhasil ditambahkan');
    }
}
