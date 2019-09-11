@extends('layout.v2.desa')
@section('title',"Data Pemohon $pelayanan->pelayanan")
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('desa-home')}}">Beranda</a></li>
<li class="breadcrumb-item"><a href="{{url('desa/v2/data-pemohon')}}"> Data Pemohon</a></li>
<li class="breadcrumb-item"><a href="{{url('desa/v2/data-pemohon/'.$pelayanan->slug)}}">{{$pelayanan->pelayanan}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$sublayanan->subpelayanan}}</li>
@endsection
@section('content')
<div class="table-responsive">
    <table id="pelayanan" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No. Surat Keputusan</th>
                <th>Nama Pemohon</th>
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
    "processing"    :true,
    "serverSide"    :true,
    "ajax"          : "{{route('api-pelayanan-desa-sub',[$pelayanan->slug,$slug,session('daerah')])}}",
    "columns"       :[
            {"data" : "DT_RowIndex"},
            {"data" : "no_sk"},
            {"data" : "nama"},
            {'data' : 'status'},
            {'data' : 'created_at'},
            {"data" : "action","orderable": false, "searchable": false}
    ]
});

</script>
@endsection