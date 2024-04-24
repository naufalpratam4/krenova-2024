<!-- resources/views/admin/tambah_produk.blade.php -->

@extends('layouts.MasterUser')

@section('content')
    <div class="flex  ">
        <div class="text-4xl font-bold pt-8 pb-5">
            <span>
                <a href="{{ route('admin.kategori') }}"><i class="fa-regular fa-circle-left"></i></a>
            </span>Edit Kategori
        </div>
    </div>
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Success! </span>{{ session('success') }}
        </div>
    @endif

    <div>
        <form class="max-w-lg mx-auto" method="POST" action="{{ route('admin.addKategoriPost') }} "
            enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <div class="mb-5">
                <label for="nama_kategori" class="block mb-2 text-sm font-medium text-gray-900">Nama Kategori</label>
                <input type="text" placeholder="Masukkan nama kategori" id="nama_kategori" name="nama_kategori"
                    value="{{ $kategori->nama_kategori }}" value="nama_kategori" value="{{ old('nama_kategori') }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nama_kategori') border-red-500 @enderror" />
                @error('nama_kategori')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                        {{ $message }}</p>
                @enderror
            </div>

            {{-- deskripsi --}}
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900  ">Deskripsi</label>
                <textarea id="message" rows="4" name="deskripsi"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="{{ $kategori->deskripsi }}"></textarea>
                @error('deskripsi')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Tambah
                    Kategori</button>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            var nama_produk = document.getElementById('nama_produk').value;
            var kd_produk = document.getElementById('kd_produk').value.trim();
            var deskripsi = document.getElementById('deskripsi');
            var harga = document.getElementById('harga');
            var stok = document.getElementById('stok');
            var lokasi = document.getElementById('lokasi');
            var ukuran = document.getElementById('ukuran');
            var gambar = document.getElementById('gambar');
            var kategori_id = document.getElementById('kategori_id');
            var penjual_id = document.getElementById('penjual_id');

            var nama_produk = document.getElementById('nama_produk');
            var kd_produk = document.getElementById('kd_produk').value.trim();
            var deskripsi = document.getElementById('deskripsi');
            var harga = document.getElementById('harga');
            var stok = document.getElementById('stok');
            var lokasi = document.getElementById('lokasi');
            var ukuran = document.getElementById('ukuran');
            var gambar = document.getElementById('gambar');
            var kategori_id = document.getElementById('kategori_id');
            var penjual_id = document.getElementById('penjual_id');


            if (nama_produk === '') {
                document.getElementById('error-message').innerText = 'Nama Produk harus diisi';
                return false;
            } else {
                nameError.style.display = 'none';
            }

            if (addressInput === '') {
                addressError.style.display = 'block';
                return false; // Menghentikan pengiriman formulir jika validasi gagal
            } else {
                addressError.style.display = 'none';
            }

            return true; // Lanjutkan pengiriman formulir jika validasi berhasil
        }
    </script>
@endsection
