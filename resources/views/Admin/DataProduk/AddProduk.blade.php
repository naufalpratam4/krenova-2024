<!-- resources/views/admin/tambah_produk.blade.php -->

@extends('layouts.MasterUser')

@section('content')
    <div class="flex  ">
        <div class="text-4xl font-bold pt-8 pb-5">
            <span>
                <a href="{{ route('admin.produk') }}"><i class="fa-regular fa-circle-left"></i></a>
            </span>Tambah Produk
        </div>
    </div>
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Success! </span>{{ session('success') }}
        </div>
    @endif

    <div>
        <form class="max-w-lg mx-auto" method="POST" action="{{ route('admin.addProduk') }} " enctype="multipart/form-data"
            onsubmit="return validateForm()">
            @csrf
            <div class="mb-5">
                <label for="nama_produk" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nama_produk') border-red-500 @enderror" />
                @error('nama_produk')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                        {{ $message }}</p>
                @enderror
            </div>


            <div class="mb-5">
                <label for="kd_produk" class="block mb-2 text-sm font-medium text-gray-900">Kode Produk</label>
                <input type="text" id="kd_produk" name="kd_produk"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                @error('kd_produk')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- harga dan stok --}}
            <div class="row flex  gap-2">
                <div class="col-lg-6 w-full">
                    <div class="mb-5">
                        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                        <input type="text" id="harga" name="harga"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        @error('harga')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 w-full">
                    <div class="mb-5">
                        <label for="stok" class="block mb-2 text-sm font-medium text-gray-900">Stok </label>
                        <input type="text" id="stok" name="stok"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        @error('stok')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">Lokasi </label>
                <input type="text" id="lokasi" name="lokasi"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                @error('lokasi')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="ukuran" class="block mb-2 text-sm font-medium text-gray-900">Ukuran </label>
                <input type="text" id="ukuran" name="ukuran"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                @error('ukuran')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
                    file</label>
                <input name="gambar"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="gambar" type="file">
                @error('gambar')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                <select id="kategori_id" name="kategori_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                    <option value=""></option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }} </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Penjual</label>

                <select id="penjual_id" name="penjual_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                    <option value=""></option>

                    @foreach ($penjual as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                    @endforeach


                </select>
                @error('penjual_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- deskripsi --}}
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900  ">Deskripsi</label>
                <textarea id="message" rows="4" name="deskripsi"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Leave a comment..."></textarea>
                @error('deskripsi')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Tambah
                    Produk</button>
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
