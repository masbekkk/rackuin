<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.homepage');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function detail()
    {
        return view('frontend.detail');
    }

    public function produk()
    {
        return view('frontend.produk');
    }

    public function berita()
    {
        return view('frontend.berita');
    } 
}
