<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $size = Size::all();
        $color = Color::all();

        return view('admin.products', [
            'sizes' => $size,
            'colors' => $color
        ]);
    }

    public function getProducts()
    {
        $product = Product::all();

        return response()->json(['data' => $product], 200);
    }

    public function store(Request $request)
    {
        $product = new Product();
        // dd($request->description);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sizes = (is_array($request->sizes) ? implode(',', $request->sizes) : $request->sizes);
        $product->colors = (is_array($request->colors) ? implode(',', $request->colors) : $request->colors);
        $product->save();

        return response()->json(['message' => 'Data Produk Berhasil Ditambahkan!'], 200);

    }

    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);
        // dd($request->description);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sizes = (is_array($request->sizes) ? implode(',', $request->sizes) : $request->sizes);
        $product->colors = (is_array($request->colors) ? implode(',', $request->colors) : $request->colors);
        $product->save();

        return response()->json(['message' => 'Data Produk Berhasil Diperbarui!'], 200);

    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return response()->json(['message' => 'Data Produk Berhasil Dihapus!'], 200);
    }
}
