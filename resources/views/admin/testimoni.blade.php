@extends('form')
@section('title')
    Data Testimoni
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('modal')
    <!-- Modal Add Data Testimoni -->
    <div class="modal fade" id="addTestimoniModal" tabindex="-1" aria-labelledby="addTestimoniModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_add_Testimoni" action="{{ route('testimoni.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTestimoniModalLabel">Tambah Data Testimoni</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nama Testimoner</label>
                            <input type="text" name="name" placeholder="Nama Testimoner" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Isi Review (Opsional)</label>
                            <input type="text" name="review" placeholder="Isi Review (Opsional)" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="upload-Testimoni" class="font-weight-bold">Upload Bukti Testimoni</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="upload-Testimoni" accept="image/*"
                                        name="bukti_testimoni" onchange="previewTestimoni(event)">
                                    <label class="custom-file-label" for="upload-Testimoni">Choose file</label>
                                </div>
                            </div>
                            <div class="preview-Testimoni-container">
                                <img src="#" class="img-fluid rounded" id="preview-Testimoni" alt="Preview Testimoni"
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

    <!-- Modal Edit Data Angket -->
    <div class="modal fade" id="editUkuranModal" tabindex="-1" aria-labelledby="editUkuranModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_edit_ukuran" action="{{ route('/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUkuranModalLabel">Edit Data Ukuran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Ukuran</label>
                            <input type="text" id="ukuran_edit" name="ukuran" class="form-control" required>
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
    <!-- Testimoni Modal -->
    <div class="modal fade" id="TestimoniModal" tabindex="-1" role="dialog" aria-labelledby="TestimoniModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TestimoniModalLabel">Bukti Testimoni Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="#" id="modalTestimoni" class="img-fluid">
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
            <h1>Data Testimoni </h1>
        </div>
        <div class="card card-danger ">
            <div class="card-header">
                <a href="#addData" data-toggle="modal" data-target="#addTestimoniModal"
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
                                <th>Nama</th>
                                <th>Isi Review</th>
                                <th>Bukti Testimoni</th>
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
        function previewTestimoni(event) {
            var preview = document.getElementById("preview-Testimoni");
            var noPreviewText = document.getElementById("no-preview-text");
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
                    data: 'name'
                },
                {
                    data: 'review'
                },
                {
                    data: 'image'
                },
                {
                    data: 'id'
                },
            ];
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('get.testimoni') }}",
                columns: dataColumns,
                defColumn: [{
                        targets: [4],
                        data: 'id',
                        render: function(data, type, full, meta) {
                            return `<div class="row w-100">
                           <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-warning btn-sm text-white w-50 mr-1"
                                 href="#editData" data-toggle="modal" data-target="#editAngketModal" data-id=${data}
                                 title="Edit"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger btn-sm text-white w-50 ml-1"
                                 href="#deleteData" data-delete-url="/testimoni/${data}" 
                                 onclick="return deleteConfirm(this,'delete')"
                                 title="Delete"><i class="fas fa-trash"></i></a>
                           </div>
                     </div>`
                        },
                    },
                    {
                        targets: [3],
                        data: 'Testimonis',
                        render: function(data, type, full, meta) {
                            // console.log(data);
                            return `<a href="#" id="showTestimonibtn${full.id}" data-tooltip="${window.location.origin + '/' + data}" data-toggle="modal" data-target="#TestimoniModal"><img src="${window.location.origin + '/' + data}" class="img-thumbnail"></a>`;
                        }
                    },
                ]
            }
            loadAjaxDataTables(arrayParams);
            table.on('xhr', function() {
                jsonTables = table.ajax.json();
                // console.log( jsonTables.data[350]["id"] +' row(s) were loaded' );
            });

            $('#editAngketModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);

                var results = [];
                var idData = button.data('id');
                var searchField = "id_angkets";
                var searchVal = idData;
                for (var i = 0; i < jsonTables.data.length; i++) {
                    if (jsonTables.data[i][searchField] == searchVal) {
                        results.push(jsonTables.data[i]);
                    }
                }
                // console.log(results[0].nama);
                $('#id_edit').val(results[0].id_angkets)
                $('#angket_edit').val(results[0].angket)

            })
        })
    </script>
    <script>
        $.ajax({
            url: "{{ route('get.testimoni') }}",
            success: function(data) {
                // games = data.data;
                $.each(data.data, function(index, value) {
                    $(document).on('click', `#showTestimonibtn${value.id}`, function(e) {
                        $('#modalTestimoni').attr('src', $(this).data('tooltip'));
                    });
                })
            }
        })
        // $('#form_add_Testimoni').submit(function(e) {
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
        //         url: $('#form_add_Testimoni').attr('action'),
        //         method: 'POST',
        //         input: formData,
        //         forms: $('#form_add_Testimoni')[0].reset(),
        //         modal: $('#addTestimoniModal').modal('hide'),
        //     }
        //     ajaxSaveDatas(arr_params)
        //     //  table.ajax.reload()
        // })

        $('#form_edit_Angket').submit(function(e) {
            e.preventDefault();
            var arr_params = {
                url: $('#form_edit_Angket').attr('action'),
                method: 'PUT',
                input: $('#form_edit_Angket').serialize(),
                forms: $('#form_edit_Angket')[0].reset(),
                modal: $('#editAngketModal').modal('hide'),
            }
            ajaxSaveDatas(arr_params)
            //  table.ajax.reload()
        })
    </script>
@endsection
