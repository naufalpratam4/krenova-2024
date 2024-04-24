@extends('layouts.MasterUser')
@section('content')
    <div class="mb-4">
        <div class="text-4xl font-bold pt-8 pb-5">Data Penjual</div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <div>
                    <a href="{{ route('admin.addProduk') }}">
                        <button
                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100   focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            type="button">
                            Tambah Produk
                        </button>
                    </a>

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
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-1 pe-6 py-3">
                            Username
                        </th>
                        <th scope="col" class="px-3 py-3">
                            Tgl Buat
                        </th>
                        <th scope="col" class="px-3 py-3">
                            No HP
                        </th>
                        <th scope="col" class="px-3 py-3">
                            Aksi
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjual as $no => $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th class="w-4 p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" scope="row">
                                {{ $no + 1 }}
                            </th>
                            <th scope="row"
                                class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{ route('admin.detailPenjual', $item->id) }}">{{ $item->email }}</a>
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->nama_lengkap }}
                            </td>
                            <td class="px-1 py-4">
                                {{ $item->username }}
                            </td>
                            <td class="px-3 py-4">
                                {{ $item->created_at }}
                            </td>
                            <td class="px-3 py-4">
                                {{ $item->no_hp }}
                            </td>
                            <td class="px-6 py-4">
                                <a href=""><i class="fa-regular fa-pen-to-square text-blue-500"></i></a>
                                <a href=""><i class="fa-solid fa-trash  text-red-500"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @include('layouts.PaginateUser') --}}
@endsection
