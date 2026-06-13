<!DOCTYPE html>
<html>
<head>
    <title>Admin - Ürün Ekle</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">


<div class="bg-black text-white p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">🛠 Admin Panel</h1>

    <a href="/admin/products" class="bg-gray-700 px-3 py-1 rounded">
        Ürünler
    </a>
</div>


<div class="flex justify-center items-center mt-10">

    <div class="bg-white p-8 rounded shadow w-full max-w-lg">

        <h1 class="text-2xl font-bold mb-6 text-center">
            ➕ Ürün Ekle
        </h1>

        <form method="POST" action="/admin/products" class="space-y-4">
            @csrf

            <input
                name="name"
                placeholder="Ürün adı"
                class="w-full border p-2 rounded"
            >

            <input
                name="price"
                placeholder="Fiyat"
                class="w-full border p-2 rounded"
            >

            <input
                name="stock"
                placeholder="Stok"
                class="w-full border p-2 rounded"
            >
            <select name="category_id">
                @foreach(\App\Models\Category::all() as $cat)
            <option value="{{ $cat->id }}">
                {{ $cat->name }}
            </option>
                @endforeach
    </select>

            <input
                name="image"
                placeholder="Resim URL (https://...)"
                class="w-full border p-2 rounded"
            >

            <button
                type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600"
            >
                Kaydet
            </button>

        </form>

    </div>

</div>

</body>
</html>