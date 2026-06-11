<!DOCTYPE html>
<html>
<head>
    <title>Admin - Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">


<div class="bg-black text-white p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">🛠 Ürün Yönetimi</h1>

    <div class="flex gap-3">
        <a href="/admin/products/create" class="bg-green-500 px-3 py-1 rounded">
            ➕ Ürün Ekle
        </a>

        <a href="/admin" class="bg-gray-700 px-3 py-1 rounded">
            Dashboard
        </a>
    </div>
</div>


<div class="p-6">

    <div class="bg-white shadow rounded overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Görsel</th>
                    <th class="p-3">Ürün</th>
                    <th class="p-3">Fiyat</th>
                    <th class="p-3">Stok</th>
                    <th class="p-3">İşlem</th>
                </tr>
            </thead>

            <tbody>

                @foreach($products as $product)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-3">{{ $product->id }}</td>

                    <td class="p-3">
                        <img src="{{ $product->image }}"
                             class="w-12 h-12 object-cover rounded">
                    </td>

                    <td class="p-3 font-bold">
                        {{ $product->name }}
                    </td>

                    <td class="p-3 text-green-600">
                        {{ $product->price }} TL
                    </td>

                    <td class="p-3">
                        {{ $product->stock }}
                    </td>

                    <td class="p-3 flex gap-2">

                        

                        <!-- DELETE -->
                        <form method="POST" action="/admin/products/{{ $product->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 text-white px-2 py-1 rounded text-sm">
                                Sil
                            </button>
                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>