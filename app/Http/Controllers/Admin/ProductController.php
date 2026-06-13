<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    
    public function index()
{
    $products = Product::all();
    return view('admin.products.index', compact('products'));
}
    
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
            Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image'       => $request->image,
            'category_id' => $request->category_id,
        ]);

        return redirect('/admin/products');
    }

    
    public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();

    return view('admin.products.edit', compact('product', 'categories'));
}

    
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
        'name'        => $request->name,
        'price'       => $request->price,
        'stock'       => $request->stock,
        'image'       => $request->image,
        'category_id' => $request->category_id,
    ]);

        return redirect('/admin/products');
    }

    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/admin/products');
    }
}