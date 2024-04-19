<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kd_produk = ['IKN001', 'IKN002', 'KPT001', 'CUM001', 'SOT001'];
        $nama_produk = ['Ikan Bandeng', 'Ikan Tongkol', 'Cumi Cumi', 'Sotong', 'Lele'];

        $faker = \Faker\Factory::create('id ID');
        for ($i = 0; $i < 5; $i++) {
            Produk::create([
                'kd_produk' =>  $kd_produk[$i],
                'nama_produk' => $nama_produk[$i],
                'deskripsi' => $faker->sentence,
                'harga' => $faker->numberBetween(20000, 100000),
                'stok' => $faker->numberBetween(10, 200),
                'lokasi' => $faker->city,
                'ukuran' => '3kg',
                'gambar' => 'https://picsum.photos/seed/picsum/200/200',
                'kategori_id' => Kategori::inRandomOrder()->first()->id,
                'penjual_id' => User::inRandomOrder()->where('role_id', 1)->first()->id,
            ]);
        }
    }
}
