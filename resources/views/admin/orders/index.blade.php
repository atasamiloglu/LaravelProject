<!DOCTYPE html>
<html>
<head>
    <title>Siparişler</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <div class="max-w-6xl mx-auto p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">📦 Sipariş Yönetimi</h1>
        </div>

        <!-- Orders -->
        <div class="space-y-6">

            @foreach($orders as $order)

                <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">

                    <!-- Order Header -->
                    <div class="bg-gray-100 px-5 py-3 flex justify-between items-center">
                        <div>
                            <h2 class="font-semibold text-gray-800">
                                Sipariş #{{ $order->id }}
                            </h2>
                            <p class="text-sm text-gray-500">
                                Kullanıcı ID: {{ $order->user_id }}
                            </p>
                        </div>

                        <div class="text-right">
                            <span class="text-lg font-bold text-green-600">
                                {{ $order->total }} TL
                            </span>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="p-5">

                        <h3 class="font-semibold text-gray-700 mb-3">
                            Ürünler
                        </h3>

                        <ul class="space-y-2">
                            @foreach($order->items as $item)

                                <li class="flex justify-between bg-gray-50 p-3 rounded-lg">
                                    
                                    <span class="font-medium text-gray-700">
                                        {{ $item->product->name }}
                                    </span>

                                    <span class="text-gray-500">
                                        {{ $item->quantity }} adet
                                    </span>

                                </li>

                            @endforeach
                        </ul>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</body>
</html>