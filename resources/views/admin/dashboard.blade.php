<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- TOP BAR -->
<div class="bg-black text-white p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">🛠 Technowest Admin</h1>

    <div class="flex gap-3">
        <a href="/shop" class="bg-blue-500 px-3 py-1 rounded">
            Siteye Git
        </a>

        <a href="/admin/products" class="bg-green-500 px-3 py-1 rounded">
            Ürünler
        </a>
    </div>
</div>

<!-- CONTENT -->
<div class="p-6">

    <h2 class="text-2xl font-bold mb-6">
        Dashboard
    </h2>

    <!-- CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- PRODUCTS -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-gray-500">Toplam Ürün</h3>
            <p class="text-3xl font-bold">
                {{ \App\Models\Product::count() }}
            </p>
        </div>

        <!-- USERS -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-gray-500">Kullanıcılar</h3>
            <p class="text-3xl font-bold">
                {{ \App\Models\User::count() }}
            </p>
        </div>

        <!-- CART INFO (fake) -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-gray-500">Sistem Durumu</h3>
            <p class="text-green-600 font-bold">
                Aktif
            </p>
        </div>

    </div>

    <!-- QUICK ACTIONS -->
    <div class="mt-8 bg-white p-6 rounded shadow">

        <h3 class="text-xl font-bold mb-4">
            Hızlı İşlemler
        </h3>

        <div class="flex gap-4">

            <a href="/admin/products/create"
               class="bg-green-500 text-white px-4 py-2 rounded">
                ➕ Ürün Ekle
            </a>

            <a href="/admin/products"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                📦 Ürünleri Gör
            </a>

            <a href="/shop"
               class="bg-gray-700 text-white px-4 py-2 rounded">
                🛍 Siteyi Gör
            </a>

        </div>

    </div>

</div>

</body>
</html>