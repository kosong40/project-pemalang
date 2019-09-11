@extends('layout.v2.kecamatan')
@section('title',"Pelayanan $pelayanan")
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('kecamatan/v2/')}}">Beranda</a></li>
<li class="breadcrumb-item"><a href="{{url('kecamatan/v2/data-layanan')}}">Data Layanan</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$pelayanan}}</li>
@endsection
@section('content')
@if($cek == 0)
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
@else
<div class="row">
    @foreach($sublayanan as $item)
    <div class="col-sm-12 col-lg-3">
        <div class="card bg-light">
            <div class="card-body">
                <h4 class="card-title">{{$item->subpelayanan}}</h4>
                <table class="table no-border mini-table m-t-20">
                    <tbody>
                        <tr>
                            <td class="text-muted">Total</td>
                            <td class="font-medium">{{count($pemohon->where('sublayanan_id',$item->id))}}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Siap Dicetak</td>
                            <td class="font-medium">
                                {{count($pemohon->where('sublayanan_id',$item->id)->where('status','Setuju'))}}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Sudah ada No SK</td>
                            <td class="font-medium">
                                {{count($pemohon->where('sublayanan_id',$item->id)->where('status','Sudah ada nomor SK'))}}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">Belum ada No SK</td>
                            <td class="font-medium">
                                {{count($pemohon->where('sublayanan_id',$item->id)->where('status','Belum'))}}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Revisi Berkas</td>
                            <td class="font-medium">
                                {{count($pemohon->where('sublayanan_id',$item->id)->where('status','Revisi'))}}</td>
                        </tr>
                    </tbody>
                </table>
                <p align="center"><a class="btn btn-info"
                        href="{{url('kecamatan/v2/data-layanan/'.$slug.'/'.$item->slug)}}">Detail <i
                            class="ti-arrow-right"></i></a></p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
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
    "ajax"          : "{{route('api-pelayanan',$slug)}}",
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