<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class AdminDataProdukController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::with('namaKategori')->paginate(5); // 10 adalah jumlah item per halaman

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['data' => $produk]);
        } else {
            return view('User.DataProduk.Products', compact('produk'));
        }
    }
}
