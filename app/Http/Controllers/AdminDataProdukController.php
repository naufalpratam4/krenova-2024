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

        $data = new Produk([
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
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('gambar/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }


        return redirect()->route('admin.addProduk')->with('success', 'Produk berhasil ditambahkan');
    }
    public function editProduk($id)
    {
        $kategori = Kategori::all();
        $penjual = User::where('role_id', 1)->get();

        $produk = Produk::findOrFail($id);

        return view('Admin.DataProduk.EditProduk', compact('kategori', 'penjual', 'produk'));
    }
    public function updateProduk(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kd_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'lokasi' => 'required',
            'ukuran' => 'required',
            // 'gambar' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'penjual_id' => 'required',
        ]);

        // $produk = Produk::findOrFail($id);
        // $awal = $produk->gambar;

        $data =  new Produk([
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

        $data = Produk::find($id); // Assuming you are retrieving the model by its ID
        if ($request->hasFile('gambar')) {
            $files = $request->file('gambar');

            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('gambar/'), $filename);
                // Assuming you want to save the filename to the database column 'gambar'
                $data->gambar = $filename;
            }
        }

        // Save any other attributes from the request
        // For example:
        $data->attribute1 = $request->input('attribute1');
        $data->attribute2 = $request->input('attribute2');
        // Add any other attributes as needed

        $data->save();



        return redirect()->route('admin.editProduk', $produk->id)->with('success', 'Produk berhasil diperbarui');
    }

    public function destroyProduk($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('/admin-product')->with('success', 'Data berhasil di hapus');
    }
}
