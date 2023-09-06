<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\SizesProduct;
use Illuminate\Http\Request;

class SizesProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sizes = Size::all();
        $product = Product::all();
        return view('admin.size_product', [
            'sizes' => $sizes,
            'products' => $product,
        ]);
    }

    public function getSizesProduct()
    {
        $data = SizesProduct::with('product', 'size')->get();

        return response()->json(['data' => $data], 200);
    }

    public function store(Request $request)
    {
        $sp = new SizesProduct();
        $sp->product_id = $request->product_id;
        $sp->size_id = $request->size_id;
        $sp->price = $request->price;
        $sp->save();

        return response()->json(['message' => 'Data Produk Ukuran Berhasil Ditambahkan!'], 200);
    }

    public function update($id, Request $request)
    {
        $sp = SizesProduct::findOrFail($id);
        $sp->product_id = $request->product_id;
        $sp->size_id = $request->size_id;
        $sp->price = $request->price;
        $sp->save();

        return response()->json(['message' => 'Data Produk Ukuran Berhasil Diperbarui!'], 200);
    }

    public function destroy($id)
    {
        SizesProduct::findOrFail($id)->delete();
        return response()->json(['message' => 'Data Produk Ukuran Berhasil Dihapus!'], 200);
    }
}
