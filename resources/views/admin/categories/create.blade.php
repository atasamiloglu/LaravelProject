<!DOCTYPE html>
<html>
<head>
    <title>Kategori Ekle</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="bg-black text-white p-4">
    <h1 class="text-xl font-bold">🛠 Admin Panel</h1>
</div>

<div class="flex justify-center mt-10">

    <div class="bg-white p-8 rounded shadow w-full max-w-lg">

        <h2 class="text-2xl font-bold mb-6 text-center">
            ➕ Kategori Ekle
        </h2>

        <form method="POST" action="/admin/categories">
            @csrf

            <input
                name="name"
                placeholder="Kategori adı"
                class="w-full border p-2 rounded mb-4"
            >

            <button
                class="w-full bg-blue-500 text-white py-2 rounded">
                Kaydet
            </button>

        </form>

    </div>

</div>

</body>
</html>