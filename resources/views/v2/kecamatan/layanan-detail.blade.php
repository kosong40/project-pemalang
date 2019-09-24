@extends('layout.v2.kecamatan')
@section('title',"Pemohon kode $kode")
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('kecamatan/v2/data-layanan')}}">Data Layanan</a></li>
<li class="breadcrumb-item"><a href="{{url('kecamatan/v2/data-layanan/'.$layanan->slug)}}">{{$layanan->pelayanan}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$data->nama}}</li>
@endsection
@section('content')
@php
    $tanggal = $data->created_at;
    switch(date("m",strtotime($tanggal))){
        case '01':$m = "Januari";break;
        case '02':$m = "Februari";break;
        case '03':$m = "Maret";break;
        case '04':$m = "April";break;
        case '05':$m = "Mei";break;
        case '06':$m = "Juni";break;
        case '07':$m = "Juli";break;
        case '08':$m = "Agustus";break;
        case '09':$m = "Spetember";break;
        case '10':$m = "Oktober";break;
        case '11':$m = "November";break;
        case '12':$m = "Desember";break;
    }
        switch (date("l")) {
        case 'Wednesday':$hari = "Rabu, ";break;
        case 'Monday':$hari = "Senin, ";break;
        case 'Tuesday':$hari = "Selasa, ";break;
        case 'Thursday':$hari = "Kamis, ";break;
        case 'Friday':$hari = "Jumat, ";break;
        case 'Saturday':$hari = "Sabtu, ";break;
        case 'Sunday':$hari = "Minggu, ";break;
        default:$hari = date("l");break;
    }
@endphp
    @if (session('sukses'))
        <div class="alert alert-success"><p style="margin:0" class="text-center">{{session('sukses')}}</p></div>
    @elseif(session('gagal'))
        <div class="alert alert-danger"><p style="margin:0" class="text-center">{{session('gagal')}}</p></div>
    @elseif(session('ubah'))
        <div class="alert alert-warning"><p style="margin:0" class="text-center">{{session('ubah')}}</p></div>
    @endif
    <div class="row">
 
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    @if($data->status == "Sudah ada nomor SK" && $data->no_sk != null)
                        <p id="sst" align="center" class="btn btn-success btn-lg">Setujui Permohonan <i class="fa fa-check"></i></p>
                    @else

                    @endif
                    <h4 class="card-title m-t-10">Pelayanan <br> {{$data->pelayanan}}</h4>
                    @if ($data->no_sk ==null)
                        <p id="revisi" class="btn btn-danger">Perbaiki Berkas</p>
                    <form action="{{route('rev_formulir',[$id_berkas,$data->slug,$kode])}}" method="POST" id="form-revisi">
                            @csrf
                            <div class="form-group">
                                <label for="" class="label-control">Catatan</label>
                                <textarea name="catatan" class="form-control">{{$data->pesan}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-danger">Proses</button>
                        </form>
                    @else
                        <small class="text-muted">Nomor Surat Keputusan</small>
                        <h6>{{$data->no_sk}}</h6>
                    @endif
                    <hr>
                    <small class="text-muted">Nama Pemohon</small>
                    <h6>{{$data->nama}}</h6>
                    <small class="text-muted">Nomor Induk Kependudukan</small>
                    <h6>{{$data->nik}}</h6>
                    <small class="text-muted">Nomor Telepon</small>
                    <h6>{{$data->telepon}}</h6>
                    <small class="text-muted">Pekerjaan</small>
                    <h6>{{$data->pekerjaan}}</h6>
                    <small class="text-muted">Alamat</small>
                    <h6>Jalan {{$data->jalan}}, RT: {{$data->rt}} RW: {{$data->rw}} <br> {{$data->jenis_daerah}} {{$data->nama_daerah}} Kecamatan Pemalang</h6>
                    <small class="text-muted">Diajukan pada</small>
                    <h6>{{$hari.date('d',strtotime($tanggal))}} {{$m}} {{date('Y',strtotime($tanggal))}} <br> Pukul: {{date('H:i:s',strtotime($tanggal))}}</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            @include("v2.kecamatan.detail.$data->slug")
        </div>
    </div>
    <div id="setuju" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Setujui Permohonan ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="se7">Setuju</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tidak</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(function(){
        $("#form-revisi").hide(true);
        $("#sst").click(function(){
            $("#setuju").modal({
                show:true
            })
        });
        $("#revisi").click(function(){
            $("#form-revisi").show(true);
        });
        $("#se7").click(function(){
            window.location.href = "{{route('setujuForm',[$id_berkas,$data->slug,$kode])}}"
        })
    })
</script>
@endsection
