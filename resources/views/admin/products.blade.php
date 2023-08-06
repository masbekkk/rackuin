@extends('form')
@section('title')
    Data Produk
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('modal')
    <!-- Modal Add Data Produk -->
    <div class="modal fade" id="addProdukModal" tabindex="-1" aria-labelledby="addProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_add_produk" action="{{ route('products.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProdukModalLabel">Tambah Data Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Produk</label>
                            <input type="text" name="description" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Harga Produk</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Ukuran Produk</label>
                            <select class="js-example-basic-multiple" name="sizes[]" multiple="multiple">
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->size }}">{{ $size->size }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Warna Produk</label>
                            <select class="js-example-basic-multiple" name="colors[]" multiple="multiple">
                                @foreach ($colors as $color)
                                    <option value="{{ $color->hex_color }}">{{ $color->color }}</option>
                                @endforeach

                            </select>

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

    <!-- Modal Edit Data Produk -->
    <div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="editProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_edit_Produk" action="{{ route('homepage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id_edit">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProdukModalLabel">Edit Data Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" id="name_edit" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Produk</label>
                            <input type="text" id="description_edit" name="description" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Harga Produk</label>
                            <input type="number" id="price_edit" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Ukuran Produk</label>
                            <select class="js-example-basic-multiple" name="sizes[]" multiple="multiple" id="size_edit">
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->size }}">{{ $size->size }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            <label>Warna Produk</label>
                            <select class="js-example-basic-multiple" name="colors[]" multiple="multiple" id="color_edit">
                                @foreach ($colors as $color)
                                    <option value="{{ $color->hex_color }}">{{ $color->color }}</option>
                                @endforeach

                            </select>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Perbarui Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="section-header ">
        <h1>Data Produk </h1>
    </div>
    <div class="card card-danger ">
        <div class="card-header">
            <a href="#addProdukDidik" data-toggle="modal" data-target="#addProdukModal"
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
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Ukuran</th>
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
                    data: 'name'
                },
                {
                    data: 'description'
                },
                {
                    data: 'price'
                },
                {
                    data: 'sizes'
                },
                {
                    data: 'colors'
                },
                {
                    data: 'id'
                },
            ];
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('get.products') }}",
                columns: dataColumns,
                defColumn: [{
                    targets: [6],
                    data: 'id',
                    render: function(data, type, full, meta) {
                        return `<div class="row w-100">
                           <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-warning btn-sm text-white w-50 mr-1"
                                 href="#editData" data-toggle="modal" data-target="#editProdukModal" data-id=${data}
                                 data-sizes="${full.sizes}" data-colors="${full.colors}" data-price="${full.price}" data-description="${full.description}" data-name="${full.name}"
                                 title="Edit"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger btn-sm text-white w-50 ml-1"
                                 href="#deleteData" data-delete-url="/products/${data}" 
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

            $('#editProdukModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);

                // var results = []; 
                var idData = button.data('id');
                console.log(button.data('sizes'))
                var selectedSize = [button.data('sizes')];
                var selectedSizes = selectedSize[0].split(',');
                console.log(selectedSizes)
                $('#size_edit').val(selectedSizes).trigger('change');

                var selectedColor = [button.data('colors')];
                var selectedColors = selectedColor[0].split(',');
                console.log(selectedColors)
                $('#color_edit').val(selectedColors).trigger('change');

                $('#name_edit').val(button.data('name'))
                $('#description_edit').val(button.data('description'))
                $('#price_edit').val(button.data('price'))

                $('#form_edit_Produk').attr('action', 'products/' + idData)

            })
        })
    </script>
    <script>
        $('#form_add_produk').submit(function(e) {
            e.preventDefault();
            // console.log($(this).serialize());
            var arr_params = {
                url: $('#form_add_produk').attr('action'),
                method: 'POST',
                input: $('#form_add_produk').serialize(),
                forms: $('#form_add_produk')[0].reset(),
                modal: $('#addProdukModal').modal('hide'),
            }
            ajaxSaveDatas(arr_params)
            //  table.ajax.reload()
        })

        $('#form_edit_Produk').submit(function(e) {
            e.preventDefault();
            var arr_params = {
                url: $('#form_edit_Produk').attr('action'),
                method: 'PUT',
                input: $('#form_edit_Produk').serialize(),
                forms: $('#form_edit_Produk')[0].reset(),
                modal: $('#editProdukModal').modal('hide'),
            }
            ajaxSaveDatas(arr_params)
            //  table.ajax.reload()
        })
    </script>
@endsection
