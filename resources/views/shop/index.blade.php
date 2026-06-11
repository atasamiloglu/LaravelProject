<!DOCTYPE html>
<html>
<head>
    <title>Technowest</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">


<div class="bg-black text-white p-4 flex justify-between items-center">

    <h1 class="text-xl font-bold">🛍 Technowest </h1>

    
    <form method="GET" action="/shop" class="flex gap-2 ml-auto mr-8">
    <input type="text" name="search" placeholder="Ürün ara..." class="px-2 py-1 text-black rounded">
    <button class="bg-blue-500 px-3 py-1 rounded">Ara</button>
</form>

    
    <div class="flex gap-4 items-center">

        <a href="/shop">🛍️ Alışveriş Sayfası</a>
        <a href="/cart">🛒 Sepetime Git</a>

        @guest
            <a href="/login" class="bg-gray-700 px-3 py-1 rounded">Login</a>
            <a href="/register" class="bg-blue-500 px-3 py-1 rounded">Register</a>
        @endguest

        @auth
            <span class="bg-green-600 px-3 py-1 rounded">
                👤 {{ auth()->user()->name }}
            </span>

            <form method="POST" action="/logout">
                @csrf
                <button class="bg-red-500 px-3 py-1 rounded">
                    Çıkış Yap
                </button>
            </form>
        @endauth

    </div>

</div>


<div class="p-6">

<form method="GET" action="/shop" class="mb-4">

    <select name="category" class="border p-2">
        <option value="">Tüm Kategoriler</option>       <!-- category filter updated -->

        @foreach(\App\Models\Category::all() as $cat)
            <option value="{{ $cat->id }}">
                {{ $cat->name }}
            </option>
        @endforeach

    </select>

    <button class="bg-blue-500 text-white px-3 py-1 rounded">
        Filtrele
    </button>

</form>

    <h2 class="text-2xl font-bold mb-6">Ürünler</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach($products as $product)

        <div class="bg-white p-4 rounded shadow">

            <img src="{{ $product->image }}"
                 class="h-40 w-full object-cover rounded mb-3">

            <h3 class="text-lg font-bold">{{ $product->name }}</h3>

            <p class="text-gray-600">{{ $product->price }} TL</p>

            <p class="text-sm text-gray-400">Stok: {{ $product->stock }}</p>

            <button onclick="addToCart({{ $product->id }})"
        class="bg-blue-500 text-white px-3 py-1 rounded">
    Sepete Ekle
</button>

        </div>

        @endforeach

    </div>

</div>

<div id="toast"
     class="hidden fixed bottom-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow">
</div>

<script>
function addToCart(id) {

    fetch('/cart/add/' + id)
        .then(res => res.json())
        .then(data => {

            const toast = document.getElementById('toast');
            toast.innerText = data.message;
            toast.classList.remove('hidden');

            setTimeout(() => {
                toast.classList.add('hidden');
            }, 2000);

        });
}
</script>

</body>
</html>