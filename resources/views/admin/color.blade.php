@extends('form')
@section('title')
    Data Warna Produk
@endsection

@section('modal')
    <!-- Modal Add Data Warna -->
    <div class="modal fade" id="addWarnaModal" tabindex="-1" aria-labelledby="addWarnaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_add_warna" action="{{ route('colors.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addWarnaModalLabel">Tambah Data Warna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>HEX Code</label>
                            <input type="color" name="hex_color" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" name="color" class="form-control" required>
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
    <div class="modal fade" id="editWarnaModal" tabindex="-1" aria-labelledby="editWarnaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_edit_Warna" action="{{ route('homepage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editWarnaModalLabel">Edit Data Warna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>HEX Code</label>
                            <input type="color" name="hex_color" class="form-control" id="hex_edit" required>
                        </div>

                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" id="color_edit" name="color" class="form-control" required>
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
        <h1>Data Warna </h1>
    </div>
    <div class="card card-danger ">
        <div class="card-header">
            <a href="#addData" data-toggle="modal" data-target="#addWarnaModal"
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
                            <th>HEX</th>
                            <th>Warna</th>
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
                    data: 'hex_color'
                },
                {
                    data: 'color'
                },
                {
                    data: 'id'
                },
            ];
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('get.color') }}",
                columns: dataColumns,
                defColumn: [{
                    targets: [3],
                    data: 'id',
                    render: function(data, type, full, meta) {
                        return `<div class="row w-100">
                           <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-warning btn-sm text-white w-50 mr-1"
                                 href="#editData" data-toggle="modal" data-target="#editWarnaModal" data-id=${data}
                                 data-hex="${full.hex_color}" data-color="${full.color}"
                                 title="Edit"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger btn-sm text-white w-50 ml-1"
                                 href="#deleteData" data-delete-url="/colors/${data}" 
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

            $('#editWarnaModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);

                var idData = button.data('id');
                $('#hex_edit').val(button.data('hex'))
                $('#color_edit').val(button.data('color'))
                $('#form_edit_Warna').attr('action', 'colors/' + idData)
                
            })
        })
    </script>
    <script>
        $('#form_add_warna').submit(function(e) {
            e.preventDefault();
            console.log($('#form_add_warna').serialize());
            var arr_params = {
                url: $('#form_add_warna').attr('action'),
                method: 'POST',
                input: $('#form_add_warna').serialize(),
                forms: $('#form_add_warna')[0].reset(),
                modal: $('#addWarnaModal').modal('hide'),
            }
            ajaxSaveDatas(arr_params)
            //  table.ajax.reload()
        })

        $('#form_edit_Warna').submit(function(e) {
            e.preventDefault();
            var arr_params = {
                url: $('#form_edit_Warna').attr('action'),
                method: 'PUT',
                input: $('#form_edit_Warna').serialize(),
                forms: $('#form_edit_Warna')[0].reset(),
                modal: $('#editWarnaModal').modal('hide'),
            }
            ajaxSaveDatas(arr_params)
            //  table.ajax.reload()
        })
    </script>
@endsection
