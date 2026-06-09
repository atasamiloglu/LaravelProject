<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">


<div class="bg-black text-white p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">🛒 Sepetim</h1>

    <div class="flex gap-4">
        <a href="/shop">Shop</a>
        <a href="/cart">Cart</a>
    </div>
</div>


<div class="p-6">

    @if(empty($cart))
        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl">Sepet boş 😢</h2>
            <a href="/shop" class="text-blue-500 mt-2 inline-block">
                Alışverişe dön
            </a>
        </div>
    @else

        @php $total = 0; @endphp

        <div class="space-y-4">

            @foreach($cart as $id => $item)

                @php
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                @endphp

                <div class="bg-white p-4 rounded shadow flex justify-between items-center">

                    
                    <div class="flex items-center gap-4">

                        <img src="{{ $item['image'] }}"
                             class="w-20 h-20 object-cover rounded">

                        <div>
                            <h2 class="font-bold text-lg">
                                {{ $item['name'] }}
                            </h2>

                            <p class="text-gray-500">
                                {{ $item['price'] }} TL
                            </p>

                            
                            <div class="flex items-center gap-2 mt-2">

                                <a href="/cart/decrease/{{ $id }}"
                                   class="px-2 bg-gray-300 rounded">-</a>

                                <span class="font-bold">
                                    {{ $item['quantity'] }}
                                </span>

                                <a href="/cart/increase/{{ $id }}"
                                   class="px-2 bg-gray-300 rounded">+</a>

                            </div>
                        </div>

                    </div>

                    
                    <div class="text-right">

                        <p class="text-green-600 font-bold text-lg">
                            {{ $subtotal }} TL
                        </p>

                        <a href="/cart/remove/{{ $id }}"
                           class="text-red-500 text-sm mt-2 inline-block">
                            🗑 Sil
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

        
        <div class="mt-6 bg-white p-4 rounded shadow text-right">

            <h2 class="text-2xl font-bold">
                Toplam: {{ $total }} TL
            </h2>

           <a href="/checkout"
   class="inline-block mt-4 bg-green-500 text-white px-6 py-2 rounded">
    💳 Siparişi Tamamla
</a>

        </div>

    @endif

</div>

</body>
</html>