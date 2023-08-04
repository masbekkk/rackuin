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
