<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $product = Product::all();
        return view('admin.product_images', [
            'products' => $product,
        ]);
    }

    public function getProductImages()
    {
        $data = ProductImages::with('product')->get();

        return response()->json(['data' => $data], 200);
    }

    public function store(Request $request)
    {
        $pi = new ProductImages();
        $pi->product_id = $request->product_id;

        $product_image = $request->file('product_image');
        if (!empty($product_image)) {
            $product_imageName = time() . '.' . $product_image->extension();
            $product_image->move(public_path('assets/product_image'), $product_imageName);
            $pi->images = 'assets/product_image/' . $product_imageName;
        }
        if($pi->save())
        return redirect()->route('product-images.index')->with('success', 'Data Produk Image Berhasil Ditambahkan!');
        else return redirect()->route('product-images.index')->with('errors', $pi->getErrors());
        // return response()->json(['message' => 'Data Produk Image Berhasil Ditambahkan!'], 200);
    }

    public function update($id, Request $request)
    {
        // dd("ok");
        $pi = ProductImages::findOrFail($id);
        $pi->product_id = $request->product_id;
      
        $product_image = $request->file('product_image');
        if (!empty($product_image)) {
            $product_imageName = time() . '.' . $product_image->extension();
            $product_image->move(public_path('assets/product_image'), $product_imageName);
            $oldProductImage = $pi->images;
            if (File::exists(public_path($oldProductImage))) {
                File::delete(public_path($oldProductImage));
            }
            $pi->images = 'assets/product_image/' . $product_imageName;
        }
        if($pi->save())
        return redirect()->route('product-images.index')->with('success', 'Data Produk Image Berhasil Ditambahkan!');
        else return redirect()->route('product-images.index')->with('errors', $pi->getErrors());
        // return response()->json(['message' => 'Data Produk Image Berhasil Ditambahkan!'], 200);
    }

    public function destroy($id)
    {
        $data = ProductImages::findOrFail($id);

        if (File::exists(public_path($data->images))) {
            File::delete(public_path($data->images));
        }
        $data->delete();
        return response()->json(['message' => 'Data Produk Image Berhasil Dihapus!'], 200);
    }
}
