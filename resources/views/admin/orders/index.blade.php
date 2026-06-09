<!DOCTYPE html>
<html>
<head>
    <title>Siparişler</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <h1 class="text-2xl font-bold mb-4">Siparişler</h1>

    @foreach($orders as $order)

        <div class="bg-white p-4 rounded shadow mb-4">

            <h2 class="font-bold">
                Sipariş #{{ $order->id }}
            </h2>

            <p>Kullanıcı ID: {{ $order->user_id }}</p>
            <p>Toplam: {{ $order->total }} TL</p>

            <h3 class="mt-2 font-semibold">Ürünler:</h3>

            <ul class="list-disc ml-5">
                @foreach($order->items as $item)
                    <li>
                        {{ $item->product->name }}
                        ({{ $item->quantity }} adet)
                    </li>
                @endforeach
            </ul>

        </div>

    @endforeach

</body>
</html>