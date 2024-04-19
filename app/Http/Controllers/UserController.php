<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::all();
        if ($request->is('api/*')) {
            return response()->json(['data' => $produk]);
        } else {
            return view('User.landingPage', compact('produk'));
        }
    }
    public function home(Request $request)
    {
        $produk = Produk::all();
        if ($request->is('api/*')) {
            return response()->json(['data' => $produk]);
        } else {
            return view('UserAfterLogin.LandingPage', compact('produk'));
        }
    }
    public function produkDetail(Request $request, $id)
    {
        $produk = Produk::with('namaKategori')->findOrFail($id);

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['detail data' => $produk]);
        } else {
            return view('User.detailProduk', compact('produk'));
        }
    }
}
