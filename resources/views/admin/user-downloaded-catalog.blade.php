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
            ];
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('ajax.show.download.catalog') }}",
                columns: dataColumns,
               
            }
            loadAjaxDataTables(arrayParams);
            table.on('xhr', function() {
                jsonTables = table.ajax.json();
                // console.log( jsonTables.data[350]["id"] +' row(s) were loaded' );
            });

        })
    </script>

@endsection
