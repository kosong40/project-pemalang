@extends('layout.v2.kecamatan')
@section('title','Dashboard Admin')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Beranda</li>
@endsection
@section('content')
@php
switch(date("m")){
    case '01':$bulan = "Januari";break;
    case '02':$bulan = "Februari";break;
    case '03':$bulan = "Maret";break;
    case '04':$bulan = "April";break;
    case '05':$bulan = "Mei";break;
    case '06':$bulan = "Juni";break;
    case '07':$bulan = "Juli";break;
    case '08':$bulan = "Agustus";break;
    case '09':$bulan = "Spetember";break;
    case '10':$bulan = "Oktober";break;
    case '11':$bulan = "November";break;
    case '12':$bulan = "Desember";break;
}
switch (date("l")) {
	case 'Wednesday':$hari = "Rabu";break;
	case 'Monday':$hari = "Senin";break;
	case 'Tuesday':$hari = "Selasa";break;
	case 'Thursday':$hari = "Kamis";break;
	case 'Friday':$hari = "Jumat";break;
	case 'Saturday':$hari = "Sabtu";break;
	case 'Sunday':$hari = "Minggu";break;
	default:$hari = date("l");break;
}
@endphp
    <div class="card-group"> <!-- card group -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg bg-success">
                            <i class="icon-Calendar text-white"></i>
                        </span>
                    </div>
                    <div>
                        {{$hari .", ".date('d')." ". $bulan ." ".date('Y')." "}}<br><span class=" small-box-footer" id="txt"></span>
                    </div>
                    <div class="ml-auto">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg bg-warning">
                            <i class="ti-clipboard text-white"></i>
                        </span>
                    </div>
                    <div>
                        Data Hari Ini
                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">{{$hari_ini}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg bg-danger">
                            <i class="ti-file text-white"></i>
                        </span>
                    </div>
                    <div>
                        Total Data Masuk
                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">{{$total}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg bg-info">
                            <i class="ti-user text-white"></i>
                        </span>
                    </div>
                    <div>
                        Pelayanan
                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">{{$pelayanan}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end card group-->
    <div class="row">
        <!-- Column -->
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h4 class="card-title">Jumlah Data Masuk 7 Hari Terakhir</h4>
                        </div>
                        <div class="ml-auto">
                            <ul class="list-inline font-12 dl m-r-10">
                                <li class="list-inline-item">
                                    <i class="fas fa-dot-circle text-info"></i> Data Masuk
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="data-masuk" style="height:425px"></div>
                </div>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h4 class="card-title">Data Masuk Terbaru</h4>
                        </div>
                    </div>
                        <div class="table-responsive">
                            <table id="pelayanan" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Pemohon</th>
                                        <th>Pelayanan</th>
                                        <th>Masuk</th>
                                        <th>Lihat</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h4 class="card-title">Data Siap Cetak</h4>
                            </div>
                        </div>
                            <div class="table-responsive">
                                <table id="SiapCetak" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Pemohon</th>
                                            <th>Pelayanan</th>
                                            <th>Disetujui</th>
                                            <th>Lihat</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h4 class="card-title">Data Masuk Berdasarkan Desa Kelurahan</h4>
                    </div>
                </div>
            <div id="data-desa" style="height:425px"></div>
        </div>
    </div>
@endsection
@section('css')
<link href="{{url('adminbite/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('js')
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
            h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>
    <!--chartjs -->
    <script src="{{url('adminbite/assets/libs/raphael/raphael.min.js')}}"></script>
    <script src="{{url('adminbite/assets/libs/morris.js/morris.min.js')}}"></script>
    {{-- script chart data masuk 7 hari --}}
    <script>
    $(function() {
        'use strict';
        Morris.Bar({
            element: 'data-masuk',
            
            data: [
            @for($i=-6;$i<1;$i++)
                {
                    period: '{{date("d-M-Y",strtotime("+$i day"))}}',
                    'data masuk' : {{Kustom::getData($i)}},
                },
            @endfor

            ],
            xkey: 'period',
            ykeys: ['data masuk'],
            labels: ['data masuk'],
            pointSize: 2,
            fillOpacity: 0,
            pointStrokeColors: ['#ccc', '#4798e8', '#9675ce'],
            behaveLikeLine: true,
            gridLineColor: '#e0e0e0',
            lineWidth: 2,
            hideHover: 'auto',
            lineColors: ['#ccc', '#4798e8', '#9675ce'],
            resize: true
        });
    });
    </script>
    <script>
    $(function(){
        Morris.Bar({
            element :'data-desa',
            data: [
            @foreach($daerah as $daerah)
                {
                    daerah: "{{$daerah->nama_daerah}}",
                    "total data" :{{count($dataPemohon->where('daerah_id',$daerah->id))}},
                },
            @endforeach

            ],
            xkey: 'daerah',
            ykeys: ['total data'],
            labels: ['total data'],
            pointSize: 2,
            fillOpacity: 0,
            pointStrokeColors: ['#ccc', '#4798e8', '#9675ce'],
            behaveLikeLine: true,
            gridLineColor: '#e0e0e0',
            lineWidth: 2,
            hideHover: 'auto',
            lineColors: ['#ccc', '#4798e8', '#9675ce'],
            resize: true
        });
    });
    </script>
    <script src="{{url('adminbite/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script>
    $('#pelayanan').DataTable({
        "processing"    :true,
        "serverSide"    :true,
        "scrollY"       : "279px",
        "scrollCollapse": true,
        "paging": false,
        "ajax"          : "{{route('getData')}}",
        "columns"       :[
                {"data" : "nama"},
                {"data" : "pelayanane"},
                {'data' : 'created_at'},
                {"data" : "action","orderable": false, "searchable": false}
        ]
    });
    </script>
    <script>
        $('#SiapCetak').DataTable({
        "processing"    :true,
        "serverSide"    :true,
        "scrollY"       : "279px",
        "scrollCollapse": true,
        "paging": false,
        "ajax"          : "{{route('getDataCetak')}}",
        "columns"       :[
                {"data" : "nama"},
                {"data" : "pelayanane"},
                {'data' : 'updated_at'},
                {"data" : "action","orderable": false, "searchable": false}
        ]
    });
    </script>
@endsection