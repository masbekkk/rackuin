<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductImages;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $images = ProductImages::all();
        $testimonies = Testimoni::all();
        return view('frontend.homepage', [
            'images' => $images,
            'testimonies' => $testimonies,
        ]);
    }

    public function tentang()
    {
        return view('frontend.tentang');
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        $colors = explode(',', $product->colors);
        // dd($colors);
        return view('frontend.detail', [
            'product' => $product,
            'colors' => $colors,

        ]);
    }

    public function produk()
    {
        $products = Product::with('productImage')->get();
        $categories = Categories::all();
        // with('product')
        // ->groupBy('product_id')
        // ->get(['product_id']);
        // dd($products);
        return view('frontend.produk', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }


    public function produkCategories($idCategory)
    {
        $pc = ProductCategories::where('category_id', $idCategory)->with('product', 'category')->get();
        $namaCategory = Categories::findOrFail($idCategory);
        $categories = Categories::all();
        // with('product')
        // ->groupBy('product_id')
        // ->get(['product_id']);
        // dd($pc);
        return view('frontend.produk-kategori', [
            'pc' => $pc,
            'categories' => $categories,
            'category_name' => $namaCategory->category,
        ]);
    }

    public function berita()
    {
        return view('frontend.berita');
    }

    public function kategori1()
    {
        return view('frontend.kategori1');
    }

    public function kategori2()
    {
        return view('frontend.kategori2');
    }

    public function kategori3()
    {
        return view('frontend.kategori3');
    }
}
