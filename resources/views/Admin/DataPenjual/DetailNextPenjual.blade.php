@extends('layouts.MasterUser')
@section('content')
    <div class=" p-8">
        <div class="font-bold text-3xl">Detail Penjual</div>
        <div class="bg-white p-4 mt-5 rounded-lg">
            <div class="grid grid-cols-2 gap-x-36 gap-y-5">
                {{-- nama lengkap --}}
                <div class="">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Lengkap</label>
                    <input type="text" id="base-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                {{-- provinsi --}}
                <div class="">
                    <label for="base-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                    <input type="text" id="base-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>



            </div>
            <div class="flex justify-end mt-10">
                <a href=""><img src="{{ asset('assets/icon/arrowRigth.png') }}" alt=""></a>
            </div>

        </div>
    </div>
@endsection
