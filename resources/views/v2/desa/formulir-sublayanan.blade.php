@extends('layout.v2.desa')
@section('title','Formulir '.$sublayanan->subpelayanan)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('desa-home')}}">Beranda</a></li>
    <li class="breadcrumb-item"><a href="{{route('desa-formulir')}}">Formulir</a></li>
    <li class="breadcrumb-item"><a href="{{url('desa/v2/formulir/'.$pelayanan->slug)}}">{{$pelayanan->pelayanan}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$sublayanan->subpelayanan}}</li>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('form-'.$sublayanan->slug)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
            <h4 class="card-title">Informasi Pemohon</h4>
            @if (session('sukses'))
                <div class="alert alert-success"><p style="margin:0" class="text-center">{{session('sukses')}}</p></div>
            @endif
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama</label>
                <div class="col-sm-9">
                <input type="text" value="{{old('nama')}}" class="form-control @if($errors->get('nama')) is-invalid @endif" name="nama" placeholder="Nama">
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
                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nomor Induk Kependudukan (NIK)</label>
                <div class="col-sm-9">
                <input type="text" value="{{old('nik')}}" class="form-control @if($errors->get('nik')) is-invalid @endif" name="nik" placeholder="Nomor Induk Kependudukan (NIK)">
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
                <input type="text" value="{{old('telepon')}}" class="form-control @if($errors->get('telepon')) is-invalid @endif" name="telepon" placeholder="Nomor Telepon">
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
                <input type="text" value="{{old('pekerjaan')}}" class="form-control @if($errors->get('pekerjaan')) is-invalid @endif" name="pekerjaan" placeholder="Pekerjaan">
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
                    <input type="number" value="{{old('umur')}}" class="form-control @if($errors->get('umur')) is-invalid @endif" name="umur" placeholder="Umur">
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
                <input type="text" value="{{old('rt')}}" class="form-control @if($errors->get('rt')) is-invalid @endif" name="rt" placeholder="RT">
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
                <input type="text" value="{{old('rw')}}" class="form-control @if($errors->get('rw')) is-invalid @endif" name="rw" placeholder="RW">
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
                <input type="text" value="{{old('jalan')}}" class="form-control @if($errors->get('jalan')) is-invalid @endif" name="jalan" placeholder="Jalan/ Dusun/ Dukuh">
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
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">{{$daerah->jenis_daerah}}</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" nama="desa" value="{{$daerah->nama_daerah}}" placeholder="{{$daerah->jenis_daerah}}">
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
        @include('v2.desa.formulir.'.$sublayanan->slug)
        <div class="card-body">
            <div class="form-group m-b-0 text-right">
                <button type="reset" class="btn btn-danger waves-effect waves-light">Reset</button>
                <button type="submit" class="btn btn-info waves-effect waves-light">Proses</button>
            </div>
        </div>
    </form>
</form>
@endsection