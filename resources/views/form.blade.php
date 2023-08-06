<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/rackuin.png')}}" />
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css?ver=1.1"
        type="text/css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <!-- Font awesome v5 css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css?ver=1.1" type="text/css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}?ver=1.1" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/components.css') }}?ver=1.1" type="text/css">
    <!-- fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fira+Sans:ital,wght@1,500&family=Kanit:wght@500&family=Oswald:wght@500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- css datatables --}}
    <!-- Table Style -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <style>
        thead input {
            width: 100%;
        }

        #table-1 {
            width: 100%;
            min-width: 100%;
        }

        #table-1 thead {
            width: 100%;
            min-width: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .select {
            width: 100%;
        }
    </style>

    <!-- Page Specific CSS File -->
    @yield('style')
</head>

<body>
    @yield('modal')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto ">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars burger-icon-navbar"></i></a></li>
                        <li><a href="{{ route('homepage') }}" class="nav-link nav-link-lg ">
                                <div class="judul-navbar active">Rakuin</div>
                            </a></li>
                    </ul>

                </form>
                <ul class="navbar-nav navbar-right align-items-center">

                    <li class="dropdown align-items-center  mr-2">
                        <a href="#" data-toggle="dropdown" style="color:black;"
                            class="nav-link  nav-link-lg nav-link-user d-flex align-items-center ">
                            <div class="gap-username d-sm-none d-lg-inline-block text-black-50 w-100 mr-3">
                                <div class="font-username ">
                                    Hai, {{ Auth::user()->name }}
                                </div>
                                {{-- <figcaption><small class="font-username-sub"><?= $this->session->userdata('level') ?></small> </figcaption> --}}
                            </div>
                            <i class="fas fa-chevron-down fa-fw fa-sm "></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt">
                                </i> Logout

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>

                </ul>
            </nav>

            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/" class="text-white">RAKUIN</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/" class="text-white">RAK</a>
                    </div>
                    <ul class="sidebar-menu">

                        <li class="menu-header">Data Produk</li>
                        <li class="{{ Route::is('products.index') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('products.index') }}"><i class="fas fa-layer-group"></i><span>
                                    Produk</span></a></li>
                        <li class="{{ Route::is('sizes.index') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('sizes.index') }}"><i class="far fa-window-maximize"></i><span>
                                    Ukuran</span></a></li>
                        <li class="{{ Route::is('colors.index') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('colors.index') }}"><i class="fas fa-palette"></i> <span>
                                    Warna</span></a></li>
                        <li class="{{ Route::is('category.index') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('category.index') }}"><i class="fas fa-th-list"></i> <span>
                                    Kategori</span></a></li>
                        <li class="{{ Route::is('product-categories.index') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('product-categories.index') }}"><i class="fas fa-sitemap"></i><span>
                                    Produk Kategori</span></a></li>
                        <li class="{{ Route::is('product-images.index') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('product-images.index') }}"><i class="far fa-images"></i><span>
                                    Produk Image</span></a></li>

                        <li class="menu-header">Data Testimoni</li>
                        <li class="{{ Route::is('testimoni.index') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('testimoni.index') }}"><i class="fas fa-database"></i><span>
                                    Testimoni</span></a></li>
                        <li class="menu-header">Data Identitas Web</li>
                        <li class="{{ Route::is('identitas-app.index') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('identitas-app.index') }}"><i class="fas fa-database"></i><span>
                                    Data</span></a></li>


                    </ul>
                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">

                    </div>

                </aside>
            </div>
        </div>

        <div class="main-content">
            <section class="section" style="min-height: 531px;">

                @yield('content')
            </section>
        </div>

        <footer class="main-footer">
            <div class="footer-left">
                Made With ♥ by <a href="https://www.instagram.com/berkahbekhan.inc/"><text>Mohammad Subkhan
                        @berkahbekhan.inc</text></a>
            </div>
            <div class="footer-right">
                <script>
                    document.write(new Date().getFullYear())
                </script>
            </div>
        </footer>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ asset('js/stisla.js') }}"></script>

<!-- sweetalert js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Template JS File -->
<script src="{{ asset('/js/scripts.js') }}"></script>
<script src="{{ asset('/js/custom.js') }}"></script>

{{-- js datatables --}}
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

<script>
    var table, jsonTables;
    // {{-- function load datatables  --}}
    function loadAjaxDataTables(params) {
        // Setup - add a text input to each footer cell

        $(params.idTable + ' thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo(params.idTable + ' thead');

        table = $(params.idTable).DataTable({
            // orderCellsTop: true,
            fixedHeader: true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            processing: true,
            // scrollX: true,
            // pagingType: 'numbers',
            // serverSide: true,
            initComplete: function() {
                var api = this.api();
                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" placeholder="' + title + '" />');

                        // On every keypress in this input
                        $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                            .off('keyup change')
                            .on('change', function(e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr =
                                    '({search})'; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value + ')))') :
                                        '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function(e) {
                                e.stopPropagation();

                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
            ajax: params.urlAjax,
            columns: params.columns,
            columnDefs: params.defColumn,
        });

        $('#form_filter').submit(function(e) {
            e.preventDefault();
            var tingkat = $('#tingkat').val();
            var kelas = $('#kelas').val();
            var url = '/ajax-rekap/poin-disiplin/' + tingkat + '/' + kelas;
            table.ajax.url(url).load();
        })

    }

    // console.log(table);
    // ajax store data


    function ajaxSaveDatas(params) {
        // var csrfToken = $('meta[name="csrf-token"]').attr('content');
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': csrfToken
        //     }
        // });
        $.ajax({
            url: params.url,
            method: params.method,
            async: true,
            // dataType: 'json',
            data: params.input,
            // processData: false,
            // contentType: false,
            beforeSend: function(xhr) {
                Swal.fire({
                    title: 'Sedang menyimpan data...',
                    html: 'Mohon ditunggu!',
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                })
            },
            success: function(data) {
                if(params.table == null)
                table.ajax.reload();
                
                Swal.close()
                Swal.fire({
                    icon: 'success',
                    title: 'Yayy!',
                    text: data.message,
                })
                params.forms
                params.modal
            },
            error: function(xhr) {
                Swal.close()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ada kesalahan dalam menyimpan data. Coba lagi!',
                })
                console.log(xhr.statusText + xhr.responseText)
            }
        });
    }

    function deleteConfirm(event, params = null) {
        Swal.fire({
            title: 'Konfirmasi Hapus Data!',
            text: 'Yakin ingin menghapus data?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
            confirmButtonColor: 'red'
        }).then(dialog => {
            var method = 'GET',
                valueHeaders = '';
            if (params != null) {
                method = params;
                valueHeaders = {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                };
            }
            if (dialog.isConfirmed) {
                // window.location.assign(event.dataset.deleteUrl);
                $.ajax({
                    headers: valueHeaders,
                    url: event.dataset.deleteUrl,
                    type: method,
                    dataType: "JSON",
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ada kesalahan dalam menghapus data. Coba lagi!',
                        })
                        console.log(xhr.statusText + xhr.responseText)
                    },
                    success: function(data) {
                        table.ajax.reload()
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        });
                    }
                });
            }
        })

    }
</script>
<!-- Page Specific JS File -->
@yield('script')

</html>
