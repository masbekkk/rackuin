@extends('form')
@section('title')
    Data User Downloaded Catalog
@endsection

@section('content')
    <div class="section-header ">
        <h1>Data User Downloaded Catalog </h1>
    </div>
    <div class="card card-danger ">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead class="">
                        <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="card-footer"></div> --}}
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const dataColumns = [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'phone_number'
                },
                {
                    data: 'id'
                },
            ];
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('ajax.show.download.catalog') }}",
                columns: dataColumns,
                defColumn: [{
                    targets: [4],
                    data: 'id',
                    render: function(data, type, full, meta) {
                        return `
                              <a class="btn btn-danger btn-sm text-white w-50 ml-1"
                                 href="#deleteData" data-delete-url="/user-downloaded-katalog/${data}" 
                                 onclick="return deleteConfirm(this,'delete')"
                                 title="Delete"><i class="fas fa-trash"></i></a>
                          `
                    },
                }]

            }
            loadAjaxDataTables(arrayParams);
            table.on('xhr', function() {
                jsonTables = table.ajax.json();
                // console.log( jsonTables.data[350]["id"] +' row(s) were loaded' );
            });

        })
    </script>
@endsection
