@extends('layout.v2.desa')
@section('title','Formulir '.$pelayanan->pelayanan)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('desa-home')}}">Beranda</a></li>
    <li class="breadcrumb-item"><a href="{{route('desa-formulir')}}">Formulir</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$pelayanan->pelayanan}}</li>
@endsection
@section('content')
<div class="card-group">
    @foreach ($sublayanan->where('id_pelayanan',"$pelayanan->id") as $sublayanan)
    <div class="card">
        <div class="card-header">
            Pelayanan
        </div>
        <div class="card-body">
        <center>
            <h4 class="card-title">{{$sublayanan->subpelayanan}}</h4>
            <br><br>
            <a href="#{{$sublayanan->slug}}" data-toggle="modal" class="btn btn-info btn-sm">Informasi</a>
            <a href="{{route('formSublayanan-desa',[$pelayanan->slug,$sublayanan->slug])}}" class="btn btn-success btn-sm">Formulir</a>
        </center>
        </div>
    </div>
    <div id="{{$sublayanan->slug}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <h4 class="modal-title">Informasi {{$pelayanan->pelayanan}} ({{$sublayanan->subpelayanan}})</h4><br>
                        {!!$pelayanan->keterangan!!}
                        {!!$sublayanan->keterangan!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection