@extends('layout.v2.kecamatan')
@section('title',"Pengaturan Layanan $sublayanan->subpelayanan")
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('kecamatan/v2/')}}">Beranda</a></li>
<li class="breadcrumb-item"><a href="{{url('kecamatan/v2/pengaturan-layanan')}}">Pengaturan Layanan</a></li>
<li class="breadcrumb-item"><a
        href="{{url('kecamatan/v2/pengaturan-layanan/'.$pelayanan->slug)}}">{{$pelayanan->pelayanan}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$sublayanan->subpelayanan}}</li>
@endsection
@section('content')
@if (session('sukses'))
<div class="alert alert-success">
    <p style="margin:0" class="text-center">{{session('sukses')}}</p>
</div>
@endif

<div>
    <button id="on" data-meta="Hallo">Ubah Informasi</button>
    <button id="off">Batal</button>
</div>
<form action="{{route('ubahInfoSub',[$pelayanan->slug,$sublayanan->slug])}}" method="post" id="form">
    @csrf
    <textarea name="keterangan" id="editor1">
        {!!$sublayanan->keterangan!!}
        </textarea>
    <button id="btnSave" type="submit" class="btn btn-default form-control">Simpan</button>
</form>
<div class="card" id="info">
    <div class="card-body">
        <h3 class="text-center">Informasi Pelayanan {{$pelayanan->pelayanan}} ({{$sublayanan->subpelayanan}})</h3>
        <hr>
        {!!$pelayanan->keterangan!!}
        <br>
        {!!$sublayanan->keterangan!!}
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css"
    href="{{url('adminbite/assets/libs/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('adminbite/assets/libs/ckeditor/samples/css/samples.css')}}">
@endsection
@section('js')
<script src="{{url('adminbite/assets/libs/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('adminbite/assets/libs/ckeditor/samples/js/sample.js')}}"></script>
<script>
    CKEDITOR.replace('editor1');
$(function(){
    $("#form").hide(true)
    $("#info").show(true)
    $("#on").click(function(){
        $("#form").show(true)
        $("#info").hide(true)
    });
    $("#off").click(function(){
        $("#form").hide(true)
        $("#info").show(true)
    });

})
</script>
@endsection