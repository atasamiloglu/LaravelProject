<!DOCTYPE html>
<html>
<head>
    <title>Kategori Düzenle</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="bg-black text-white p-4">
    <h1 class="text-xl font-bold">🛠 Admin Panel</h1>
</div>

<div class="flex justify-center mt-10">

    <div class="bg-white p-8 rounded shadow w-full max-w-lg">

        <h2 class="text-2xl font-bold mb-6 text-center">
            ✏️ Kategori Düzenle
        </h2>

        <form method="POST"
              action="/admin/categories/{{ $category->id }}">
            @csrf
            @method('PUT')

            <input
                name="name"
                value="{{ $category->name }}"
                class="w-full border p-2 rounded mb-4"
            >

            <button
                class="w-full bg-green-500 text-white py-2 rounded">
                Güncelle
            </button>

        </form>

    </div>

</div>

</body>
</html>