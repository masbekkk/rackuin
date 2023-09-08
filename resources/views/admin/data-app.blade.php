@extends('form')
@section('title')
    Data Identitas Web
@endsection

@section('style')
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
                    <label>Nama Perusahaan</label>
                    <input id="company_name" type="text" name="company_name" class="form-control"
                        value="{{ $data->company_name ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="upload-image" class="font-weight-bold">Logo Sebelumnya</label>
                    <div class="previous-logo-container">
                        <img src={{ isset($data->logo) ? asset($data->logo) : '' }} class="img-fluid rounded"
                            id="previous_logo" alt="previous logo" style="display:block;">
                        <p class="text-muted" id="no-previous-text" style="display:none;">No previous logo
                            available</p>
                    </div>
                    <label for="upload-logo" class="font-weight-bold">Upload logo</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="upload-logo" accept="logo/*" name="logo"
                                onchange="previewImageEdit(event, 'preview-logo-edit', 'no-preview-logo-text-edit')" required>
                            <label class="custom-file-label" for="upload-logo">Choose file</label>
                        </div>
                    </div>

                    <div class="preview-logo-container">
                        <img src="#" class="img-fluid rounded" id="preview-logo-edit" alt="Preview logo"
                            style="display:none;">
                        <p class="text-muted" id="no-preview-logo-text-edit" style="display:block;">No preview available
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tentang</label>
                    <textarea id="about_us" name="about_us" class="form-control froala" placeholder="Tentang">{{ $data->about_us ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label>Visi</label>
                    <textarea id="visi" name="visi" class="form-control froala">{{ $data->visi ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label>Misi</label>
                    <textarea id="misi" name="misi" class="form-control froala">{{ $data->misi ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="upload-image" class="font-weight-bold">Gambar Sebelumnya</label>
                    <div class="previous-image-container">
                        <img src={{ isset($data->image) ? asset($data->image) : '' }} class="img-fluid rounded"
                            id="previous_image" alt="previous Image" style="display:block;">
                        <p class="text-muted" id="no-previous-text" style="display:none;">No previous image
                            available</p>
                    </div>
                    <label for="upload-image" class="font-weight-bold">Upload Image</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="upload-image" accept="image/*"
                                name="image_about_us"
                                onchange="previewImageEdit(event, 'preview-image-edit', 'no-preview-text-edit')" required>
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
                    <label>Link Instagram</label>
                    <input id="link_ig" type="link" name="link_ig" class="form-control"
                        value="{{ $data->link_ig ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Link Facebook</label>
                    <input id="link_fb" type="link" name="link_fb" class="form-control"
                        value="{{ $data->link_fb ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Link WhatsApp</label>
                    <input id="link_wa" type="link" name="link_wa" class="form-control"
                        value="{{ $data->link_wa ?? '' }}">
                </div>

                <div class="form-group">

                    <div class="d-flex justify-content-between">
                        <label for="upload-image" class="font-weight-bold">Upload Katalog</label>
                        <a target="_blank" href="{{ asset($data->file_katalog ?? '') }}">File Sebelumnya</a>
                    </div>

                    <input type="file" name="file_katalog" class="form-control">
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
    <!-- Include TinyMCE Editor JS files. -->
    <script src="https://cdn.tiny.cloud/1/6yx53q4nbmpkwhsmiby7h6prz6nysqkgg79kwn6bvakgkn5u/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <!-- Initialize the editor. -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                "See docs to implement AI Assistant"))
        });

        // new FroalaEditor('visi', {
        //     placeholderText: 'Visi'
        // });
        function previewImageEdit(event, idImage, idText) {
            var preview = document.getElementById(idImage);
            var noPreviewText = document.getElementById(idText);
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
