@extends('form')
@section('title')
    Data Produk Image
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('modal')
    <!-- Modal Add Data Image -->
    <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_add_Image" action="{{ route('product-images.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addImageModalLabel">Tambah Data Produk Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Produk</label>
                            <select class="js-example-basic-multiple" name="product_id">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="upload-image" class="font-weight-bold">Upload Image</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="upload-image" accept="image/*"
                                        name="product_image" onchange="previewImage(event)" required>
                                    <label class="custom-file-label" for="upload-image">Choose file</label>
                                </div>
                            </div>
                            <div class="preview-image-container">
                                <img src="#" class="img-fluid rounded" id="preview-image" alt="Preview Image"
                                    style="display:none;">
                                <p class="text-muted" id="no-preview-text" style="display:block;">No preview available</p>
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Data Image -->
    <div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_edit_Image" action="{{ route('homepage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT')}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="editImageModalLabel">Edit Data Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Produk</label>
                            <select class="js-example-basic-multiple" name="product_id" id="id_product_edit">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="upload-image" class="font-weight-bold">Gambar Sebelumnya</label>
                            <div class="previous-image-container">
                                <img src="#" class="img-fluid rounded" id="previous_image" alt="previous Image"
                                    style="display:none;">
                                <p class="text-muted" id="no-previous-text" style="display:block;">No previous image
                                    available</p>
                            </div>
                            <label for="upload-image" class="font-weight-bold">Upload Image</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="upload-image" accept="image/*"
                                        name="product_image" onchange="previewImageEdit(event)" required>
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

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Produk Image Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="#" id="modalImage" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="section">
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
            <h1>Data Produk Image </h1>
        </div>
        <div class="card card-danger ">
            <div class="card-header">
                <a href="#addData" data-toggle="modal" data-target="#addImageModal"
                    class="btn btn-icon icon-left btn-primary"><i class="fas fa-pen-alt"></i> Add Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead class="">
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Produk</th>
                                <th>Image</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        function previewImage(event) {
            var preview = document.getElementById("preview-image");
            var noPreviewText = document.getElementById("no-preview-text");
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.style.display = "block";
            noPreviewText.style.display = "none";
        }
        function previewImageEdit(event) {
            var preview = document.getElementById("preview-image-edit");
            var noPreviewText = document.getElementById("no-preview-text-edit");
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.style.display = "block";
            noPreviewText.style.display = "none";
        }
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                width: 'resolve',
                theme: "classic"
            });
            const dataColumns = [{
                    data: 'id'
                },
                {
                    data: 'product.name'
                },
                {
                    data: 'images'
                },
                {
                    data: 'id'
                },
            ];
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('get.pi') }}",
                columns: dataColumns,
                defColumn: [{
                        targets: [3],
                        data: 'id',
                        render: function(data, type, full, meta) {
                            return `<div class="row w-100">
                           <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-warning btn-sm text-white w-50 mr-1"
                                 href="#editData" data-toggle="modal" data-target="#editImageModal" data-id=${data}
                                 data-product_id="${full.product_id}" data-image="${full.images}"
                                 title="Edit"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger btn-sm text-white w-50 ml-1"
                                 href="#deleteData" data-delete-url="/product-images/${data}" 
                                 onclick="return deleteConfirm(this,'delete')"
                                 title="Delete"><i class="fas fa-trash"></i></a>
                           </div>
                     </div>`
                        },
                    },
                    {
                        targets: [2],
                        data: 'images',
                        render: function(data, type, full, meta) {
                            // console.log(data);
                            return `<a href="#" id="showImagebtn${full.id}" data-tooltip="${window.location.origin + '/' + data}" data-toggle="modal" data-target="#imageModal"><img src="${window.location.origin + '/' + data}" class="img-thumbnail"></a>`;
                        }
                    },
                ]
            }
            loadAjaxDataTables(arrayParams);
            table.on('xhr', function() {
                jsonTables = table.ajax.json();
                // console.log( jsonTables.data[350]["id"] +' row(s) were loaded' );
            });

            $('#editImageModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);
                console.log(button.data('image'))
                var idData = button.data('id');
                // console.log(window.location.origin + '/' + button.data("image"))
                var previous = document.getElementById("previous_image");
                var noPreviousText = document.getElementById("no-previous-text");
                previous.src = window.location.origin + '/' + button.data("image");
                previous.style.display = "block";
                noPreviousText.style.display = "none";
                // $('#previous_image').attr('src', window.location.origin + '/' + button.data("image"))

                $('#id_product_edit').val(button.data('product_id')).trigger('change')
                $('#form_edit_Image').attr('action', 'product-images/' + idData)



            })
        })
    </script>
    <script>
        $.ajax({
            url: "{{ route('get.pi') }}",
            success: function(data) {
                // games = data.data;
                $.each(data.data, function(index, value) {
                    $(document).on('click', `#showImagebtn${value.id}`, function(e) {
                        $('#modalImage').attr('src', $(this).data('tooltip'));
                    });
                })
            }
        })
        // $('#form_add_Image').submit(function(e) {
        //     e.preventDefault();
        //     // Get the CSRF token value from the meta tag in your HTML
        //     var csrfToken = $('meta[name="csrf-token"]').attr('content');

        //     // Set the CSRF token in the headers of all Ajax requests
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': csrfToken
        //         }
        //     });

        //     var formData = new FormData(this);
        //     var arr_params = {
        //         url: $('#form_add_Image').attr('action'),
        //         method: 'POST',
        //         input: formData,
        //         forms: $('#form_add_Image')[0].reset(),
        //         modal: $('#addImageModal').modal('hide'),
        //     }
        //     ajaxSaveDatas(arr_params)
        //     //  table.ajax.reload()
        // })

        // $('#form_edit_Image').submit(function(e) {
        //     e.preventDefault();
        //     var arr_params = {
        //         url: $('#form_edit_Image').attr('action'),
        //         method: 'PUT',
        //         input: $('#form_edit_Image').serialize(),
        //         forms: $('#form_edit_Image')[0].reset(),
        //         modal: $('#editImageModal').modal('hide'),
        //     }
        //     ajaxSaveDatas(arr_params)
        //     //  table.ajax.reload()
        // });
    </script>
@endsection
