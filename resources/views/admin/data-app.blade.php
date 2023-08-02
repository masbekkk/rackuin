@extends('form')
@section('title')
    Data Identitas Web
@endsection

@section('style')
    <!-- Include Froala Editor  style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet"
        type="text/css" />
@endsection

@section('content')
    <div class="section-header ">
        <h1>Data Identitas Web </h1>
    </div>

    <div class="card card-danger ">
        {{-- <div class="card-header">
            <a href="#addData" data-toggle="modal" data-target="#addUkuranModal"
                class="btn btn-icon icon-left btn-primary"><i class="fas fa-pen-alt"></i> Add Data</a>
        </div> --}}
        <div class="card-body">
            <form id="form_data_app" action="{{ route('identitas-app.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tentang</label>
                    <textarea id="about_us" name="about_us" class="form-control froala" placeholder="Tentang">{{$data->about_us}}</textarea>
                </div>

                <div class="form-group">
                    <label>Visi</label>
                    <textarea id="visi" name="visi" class="form-control froala">{{ $data->visi }}</textarea>
                </div>

                <div class="form-group">
                    <label>Misi</label>
                    <textarea id="misi" name="misi" class="form-control froala">{{ $data->misi }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Simpan/ Perbarui</button>
                </div>
            </form>
        </div>

        <div class="card-footer"></div>

    </div>
@endsection

@section('script')
    <!-- Include Froala Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js">
    </script>

    <!-- Initialize the editor. -->
    <script>
        new FroalaEditor('.froala', {
            // placeholderText: 'Tentang'
        });
        // new FroalaEditor('visi', {
        //     placeholderText: 'Visi'
        // });

        $('#form_data_app').submit(function(e) {
            e.preventDefault();
            var arr_params = {
                url: $('#form_data_app').attr('action'),
                method: 'POST',
                input: $('#form_data_app').serialize(),
                table: "kosong",
                // forms: $('#form_data_app')[0].reset(),
                // modal: $('#addUkuranModal').modal('hide'),
            }
            ajaxSaveDatas(arr_params)
            //  table.ajax.reload()
        })
    </script>
@endsection
