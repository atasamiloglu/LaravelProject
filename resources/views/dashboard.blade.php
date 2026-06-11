<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            📊 Dashboard
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Card -->
            <div class="bg-gray-100 rounded-xl shadow p-8 mb-6">
                <h1 class="text-2xl font-bold text-gray-900">
                    Hoş geldin 👋
                </h1>
                <p class="mt-2 text-sm text-gray-700">
                    E-ticaret yönetim paneline başarıyla giriş yaptın.
                </p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Users -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">Kullanıcılar</h3>
                    <p class="text-2xl font-bold text-gray-800 mt-2">—</p>
                </div>

                <!-- Products -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">Ürünler</h3>
                    <p class="text-2xl font-bold text-gray-800 mt-2">—</p>
                </div>

                <!-- Orders -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">Siparişler</h3>
                    <p class="text-2xl font-bold text-gray-800 mt-2">—</p>
                </div>

            </div>

            <!-- Info Section -->
            <div class="mt-8 bg-white rounded-xl shadow p-6">

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Sistem Durumu
                </h3>

                <p class="text-gray-600">
                    Sistem çalışıyor ✔ Admin panel aktif ✔ E-ticaret altyapısı hazır ✔
                </p>

            </div>

        </div>

    </div>
</x-app-layout>