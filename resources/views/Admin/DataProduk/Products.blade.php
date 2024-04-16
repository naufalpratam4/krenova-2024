@extends('layouts.MasterUser')
@section('content')
    <div class="mb-4">
        <div class="text-4xl font-bold pt-8 pb-5">Data Ikan</div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <div>
                    <a href="{{ route('admin.addProduk') }}"><button
                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100   focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            type="button">
                            Tambah Produk
                        </button></a>

                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div
                        class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for items">
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            No
                        </th>
                        <th scope="col" class="px-1 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kode
                        </th>
                        <th scope="col" class="px-1 pe-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-3 py-3">
                            Stok
                        </th>
                        <th scope="col" class="px-3 py-3">
                            Lokasi
                        </th>
                        <th scope="col" class="px-3 py-3">
                            Kategori
                        </th>
                        <th scope="col" class="px-3 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $no => $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th class="w-4 p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" scope="row">
                                {{ $no++ }}
                            </th>
                            <th scope="row"
                                class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nama_produk }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->kd_produk }}
                            </td>
                            <td class="px-1 py-4">
                                Rp. {{ $item->harga }}
                            </td>
                            <td class="px-3 py-4">
                                {{ $item->stok }}
                            </td>
                            <td class="px-3 py-4">
                                {{ $item->lokasi }}
                            </td>
                            <td class="px-3 py-4">
                                {{ $item->namaKategori->nama_kategori }}
                            </td>
                            <td class="px-3 py-4 " style="max-width: 200px">
                                <div class="truncate ...">{{ $item->deskripsi }}</div>
                            </td>
                            <td class="px-1 py-4 " style="max-width: 200px">
                                <div><img src="{{ asset('gambar/' . $item->gambar) }}" alt="">
                                </div>
                            </td>
                            <td class="px-6 py-4 flex">
                                <a href="{{ route('admin.editProduk', $item->id) }}"
                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-1 md:px-5 md:py-2.5 me-2 mb-2 dark:focus:ring-yellow-900"
                                    type="button">Edit</a>
                                <form action="{{ route('admin.destroyProduk', $item->id) }}" method="POST" type="button"
                                    onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1 md:px-5 md:py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                        type="submit">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layouts.PaginateUser')
@endsection
