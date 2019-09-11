@extends('layout.v2.kecamatan')
@section('title',"Pengaturan Layanan")
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('kecamatan/v2/')}}">Beranda</a></li>
<li class="breadcrumb-item active" aria-current="page">Pengaturan Layanan</li>
@endsection
@section('content')
<div class="table-responsive">
    <table id="akunAdmin" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pelayanan</th>
                <th>Atur</th>
            </tr>
        </thead>
    </table>
</div>
@endsection
@section('css')
<link href="{{url('adminbite/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('js')
<script src="{{url('adminbite/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
$('#akunAdmin').DataTable({
    "processing"    :true,
    "serverSide"    :true,
    "ajax"          : "{{url('api/pelayananlistV2')}}",
    "columns"       :[
        {"data" : "id"},
        {"data" : "pelayanan"},
        {"data" : "action","orderable": false, "searchable": false}

    ]
});

</script>
@endsection