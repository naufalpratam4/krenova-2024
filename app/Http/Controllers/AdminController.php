<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function DashboardAdmin(Request $request)
    {
        $produk = Produk::all()->count();
        $user = User::all()->count();
        $kategori = Kategori::all()->count();
        $penjual = User::where('role_id', 1)->count();
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                'produk' => $produk
            ]);
        } else {
            return view('Admin.Dashboard.DashboardAdmin', compact('produk', 'user', 'kategori', 'penjual'));
        }
    }
}
