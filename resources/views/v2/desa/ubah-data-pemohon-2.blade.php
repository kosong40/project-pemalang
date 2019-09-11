@extends('layout.v2.desa')
@section('title',"Ubah Data Pemohon $data->nama")
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('desa-home')}}">Beranda</a></li>
<li class="breadcrumb-item"><a href="{{url('desa/v2/data-pemohon')}}"> Data Pemohon</a></li>
<li class="breadcrumb-item"><a href="{{url('desa/v2/data-pemohon/'.$pelayanan->slug)}}">{{$pelayanan->pelayanan}}</a>
</li>
<li class="breadcrumb-item"><a href="{{url('desa/v2/data-pemohon/'.$pelayanan->slug.'/'.$data->slug)}}">{{$data->subpelayanan}}</a></li>
<li class="breadcrumb-item active">{{$data->nik}}</li>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('ubahdata1',[$data->slug,$kode])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <h4 class="card-title">Informasi Pemohon</h4>
        <div class="alert alert-warning">
                <h5><i class="icon fa fa-ban"></i> Revisi</h5>
                <p>{{$data->pesan}}</p>
            </div>
        @if (session('sukses'))
        <div class="alert alert-success">
            <p style="margin:0" class="text-center">{{session('sukses')}}</p>
        </div>
        @endif
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->nama}}"
                    class="form-control @if($errors->get('nama')) is-invalid @endif" name="nama" placeholder="Nama">
                @if($errors->get('nama'))
                @foreach ($errors->get('nama') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nomor Induk Kependudukan
                (NIK)</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->nik}}"
                    class="form-control @if($errors->get('nik')) is-invalid @endif" name="nik"
                    placeholder="Nomor Induk Kependudukan (NIK)">
                @if($errors->get('nik'))
                @foreach ($errors->get('nik') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Nomor Telepon</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->telepon}}"
                    class="form-control @if($errors->get('telepon')) is-invalid @endif" name="telepon"
                    placeholder="Nomor Telepon">
                @if($errors->get('telepon'))
                @foreach ($errors->get('telepon') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Pekerjaan</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->pekerjaan}}"
                    class="form-control @if($errors->get('pekerjaan')) is-invalid @endif" name="pekerjaan"
                    placeholder="Pekerjaan">
                @if($errors->get('pekerjaan'))
                @foreach ($errors->get('pekerjaan') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        @if($sublayanan->slug == "atraksi-wisata")
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Umur</label>
            <div class="custom-file col-sm-9">
                <input type="number" value="{{$data->umur}}" class="form-control @if($errors->get('umur')) is-invalid @endif" name="umur" placeholder="Umur">
                @if($errors->get('umur'))
                    @foreach ($errors->get('umur') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        @else
        @endif
        <p class="text-center">ALAMAT</p>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">RT</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->rt}}" class="form-control @if($errors->get('rt')) is-invalid @endif"
                    name="rt" placeholder="RT">
                @if($errors->get('rt'))
                @foreach ($errors->get('rt') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">RW</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->rw}}" class="form-control @if($errors->get('rw')) is-invalid @endif"
                    name="rw" placeholder="RW">
                @if($errors->get('rw'))
                @foreach ($errors->get('rw') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Jalan/ Dusun/ Dukuh</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->jalan}}"
                    class="form-control @if($errors->get('jalan')) is-invalid @endif" name="jalan"
                    placeholder="Jalan/ Dusun/ Dukuh">
                @if($errors->get('jalan'))
                @foreach ($errors->get('jalan') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1"
                class="col-sm-3 text-right control-label col-form-label">{{$daerah->jenis_daerah}}</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" readonly nama="desa" value="{{$daerah->nama_daerah}}"
                    placeholder="{{$daerah->jenis_daerah}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Kecamatan</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="cono1" value="Pemalang" readonly>
                <input type="hidden" name="daerah_id" value="{{$daerah->id}}">
                <input type="hidden" name="pelayanan_id" value="{{$pelayanan->id}}">
            </div>
        </div>
    </div>
    <hr>
    @include('v2.desa.ubah-data.'.$data->slug)
    <div class="card-body">
        <div class="form-group m-b-0 text-right">
            <button type="reset" class="btn btn-danger waves-effect waves-light">Reset</button>
            <button type="submit" class="btn btn-info waves-effect waves-light">Proses</button>
        </div>
    </div>
</form>
@endsection