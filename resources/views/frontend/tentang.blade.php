@extends('layouts.frontend')

@section('content')
    <style>
        section {
            padding: 40px 0;
            text-align: center;
        }

        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .section-content {
            max-width: 1100px;
            margin: 0 auto;
        }

        .card {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .card img {
            max-width: 100%;
            height: auto;
        }
    </style>

    <header class="bg-black py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">About Us</h1>
            </div>
        </div>
    </header>

    <section>
        <div class="section-content">
            <div class="card">
                <div style="display: flex;">
                    <img src="{{ (isset($data->image) ? asset($data->image) : '') }}" alt="About Us Image" style="flex: 1;">
                    <div style="flex: 2; padding-left: 20px;">
                        <p>{!! $data->about_us ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-content">
            <div class="card">
                <h3>Visi</h3>
                <p>{!! $data->visi ?? '' !!}</p>
            </div>
            <div class="card">
                <h3>Misi</h3>
                {!! $data->misi ?? '' !!}
                {{-- <ul>
        <li>Menghadirkan produk berkualitas tinggi kepada pelanggan kami.</li>
        <li>Memberikan pelayanan terbaik dan pengalaman yang unggul.</li>
        <li>Mendorong inovasi dan pengembangan berkelanjutan.</li>
        <li>Menjadi mitra yang dapat diandalkan bagi komunitas kami.</li>
      </ul> --}}
            </div>
        </div>
    </section>
@endsection
