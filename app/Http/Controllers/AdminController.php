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
            return view('Admin.Dashboard.DashboardAdmin', compact('produk', 'user', 'kategori', 'penjual'))->with('tittle', 'dashboard');
        }
    }
    public function userAdmin(Request $request)
    {
        // Inisialisasi query builder
        $query = User::where('role_id', 2);

        // Filter berdasarkan kata kunci pencarian jika diberikan
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('username', 'LIKE', "%{$searchTerm}%")
                ->orWhere('nama_lengkap', 'LIKE', "%{$searchTerm}%")
                ->orWhere('email', 'LIKE', "%{$searchTerm}%");
        }

        // Pengurutan
        $sortField = $request->query('sort', 'created_at');
        $sortOrder = $request->query('order', 'asc');
        $query->orderBy($sortField, $sortOrder);

        // Ambil data pengguna
        $user = $query->paginate(5);

        // Kembalikan view dengan data pengguna
        return view('Admin.DataUser.user', compact('user', 'request'));
    }

    public function ViewKategori()
    {
        $kategori = Kategori::all();
        return view('Admin.KategoriProduk.KategoriProduk', compact('kategori'));
    }
    public function viewAddKategori()
    {
        $kategori = Kategori::all();
        return view('Admin.KategoriProduk.AddKategori', compact('kategori'));
    }
    public function AddKategori(Request $request)
    {
        $kategori = new Kategori([
            'nama_kategori' => $request->input('nama_kategori'),
            'deskripsi' => $request->input('deskripsi')
        ]);
        $kategori->save();

        return redirect()->route('admin.addKategori')->with('success', 'Data berhasil ditambahkan');
    }

    public function viewEditKategori($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('Admin.KategoriProduk.EditKategori', compact('kategori'));
    }
    public function EditKategori(Request $request, $id)
    {
        $kategori = new Kategori([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi
        ]);

        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;

        $kategori->save();
        return view('Admin.KategoriProduk.KategoriProduk', compact('kategori'))->with('success', 'Sukses edit kategori');
    }
    public function deleteKategori($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/admin-kategori-produk')->with('success', 'sukses menghapus data');
    }
}
