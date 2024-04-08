<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = ['kd_produk', 'nama_produk', 'deskripsi', 'harga', 'stok', 'lokasi', 'gambar', 'kategori_id', 'penjual_id'];
    protected $table = 'produk';

    public function namaKategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
