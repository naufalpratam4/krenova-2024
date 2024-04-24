@extends('layouts.MasterUser')
@include('template.navbarAdmin')
@section('content')
    <div class="">
        <div class="flex justify-between items-center mb-8">
            <div class=" ">
                <p class="text-4xl font-bold">Data User</p>
            </div>
            <div>
                <a href="/admin/add-user"> <button
                        class="px-5 py-1 bg-blue-700 text-white h-full rounded-full hover:bg-blue-900 transition duration-200">Tambah
                        User Baru
                        +</button></a>


            </div>
        </div>

        <div class="flex justify-end">
            <form action="{{ route('admin.user') }}" method="GET" class="flex items-center">
                <input type="text" name="search" placeholder="Cari pengguna..." class="px-2 py-1 border rounded-md">
                <button type="submit"
                    class="px-3 py-1 bg-blue-700 hover:bg-blue-900 transition duration-200 text-white rounded-md ml-2">Search</button>
            </form>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Username
                                <a href="{{ route('admin.user', ['sort' => 'username', 'order' => $request->query('order') == 'asc' ? 'desc' : 'asc']) }}"
                                    class="ml-1">
                                    <i class="fa-solid fa-sort"></i>
                                </a>

                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Nama
                                <a href="{{ route('admin.user', ['sort' => 'nama_lengkap', 'order' => $request->query('order') == 'asc' ? 'desc' : 'asc']) }}"
                                    class="ml-1">
                                    <i class="fa-solid fa-sort"></i>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Email
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Tanggal Buat

                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No HP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Aksi
                            </div>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $no => $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{ $no + 1 }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->username }}
                            </th>

                            <td class="px-6 py-4">
                                {{ $item->nama_lengkap }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->email }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->created_at }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->no_hp }}
                            </td>

                            <td class="px-6 py-4">
                                <a href=""><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href=""><i class="fa-solid fa-trash  text-red-500"></i></a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>

    <div class="pt-2">
        @include('layouts.PaginateDataUser')
    </div>
@endsection
