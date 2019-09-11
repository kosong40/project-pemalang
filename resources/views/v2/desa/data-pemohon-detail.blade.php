@extends('layout.v2.desa')
@section('title',"Data Pemohon $pelayanan->pelayanan")
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('desa-home')}}">Beranda</a></li>
<li class="breadcrumb-item"><a href="{{url('desa/v2/data-pemohon')}}"> Data Pemohon</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$pelayanan->pelayanan}}</li>
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
                <h5 class="card-title text-center">{{$item->subpelayanan}}</h5>
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
                <p class="text-center"><a href="#{{$item->slug}}" data-toggle="modal" class="btn btn-info">Informasi &nbsp;<i class="ti-info-alt"></i></a></p>
               <p class="text-center"> <a href="{{route('formSublayanan-desa',[$pelayanan->slug,$item->slug])}}" class="btn btn-success">Formulir <i class="ti-pencil"></i></a></p>
                <p align="center"><a class="btn btn-warning" href="{{url('desa/v2/data-pemohon/'.$slug.'/'.$item->slug)}}">Data Pemohon 
                <i class="ti-file"></i></a></p>
            </div>
        </div>
    </div>
    <div id="{{$item->slug}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center modal-title">Informasi {{$pelayanan->pelayanan}} <br> ({{$item->subpelayanan}})</h4><br>
                            {!!$pelayanan->keterangan!!}
                            {!!$item->keterangan!!}
                        </div>
                    </div>
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
    "ajax"          : "{{route('api-pelayanan-desa',[$pelayanan->slug,session('daerah')])}}",
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