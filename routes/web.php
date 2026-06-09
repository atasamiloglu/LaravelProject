<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;



Route::get('/', fn() => redirect('/shop'));

Route::get('/shop', function (Request $request) {

    $products = Product::query();

    if ($request->search) {
        $products->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->category) {
        $products->where('category_id', $request->category);
    }

    return view('shop.index', [
        'products' => $products->get()
    ]);

});



Route::get('/cart', function () {
    return view('cart.index', [
        'cart' => session()->get('cart', [])
    ]);
})->name('cart.index');

Route::get('/cart/add/{id}', function ($id) {

    $product = Product::findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $product->name,
            "price" => $product->price,
            "image" => $product->image,
            "quantity" => 1
        ];
    }

    session()->put('cart', $cart);

    return response()->json([
        'message' => 'Ürün sepete eklendi'
    ]);

});

Route::get('/cart/remove/{id}', function ($id) {

    $cart = session()->get('cart', []);

    unset($cart[$id]);

    session()->put('cart', $cart);

    return redirect()->back();

});

Route::get('/cart/increase/{id}', function ($id) {

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    }

    session()->put('cart', $cart);

    return redirect()->back();

});

Route::get('/cart/decrease/{id}', function ($id) {

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {

        $cart[$id]['quantity']--;

        if ($cart[$id]['quantity'] <= 0) {
            unset($cart[$id]);
        }
    }

    session()->put('cart', $cart);

    return redirect()->back();

});



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    

    Route::get('/checkout', function () {

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/cart');
        }

        return view('checkout.index', compact('cart'));

    })->name('checkout');

    Route::post('/checkout', function () {

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/cart');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = \App\Models\Order::create([
            'user_id' => auth()->id(),
            'total' => $total
        ]);

        foreach ($cart as $productId => $item) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        session()->forget('cart');

        return redirect('/shop')->with('success', 'Sipariş oluşturuldu!');

    })->name('checkout.store');

   

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', function () {

            if (auth()->user()->role !== 'admin') {
                abort(403);
            }

            return view('admin.dashboard');

        })->name('admin.dashboard');

        Route::get('/products', function () {

            if (auth()->user()->role !== 'admin') {
                abort(403);
            }

            return app(ProductController::class)->index();

        })->name('admin.products.index');

        Route::get('/products/create', function () {

            if (auth()->user()->role !== 'admin') {
                abort(403);
            }

            return app(ProductController::class)->create();

        });

        Route::post('/products', function (Request $request) {

            if (auth()->user()->role !== 'admin') {
                abort(403);
            }

            return app(ProductController::class)->store($request);

        });

        Route::get('/products/{id}/edit', function ($id) {

            if (auth()->user()->role !== 'admin') {
                abort(403);
            }

            return app(ProductController::class)->edit($id);

        });

        Route::put('/products/{id}', function (Request $request, $id) {

            if (auth()->user()->role !== 'admin') {
                abort(403);
            }

            return app(ProductController::class)->update($request, $id);

        });

        Route::delete('/products/{id}', function ($id) {

            if (auth()->user()->role !== 'admin') {
                abort(403);
            }

            return app(ProductController::class)->destroy($id);

        });

       

        Route::get('/orders', function () {

            if (auth()->user()->role !== 'admin') {
                abort(403);
            }

            $orders = \App\Models\Order::with('items.product')
                ->latest()
                ->get();

            return view('admin.orders.index', compact('orders'));

        });

    });

});

require __DIR__.'/auth.php';