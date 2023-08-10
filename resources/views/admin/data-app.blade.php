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
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    @if (session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('errors') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
    <div class="section-header ">
        <h1>Data Identitas Web </h1>
    </div>

    <div class="card card-danger ">
        {{-- <div class="card-header">
            <a href="#addData" data-toggle="modal" data-target="#addUkuranModal"
                class="btn btn-icon icon-left btn-primary"><i class="fas fa-pen-alt"></i> Add Data</a>
        </div> --}}
        <div class="card-body">
            <form id="form_data_app" action="{{ route('identitas-app.store') }}" enctype="multipart/form-data"
                method="POST">
                @csrf
                <div class="form-group">
                    <label>Tentang</label>
                    <textarea id="about_us" name="about_us" class="form-control froala" placeholder="Tentang">{{ $data->about_us ?? "" }}</textarea>
                </div>

                <div class="form-group">
                    <label>Visi</label>
                    <textarea id="visi" name="visi" class="form-control froala">{{ $data->visi ?? "" }}</textarea>
                </div>

                <div class="form-group">
                    <label>Misi</label>
                    <textarea id="misi" name="misi" class="form-control froala">{{ $data->misi ?? "" }}</textarea>
                </div>
                <div class="form-group">
                    <label for="upload-image" class="font-weight-bold">Gambar Sebelumnya</label>
                    <div class="previous-image-container">
                        <img src={{ (isset($data->image) ? asset($data->image) : '')  }} class="img-fluid rounded" id="previous_image" alt="previous Image"
                            style="display:block;">
                        <p class="text-muted" id="no-previous-text" style="display:none;">No previous image
                            available</p>
                    </div>
                    <label for="upload-image" class="font-weight-bold">Upload Image</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="upload-image" accept="image/*"
                                name="image_about_us" onchange="previewImageEdit(event)" >
                            <label class="custom-file-label" for="upload-image">Choose file</label>
                        </div>
                    </div>

                    <div class="preview-image-container">
                        <img src="#" class="img-fluid rounded" id="preview-image-edit" alt="Preview Image"
                            style="display:none;">
                        <p class="text-muted" id="no-preview-text-edit" style="display:block;">No preview available
                        </p>
                    </div>
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
        function previewImageEdit(event) {
            var preview = document.getElementById("preview-image-edit");
            var noPreviewText = document.getElementById("no-preview-text-edit");
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.style.display = "block";
            noPreviewText.style.display = "none";
        }
        // $('#form_data_app').submit(function(e) {
        //     e.preventDefault();
        //     var arr_params = {
        //         url: $('#form_data_app').attr('action'),
        //         method: 'POST',
        //         input: $('#form_data_app').serialize(),
        //         table: "kosong",
        //         // forms: $('#form_data_app')[0].reset(),
        //         // modal: $('#addUkuranModal').modal('hide'),
        //     }
        //     ajaxSaveDatas(arr_params)
        //     //  table.ajax.reload()
        // })
    </script>
@endsection
