@extends('form')
@section('title')
    Data Ukuran Produk
@endsection

@section('modal')
    <!-- Modal Add Data Ukuran -->
    <div class="modal fade" id="addUkuranModal" tabindex="-1" aria-labelledby="addUkuranModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_add_ukuran" action="{{ route('sizes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUkuranModalLabel">Tambah Data Ukuran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Ukuran</label>
                            <input type="text" name="size" class="form-control" required>
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
                <form id="form_edit_Ukuran" action="{{ route('/') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" id="ukuran_edit" name="size" class="form-control" required>
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
@endsection
@section('content')
    <div class="section-header ">
        <h1>Data Ukuran </h1>
    </div>
    <div class="card card-danger ">
        <div class="card-header">
            <a href="#addData" data-toggle="modal" data-target="#addUkuranModal"
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
                            <th>Ukuran</th>
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const dataColumns = [{
                    data: 'id'
                },
                {
                    data: 'size'
                },
                {
                    data: 'id'
                },
            ];
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('get.size') }}",
                columns: dataColumns,
                defColumn: [{
                    targets: [2],
                    data: 'id',
                    render: function(data, type, full, meta) {
                        return `<div class="row w-100">
                           <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-warning btn-sm text-white w-50 mr-1"
                                 href="#editData" data-toggle="modal" data-target="#editUkuranModal" data-id=${data} data-ukuran="${full.size}"
                                 title="Edit"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger btn-sm text-white w-50 ml-1"
                                 href="#deleteData" data-delete-url="/sizes/${data}" 
                                 onclick="return deleteConfirm(this,'delete')"
                                 title="Delete"><i class="fas fa-trash"></i></a>
                           </div>
                     </div>`
                    },
                }]
            }
            loadAjaxDataTables(arrayParams);
            table.on('xhr', function() {
                jsonTables = table.ajax.json();
                // console.log( jsonTables.data[350]["id"] +' row(s) were loaded' );
            });

            $('#editUkuranModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);

                var results = [];
                var idData = button.data('id');
                
                // $('#id_edit').val(idData)
                $('#ukuran_edit').val(button.data('ukuran'))
                $('#form_edit_Ukuran').attr('action', 'sizes/' + idData)


            })
        })
    </script>
    <script>
        $('#form_add_ukuran').submit(function(e) {
            e.preventDefault();
            var arr_params = {
                url: $('#form_add_ukuran').attr('action'),
                method: 'POST',
                input: $('#form_add_ukuran').serialize(),
                forms: $('#form_add_ukuran')[0].reset(),
                modal: $('#addUkuranModal').modal('hide'),
            }
            ajaxSaveDatas(arr_params)
            //  table.ajax.reload()
        })

        $('#form_edit_Ukuran').submit(function(e) {
            e.preventDefault();
            var arr_params = {
                url: $('#form_edit_Ukuran').attr('action'),
                method: 'PUT',
                input: $('#form_edit_Ukuran').serialize(),
                forms: $('#form_edit_Ukuran')[0].reset(),
                modal: $('#editUkuranModal').modal('hide'),
            }
            ajaxSaveDatas(arr_params)
            //  table.ajax.reload()
        })
    </script>
@endsection
