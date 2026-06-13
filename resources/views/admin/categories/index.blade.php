<!DOCTYPE html>
<html>
<head>
    <title>Kategoriler</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="bg-black text-white p-4 flex justify-between">
    <h1 class="text-xl font-bold">🛠 Admin Panel</h1>

    <a href="/admin/categories/create"
       class="bg-green-500 px-4 py-2 rounded">
        + Yeni Kategori
    </a>
</div>

<div class="max-w-4xl mx-auto mt-8 bg-white rounded shadow p-6">

    <h2 class="text-2xl font-bold mb-6">
        Kategoriler
    </h2>

    <table class="w-full border">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">ID</th>
                <th class="p-3 text-left">Kategori Adı</th>
                <th class="p-3 text-left">İşlemler</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $category)
            <tr class="border-t">
                <td class="p-3">{{ $category->id }}</td>
                <td class="p-3">{{ $category->name }}</td>

                <td class="p-3 flex gap-2">

                    <a href="/admin/categories/{{ $category->id }}/edit"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Düzenle
                    </a>

                    <form method="POST"
                          action="/admin/categories/{{ $category->id }}">
                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-500 text-white px-3 py-1 rounded">
                            Sil
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>