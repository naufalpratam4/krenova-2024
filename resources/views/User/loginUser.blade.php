@extends('layouts.MasterLandingPage')
<div class="text-slate-500   flex justify-end p-16">Belum memiliki akun? <a href="/register"
        class="text-blue-800 ms-1">Daftar
        Sekarang</a>
</div>
<div class="grid md:grid-cols-2 gap-4 container   mx-auto  ">
    <div class="w-11/12 order-1">
        <div class="font-semibold text-4xl text-blue-800 pt-20 md:pt-0">Halo, Selamat Datang Kembali
            di Oceanfy
        </div>
        <div style="margin-top: -50px"><img src="{{ asset('assets/images/register.png') }}" alt=""></div>
    </div>

    {{-- login --}}
    <div class="order-2 md:mt-5">
        <form class="max-w-lg mx-auto" action="{{ route('auth.login') }} " method="POST">
            @if (Session::has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">Success alert!</span> {{ Session::get('success') }}
                </div>
            @endif
            @csrf
            <div class="text-4xl font-semibold text-blue-800 mb-5">Masuk</div>
            <div class="font-semibold text-slate-500 mb-5">Silahkan masuk menggunakan email dan kata sandi yang
                terdaftar.
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-blue-800  dark:text-white">Alamat
                    Email</label>
                <input type="email" id="email" name="email"
                    class="bg-gray-50 border border-blue-800 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan email anda" required />
            </div>

            {{-- kata sandi --}}

            <div>
                <label for="password" class="block  mb-2 text-sm font-medium text-blue-800 dark:text-white">Kata
                    Sandi</label>
                <input type="password" id="password" name="password"
                    class="bg-gray-50 border border-blue-800 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="Masukkan kata sandi Anda" />
            </div>




            <div class="flex items-start mb-5 mt-2">
                <div class="flex items-center h-5">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-800 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                </div>
                <label for="remember_me" class="ms-2 text-sm font-normal text-gray-500 dark:text-gray-300">Ingat
                    saya</label>
            </div>


            <div class=" flex justify-center ">
                <button type="submit"
                    class=" text-white w-full bg-blue-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">Masuk</button>
            </div>

        </form>
    </div>
</div>
