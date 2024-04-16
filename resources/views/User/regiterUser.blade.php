@extends('layouts.MasterLandingPage')
@include('template.user.NavBar')
<div class="mt-20">
    <form class="max-w-sm mx-auto">
        <div class="text-4xl font-bold mb-5">Register</div>
        <div class="mb-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                Lengkap</label>
            <input type="text" id="nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Nama Lengkap" required />
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                email</label>
            <input type="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="name@flowbite.com" required />
        </div>
        <div>
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <option value="">Pilih Provinsi</option>
                @foreach ($provinces as $item)
                    <option>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- kota --}}
        <div>
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
            <select id="cities"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Pilih Kota</option>
            </select>
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                password</label>
            <input type="password" id="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>

        <div class=" flex justify-center">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</button>
            <button type="button"
                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Login</button>
        </div>

    </form>

</div>
<script>
    document.getElementById('countries').addEventListener('change', function() {
        var provinceName = this.value;

        if (provinceName) {
            fetch('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json')
                .then(response => response.json())
                .then(data => {
                    // Cari ID provinsi berdasarkan nama provinsi yang dipilih
                    var province = data.find(province => province.name === provinceName);
                    var provinceId = province ? province.id : null;

                    if (provinceId) {
                        // Buat permintaan ke API untuk mendapatkan kota berdasarkan ID provinsi
                        fetch(
                                `https://emsifa.github.io/api-wilayah-indonesia/api/regencies/${provinceId}.json`
                                )
                            .then(response => response.json())
                            .then(cities => {
                                var citiesSelect = document.getElementById('cities');
                                citiesSelect.innerHTML = '<option value="">Pilih Kota</option>';

                                cities.forEach(city => {
                                    var option = document.createElement('option');
                                    option.value = city.id;
                                    option.text = city.name;
                                    citiesSelect.appendChild(option);
                                });
                            })
                            .catch(error => console.error('Error:', error));
                    } else {
                        // Jika ID provinsi tidak ditemukan
                        console.error('Province ID not found');
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            // Jika tidak ada provinsi yang dipilih
            document.getElementById('cities').innerHTML = '<option value="">Pilih Kota</option>';
        }
    });
</script>
