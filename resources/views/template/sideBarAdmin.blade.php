<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
    aria-controls="sidebar-multi-level-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="sidebar-multi-level-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-blue-800 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li class="flex justify-center">
                <a href="/admin-dashboard"
                    class="flex items-center bg-white   text-white rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-gray-700 group">

                    <span class=" py-2 px-20 text-xl font-bold"><img width="500px"
                            src="{{ asset('assets/icon/logo2.png') }}" alt=""></span>
                </a>
            </li>
            <li>
                <a href="/admin-dashboard"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-gray-700 group {{ Request::is('admin-dashboard') ? 'bg-blue-500' : '' }}">
                    <img src="{{ asset('assets/icon/dashbord.png') }}" alt="">
                    <span class="ms-3">Dashboard</span>
                </a>

            </li>
            <li>
                <a href="{{ route('admin.produk') }}"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-gray-700 group {{ Request::is('admin-product', 'admin-addProduk') ? 'bg-blue-500' : '' }}">
                    <img src="{{ asset('assets/icon/produk.png') }}" alt="">
                    <span class="ms-3">Produk</span>
                </a>
            </li>
            <li>
                <a href="/admin-kategori-produk"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-gray-700 group {{ Request::is('admin-kategori-produk', 'admin-addKategori') ? 'bg-blue-500' : '' }}">
                    <img src="{{ asset('assets/icon/kategori.png') }}" alt="">
                    <span class="ms-3">Kategori</span>
                </a>
            </li>
            <li>
                <a href="/admin-penjual"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-gray-700 group {{ Request::is('admin-penjual', 'admin-detailPenjual/{id}') ? 'bg-blue-500' : '' }}">
                    <img src="{{ asset('assets/icon/penjual.png') }}" alt="">
                    <span class="ms-3">Penjual</span>
                </a>
            </li>
            <li>
                <a href="/admin-dashboard"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-gray-700 group">
                    <img src="{{ asset('assets/icon/pemesanan.png') }}" alt="">
                    <span class="ms-3">Pemesanan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user') }}"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-gray-700 group {{ Request::is('admin-user', 'admin/add-user') ? 'bg-blue-500' : '' }}">
                    <img src="{{ asset('assets/icon/user.png') }}" alt="">
                    <span class="ms-3">User</span>
                </a>
            </li>
            <li>
                <a href="/logout"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-gray-700 group md:mt-80 ">
                    <img src="{{ asset('assets/icon/user.png') }}" alt="">
                    <span class="ms-3">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<div class="p-4 sm:ml-64">
    <section>@yield('content')</section>
</div>
