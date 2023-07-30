<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
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
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sizes = implode(',', $request->sizes);
        $product->save();

        return response()->json(['message' => 'Data Produk Berhasil Ditambahkan!'], 200);

    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return response()->json(['message' => 'Data Produk Berhasil Dihapus!'], 200);
    }
}
