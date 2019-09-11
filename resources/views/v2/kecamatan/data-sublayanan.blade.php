@extends('layout.v2.kecamatan')
@section('title',"Pelayanan $sublayanan")
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('kecamatan/v2/')}}">Beranda</a></li>
<li class="breadcrumb-item"><a href="{{url('kecamatan/v2/data-layanan')}}">Data Layanan</a></li>
<li class="breadcrumb-item"><a
        href="{{url('kecamatan/v2/data-layanan/'.$pelayanan->slug)}}">{{$pelayanan->pelayanan}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$sublayanan}}</li>
@endsection
@section('content')
<div class="table-responsive">
    <table id="pelayanan" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No. Surat Keputusan</th>
                <th>Nama Pemohon</th>
                <th>Desa / Kelurahan</th>
                <th>Status</th>
                <th>Masuk</th>
                <th>Lainnya</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
@section('css')
<link href="{{url('adminbite/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('js')
<script src="{{url('adminbite/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
    $('#pelayanan').DataTable({
    "scrollY": "400px",
    "scrollCollapse": true,
    "paging": false,
    "processing"    :true,
    "serverSide"    :true,
    "ajax"          : "{{route('api-sublayanan',$slug)}}",
    "columns"       :[
            {"data" : "DT_RowIndex"},
            {"data" : "no_sk"},
            {"data" : "nama"},
            {"data" : "nama_daerah"},
            {'data' : 'status'},
            {'data' : 'created_at'},
            {"data" : "action","orderable": false, "searchable": false}
    ]
});

</script>
@endsection