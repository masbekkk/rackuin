@extends('form')
@section('title')
    Data Angket Jawaban "Ya" Terbanyak Tingkat kelas
@endsection

@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb transparent">
            <select class="form-control" id="select_tingkat">
                <option selected value=7>Kelas 7</option>
                <option value=8>Kelas 8</option>
                <option value=9>Kelas 9</option>
            </select>
        </div>
    </div>
    <div class="card card-danger ">
        {{-- <div class="card-header"> --}}
        {{-- <div class="p-2">
                <div class="font-pgp-dasboard">
                    Data Angket Jawaban "Ya" Terbanyak Tingkat kelas <text class="tingkat"></text>
                </div>
            </div> --}}
        {{-- <div class="ml-auto p-2"><img width="18.19px" height="4.06px"
                    src="http://localhost/hub-arkatama/public/css-hub-2/icon/Combined-Shape.svg"></div>
        </div> --}}
        <div class="card-body">
            <div id="bar_chart"></div>
        </div>

        <div class="card-footer"></div>
    </div>
    </div>
@endsection

@section('script')
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/no-data-to-display.js"></script>

    <script>
        var chart;

        function barChart(jml_data, angket) {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'bar_chart',
                    type: 'column',
                    // marginLeft: 150
                },
                title: {
                    text: 'Data Angket Jawaban "Ya" Terbanyak',
                    fontFamily: 'Poppins',
                },
                xAxis: {
                    //   categories: [
                    //       'Orientasi pada kegiatan sekolah yang bisa digunakan untuk mengisi waktu senggang.',
                    //       'Orientasi pada koperasi dan kantin sekolah.',
                    //       'Saya memiliki masalah dengan teman berkaitan dengan pilihan ekstra kurikuler yang saya ambil.',
                    //       'Informasi tentang kesehatan reproduksi remaja.',
                    //       'Orientasi tentang pekerjaan yang berkaitan dengan kesehatan yang mendukung cita-cita saya.',
                    //       'Orientasi pada kegiatan ekstrakurikuler yang menunjang belajar saya.',
                    //       'Orientasi pada sarana multimedia yang ada di sekolah.',
                    //       'Orientasi dengan keanggotaan komite sekolah.',
                    //       'Orientasi pada kegiatan solidaritas yang menjadi program sekolah.',
                    //       'Orientasi dengan teman dalam satu kelas.'
                    //   ],
                    categories: angket,
                    title: {
                        text: null
                    },
                    scrollbar: {
                        enabled: true
                    },
                },
                yAxis: {
                    min: 0,
                    title: {
                        // text: 'request / sec',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    },
                    scrollbar: {
                        enabled: true
                    },
                },
                tooltip: {
                    // valueSuffix: ' req / sec'
                },
                plotOptions: {
                    columns: {
                        colorByPoint: true,
                        dataLabels: {
                            enabled: true
                        },
                        colors: Highcharts.map(new Array(10), function() {
                            return '#' + Math.floor(Math.random() * 16777215).toString(16);
                        }),

                        // color: function() {
                        //     return '#' + Math.floor(Math.random() * 16777215).toString(16);
                        // }
                        // color: Highcharts.getOptions().colors[Math.floor(Math.random() * Highcharts.getOptions()
                        //     .colors.length)]
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 80,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                scrollbar: {
                    barBackgroundColor: 'gray',
                    barBorderRadius: 7,
                    barBorderWidth: 0,
                    buttonBackgroundColor: 'gray',
                    buttonBorderWidth: 0,
                    buttonArrowColor: 'yellow',
                    buttonBorderRadius: 7,
                    rifleColor: 'yellow',
                    trackBackgroundColor: 'white',
                    trackBorderWidth: 1,
                    trackBorderColor: 'silver',
                    trackBorderRadius: 7
                },
                series: [{
                    name: 'Jumlah Jawaban "Ya" ',
                    data: jml_data,
                    color: '#147410',
                    //   colors: ['#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4', '#50B432', '#8DFF0A', '#FF0000']
                    //   color: '#147410',
                    //   data: [2, 2, 1, 1, 1, 1, 1, 1, 1, 1],

                }],
                colors: ['#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#00FFFF', '#FF00FF', '#C0C0C0', '#808080',
                    '#800000', '#808000'
                ] // set a list of colors to be used for the columns
            });

        }
        // $('#select_tingkat').val('7').change()
        $(document).ready(function() {
            /* $('.table-1').DataTable(
              ); */
            $('.tingkat').text(7)
            $.ajax({
                url: "/dashboard/ajax/" + 7,
                method: 'GET',
                dataType: 'json',
                error: function(error) {
                    barChart([0], ["Kosong"])
                    chart.setTitle({
                        text: 'Data Angket Jawaban "Ya" Terbanyak Tingkat Kelas 7'
                    });
                },
                success: function(response) {
                    /*  alert(response.jml)               */
                    barChart(response.jml, response.isi_angket)
                    chart.setTitle({
                        text: 'Data Angket Jawaban "Ya" Terbanyak Tingkat Kelas 7'
                    });
                }

            })
            $('#select_tingkat').change(function(e) {
                var tingkat = $(this).val();
                $('.tingkat').text(tingkat)
                $.ajax({
                    url: "/dashboard/ajax/" + tingkat,
                    method: 'GET',
                    dataType: 'json',
                    error: function(error) {
                        barChart([0], ["Kosong"])
                        chart.setTitle({
                            text: 'Data Angket Jawaban "Ya" Terbanyak Tingkat Kelas ' +
                                tingkat
                        });
                    },
                    success: function(response) {
                        /*  alert(response.jml)               */
                        barChart(response.jml, response.isi_angket)
                        chart.setTitle({
                            text: 'Data Angket Jawaban "Ya" Terbanyak Tingkat Kelas ' +
                                tingkat
                        });
                    }

                })
            })


        })
    </script>
@endsection
