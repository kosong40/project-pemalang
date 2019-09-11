@extends('layout.v2.desa')
@section('title','Dashboard '.session('username'))
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
<div class="card-group">
    <!-- card group -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                    <span class="btn btn-circle btn-lg bg-danger">
                        <i class="icon-Calendar text-white"></i>
                    </span>
                </div>
                <div>
                    {{$hari .", ".date('d')." ". $bulan ." ".date('Y')." "}}<br><span class=" small-box-footer"
                        id="txt"></span>
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
                    <span class="btn btn-circle btn-lg bg-info">
                        <i class="icon-File text-white"></i>
                    </span>
                </div>
                <div>
                    Total Permohonan
                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{$totalPemohon}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h4 class="card-title">Data Masuk Berdasarkan Pelayanan</h4>
            </div>
        </div>
    <div id="data-pelayanan" style="height:425px"></div>
</div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
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
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h4 class="card-title">Daftar Revisi</h4>
                    </div>
                </div>
                    <div class="table-responsive">
                        <table id="RevisiData" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Pemohon</th>
                                    <th>Pelayanan</th>
                                    <th>Direvisi</th>
                                    <th>Lihat</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
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
<script src="{{url('adminbite/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
    $('#SiapCetak').DataTable({
    "processing"    :true,
    "serverSide"    :true,
    "scrollY"       : "279px",
    "scrollCollapse": true,
    "paging": false,
    "ajax"          : "{{route('getDataCetakDesa',session('daerah'))}}",
    "columns"       :[
            {"data" : "nama"},
            {"data" : "pelayanane"},
            {'data' : 'updated_at'},
            {"data" : "action","orderable": false, "searchable": false}
    ]
});
</script>
<script>
    $('#RevisiData').DataTable({
    "processing"    :true,
    "serverSide"    :true,
    "scrollY"       : "279px",
    "scrollCollapse": true,
    "paging": false,
    "ajax"          : "{{route('getDataRevisi',session('daerah'))}}",
    "columns"       :[
            {"data" : "nama"},
            {"data" : "pelayanane"},
            {'data' : 'updated_at'},
            {"data" : "action","orderable": false, "searchable": false}
    ]
});
</script>
<script src="{{url('adminbite/assets/libs/raphael/raphael.min.js')}}"></script>
<script src="{{url('adminbite/assets/libs/morris.js/morris.min.js')}}"></script>
<script>
        $(function() {
            'use strict';
            Morris.Bar({
                element: 'data-pelayanan',
                
                data: [
               @foreach($pelayanan as $pelayanan)
                    {
                        @if($pelayanan->pelayanan2 == null)
                            pelayanan:'{{$pelayanan->pelayanan1}}',
                            'data masuk' : {{count($pemohon->where('pelayanan_id',$pelayanan->id1))}},
                        @else
                            pelayanan:'{{$pelayanan->pelayanan2}}',
                            'data masuk' : {{count($pemohon->where('sublayanan_id',$pelayanan->id2))}},
                        @endif
                    },
                @endforeach
    
                ],
                xkey: 'pelayanan',
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
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Beranda</li>
@endsection
@section('css')
<link href="{{url('adminbite/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection