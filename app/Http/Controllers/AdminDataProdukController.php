<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class AdminDataProdukController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::with('namaKategori')->get();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['data' => $produk]);
        } else {
            return view('User.Products', compact('produk'));
        }
    }
}
