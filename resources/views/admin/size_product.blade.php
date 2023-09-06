@extends('form')
@section('title')
    Data Produk Ukuran
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('modal')
    <!-- Modal Add Data Ukuran Produk -->
    <div class="modal fade" id="addSPModal" tabindex="-1" aria-labelledby="addSPModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_add_SP" action="{{ route('size-product.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSPModalLabel">Tambah Data Produk Ukuran</h5>
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
                            <label>Ukuran</label>
                            <select class="js-example-basic-multiple" name="size_id">
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="price" class="form-control">

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

    <!-- Modal Edit Data PC -->
    <div class="modal fade" id="editSPModal" tabindex="-1" aria-labelledby="editSPModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_edit_SP" action="{{ route('homepage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSPModalLabel">Edit Data PC</h5>
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
                            <label>Ukuran</label>
                            <select class="js-example-basic-multiple" name="size_id" id="id_size_edit">
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="price" class="form-control" id="price_edit">

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
        <h1>Data Produk Ukuran </h1>
    </div>
    <div class="card card-danger ">
        <div class="card-header">
            <a href="#addData" data-toggle="modal" data-target="#addSPModal" class="btn btn-icon icon-left btn-primary"><i
                    class="fas fa-pen-alt"></i> Add Data</a>
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
                            <th>Ukuran</th>
                            <th>Harga</th>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
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
                    data: 'size.size'
                },
                {
                    data: 'price'
                },
                {
                    data: 'id'
                },
            ];
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('get.sp') }}",
                columns: dataColumns,
                defColumn: [{
                    targets: [4],
                    data: 'id',
                    render: function(data, type, full, meta) {
                        return `<div class="row w-100">
                           <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-warning btn-sm text-white w-50 mr-1"
                                 href="#editData" data-toggle="modal" data-target="#editSPModal" data-id=${data}
                                 data-id_product="${full.product_id}" data-id_size="${full.size_id}" data-price="${full.price}"
                                 title="Edit"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger btn-sm text-white w-50 ml-1"
                                 href="#deleteData" data-delete-url="/size-product/${data}" 
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

            $('#editSPModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);

                var idData = button.data('id');
                $('#id_product_edit').val(button.data('id_product')).trigger('change')
                $('#id_size_edit').val(button.data('id_size')).trigger('change')
                
                $('#price_edit').val(button.data('price'))
                $('#form_edit_SP').attr('action', 'size-product/' + idData)
            })
        })
    </script>
    <script>
        $('#form_add_SP').submit(function(e) {
            e.preventDefault();
            var arr_params = {
                url: $('#form_add_SP').attr('action'),
                method: 'POST',
                input: $('#form_add_SP').serialize(),
                forms: $('#form_add_SP')[0].reset(),
                modal: $('#addSPModal').modal('hide'),
            }
            ajaxSaveDatas(arr_params)
            //  table.ajax.reload()
        })

        $('#form_edit_SP').submit(function(e) {
            e.preventDefault();
            var arr_params = {
                url: $('#form_edit_SP').attr('action'),
                method: 'PUT',
                input: $('#form_edit_SP').serialize(),
                forms: $('#form_edit_SP')[0].reset(),
                modal: $('#editSPModal').modal('hide'),
            }
            ajaxSaveDatas(arr_params)
            //  table.ajax.reload()
        })
    </script>
@endsection
