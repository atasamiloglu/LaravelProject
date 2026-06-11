<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

<div class="max-w-6xl mx-auto p-6">

    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        🧾 Checkout
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        
        <div class="lg:col-span-2 space-y-4">

            @foreach($cart as $id => $item)

                <div class="bg-white p-4 rounded-xl shadow flex justify-between items-center">

                    <div>
                        <h2 class="font-semibold text-gray-800">
                            {{ $item['name'] }}
                        </h2>

                        <p class="text-sm text-gray-500">
                            {{ $item['quantity'] }} adet x {{ $item['price'] }} ₺
                        </p>
                    </div>

                    <div class="font-bold text-gray-800">
                        {{ $item['quantity'] * $item['price'] }} ₺
                    </div>

                </div>

            @endforeach

        </div>

        
        <div class="bg-white p-6 rounded-xl shadow h-fit">

            <h2 class="text-xl font-bold text-gray-800 mb-4">
                Sipariş Özeti
            </h2>

            @php
                $total = 0;
                foreach($cart as $item){
                    $total += $item['price'] * $item['quantity'];
                }
            @endphp

            <div class="space-y-2 text-gray-700">

                <div class="flex justify-between">
                    <span>Ara Toplam</span>
                    <span>{{ $total }} ₺</span>
                </div>

                <div class="flex justify-between">
                    <span>Kargo</span>
                    <span class="text-green-600">Ücretsiz</span>
                </div>

                <div class="border-t pt-2 mt-2 flex justify-between font-bold text-lg">
                    <span>Toplam</span>
                    <span>{{ $total }} ₺</span>
                </div>

            </div>

            
            <form method="POST" action="{{ route('checkout.store') }}" class="mt-6">
                @csrf

                <button class="w-full bg-black text-white py-3 rounded-lg hover:bg-gray-800 transition">
                    Siparişi Tamamla
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>