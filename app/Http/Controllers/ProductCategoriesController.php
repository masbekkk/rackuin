<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\ProductCategories;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $category = Categories::all();
        $product = Product::all();
        return view('admin.product_categories', [
            'categories' => $category,
            'products' => $product,
        ]);
    }

    public function getProductCategories()
    {
        $data = ProductCategories::with('product', 'category')->get();

        return response()->json(['data' => $data], 200);
    }

    public function store(Request $request)
    {
        $pc = new ProductCategories();
        $pc->product_id = $request->product_id;
        $pc->category_id = $request->category_id;
        $pc->save();

        return response()->json(['message' => 'Data Produk Kategori Berhasil Ditambahkan!'], 200);
    }

    public function destroy($id)
    {
        ProductCategories::findOrFail($id)->delete();
        return response()->json(['message' => 'Data Produk Kategori Berhasil Dihapus!'], 200);
    }
}
