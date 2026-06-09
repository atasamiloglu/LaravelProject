<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-3xl font-bold mb-6">
        💳 Ödeme Ekranı
    </h1>

    <form method="POST" action="/checkout">
        @csrf

        <input
            type="text"
            placeholder="Ad Soyad"
            class="w-full border p-3 rounded mb-3"
        >

        <input
            type="text"
            placeholder="Adres"
            class="w-full border p-3 rounded mb-3"
        >

       <input
            type="text"
            name="card_number"
            id="card_number"
            maxlength="19"
            placeholder="1234 5678 9012 3456"
            class="w-full border p-3 rounded mb-3"
        />

        <button
            class="w-full bg-green-500 text-white p-3 rounded">
            Siparişi Tamamla
        </button>

    </form>

</div>

<script>
const cardInput = document.getElementById('card_number');

cardInput.addEventListener('input', function (e) {

    let value = e.target.value;

    // just numbers
    value = value.replace(/\D/g, '');

    // split every 4 digits
    value = value.replace(/(.{4})/g, '$1 ');

    // delete trailing space
    value = value.trim();

    e.target.value = value;
});
</script>

</body>
</html>