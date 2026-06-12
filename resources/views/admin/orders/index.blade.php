<!DOCTYPE html>
<html>
<head>
    <title>Siparişler</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <div class="max-w-6xl mx-auto p-6">

        
         <h1 class="text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            📦 Sipariş Yönetimi
             <span class="text-sm bg-blue-100 text-blue-700 px-2 py-1 rounded-full">
                Admin Panel
             </span>
        </h1>

        
        <div class="space-y-6">

            @foreach($orders as $order)

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition">
                    
                    <div class="bg-gradient-to-r from-blue-50 to-gray-100 px-5 py-3 flex justify-between items-center">                        <div>
                            <h2 class="font-semibold text-gray-800">
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-md text-sm font-semibold">
                              Sipariş #{{ $order->id }}
                            </span>
                            </h2>
                            <p class="text-sm text-gray-500">
                                Kullanıcı ID: {{ $order->user_id }}
                            </p>
                        </div>

                        <div class="text-right">
                            <span class="text-xl font-bold text-green-600">
                                {{ $order->total }} TL
                            </span>
                            <p class="text-xs text-gray-500">Toplam Tutar</p>
                        </div>
                    </div>

                    
                    <div class="p-5">

                        <h3 class="font-semibold text-gray-700 mb-3">
                            Ürünler
                        </h3>

                        <ul class="space-y-2">
                            @foreach($order->items as $item)

                                <li class="flex justify-between bg-gray-50 p-3 rounded-lg hover:bg-gray-100 transition">                                    
                                    <span class="font-semibold text-gray-800">                                        {{ $item->product->name }}
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