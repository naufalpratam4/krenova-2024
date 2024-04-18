@extends('layouts.MasterLandingPage')

@section('content')
    <div class="container  mx-auto">
        <div class=" text-white w-full h-60 flex mx-auto rounded-3xl"
            style="background: url('https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg')">
        </div>
        <div>
            <div class="font-bold text-2xl my-2">Produk</div>


            <div class="grid grid-cols-2 gap-2 md:grid-cols-4 md:gap-4">
                @foreach ($produk as $item)
                    <div>
                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg w-full" src="{{ asset('gambar/' . $item->gambar) }}" alt=""
                                    style="width: auto; height: 200px;" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $item->nama_produk }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->deskripsi }}</p>
                                <p>Lokasi: {{ $item->lokasi }}</p>
                                <div class="flex justify-between">
                                    <p class="text-lg font-bold">Rp. {{ $item->harga }}</p>
                                    <p class="text-lg font-light">Stok: {{ $item->stok }}</p>
                                </div>

                                <a href="{{ route('user.produkDetail', $item->id) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
