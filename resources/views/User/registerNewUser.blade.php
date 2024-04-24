@extends('layouts.MasterLandingPage')
<div class="text-slate-500   flex justify-end p-16">Sudah memiliki akun? <a href="/login"
        class="text-blue-800 ms-1">Masuk</a>
</div>
<div class="grid md:grid-cols-2 gap-4 container   mx-auto  ">
    <div class="w-11/12 order-1">
        <div class="font-semibold text-4xl text-blue-800 pt-20 md:pt-0">Daftarkan dirimu menjadi bagian dari Sea Zean
        </div>
        <div style="margin-top: -50px"><img src="{{ asset('assets/images/register.png') }}" alt=""></div>
    </div>

    {{-- Daftar --}}
    <div class="order-2">
        <form class="max-w-lg mx-auto" action="{{ route('auth.register') }} " method="POST">
            @if (Session::has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">Success alert!</span> {{ Session::get('success') }}
                </div>
            @endif
            @csrf
            <div class="text-4xl font-semibold text-blue-800 mb-5">Daftar</div>
            <div class="font-semibold text-slate-500 mb-5">Daftar sekarang dan terima update tentang produk dan promosi
                kami.
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-blue-800  dark:text-white">Your
                    email</label>
                <input type="email" id="email" name="email"
                    class="bg-gray-50 border border-blue-800 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan email Anda" required />
            </div>

            {{-- no hp --}}
            <div class="mb-5 grid grid-cols-2 gap-2">
                <div>
                    <label for="no_hp"
                        class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Nama</label>
                    <input type="text" id="nama" name="nama_lengkap"
                        class="bg-gray-50 border border-blue-800 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukkan nama Anda" required />
                </div>
                <div>
                    <label for="no_hp" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Nomor
                        Handphone</label>
                    <input type="number" id="no_hp" name="no_hp"
                        class="bg-gray-50 border border-blue-800 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="08xxxxxxxxx" required />
                </div>
            </div>

            {{-- kata sandi --}}
            <div class="mb-3 grid gap-2 grid-cols-2">
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Kata
                        Sandi</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-blue-800 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukkan kata sandi Anda" required />
                </div>
                <div>
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Konfirmasi Kata
                        Sandi</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-blue-800 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Konfirmasi kata sandi Anda" required />
                </div>

            </div>





            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="terms" type="checkbox" value=""
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-800 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                        required />
                </div>
                <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saya setuju
                    dengan
                    <a href="#" class="text-blue-800 hover:underline dark:text-blue-500">Syarat dan
                        Ketentuan</a></label>
            </div>
            <div class=" flex justify-center ">
                <button type="submit"
                    class=" text-white w-full bg-blue-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">Register</button>
            </div>

        </form>
    </div>
</div>
