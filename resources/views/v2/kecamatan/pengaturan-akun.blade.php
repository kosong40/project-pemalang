@extends('layout.v2.kecamatan')
@section('title',"Pengaturan Akun")
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('kecamatan/v2/')}}">Beranda</a></li>
<li class="breadcrumb-item active" aria-current="page">Pengaturan Akun</li>
@endsection
@section('content')
@if (session('sukses'))
    <div class="alert alert-success">
        <p class="text-center">{{ session('sukses') }}</p>
    </div>
@endif
<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <div class="box-body box-profile">
                    <h3 class="profile-username text-center">{{$admin->nama}}</h3>
                    <p class="text-muted text-center">Admin : {{$daerah->jenis_daerah}}  {{$daerah->nama_daerah}}</p>
                </div>
            </div>
        <hr>
            <div class="card-body">
                <div class="box-header with-border">
                    <h3 class="box-title">Tentang Saya</h3>
                </div>
                <div class="box-body">
                    <strong><i class="fa fa-user margin-r-5"></i> Username</strong>
                    <p class="text-muted">
                        {{$admin->username}}
                    </p>
                    <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                    <p class="text-muted">
                            {{$admin->email}}
                    </p>
                    <strong><i class="fa fa-envelope margin-r-5"></i> No. Telepon</strong>
                    <p class="text-muted">
                            {{$admin->kontak}}
                    </p>
                </div>
            </div>
        </div>
    </div> {{-- end div col 3 --}}
    <div class="col-sm-9">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#profil" role="tab" aria-controls="pills-timeline" aria-selected="true">Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-timeline-tab" data-toggle="pill" href="#password" role="tab" aria-controls="pills-timeline" aria-selected="true">Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-timeline-tab" data-toggle="pill" href="#info" role="tab" aria-controls="pills-timeline" aria-selected="true">Info {{$daerah->jenis_daerah}}</a>
                    </li>
                </ul>
            </div> {{-- end card body --}}
        </div>    
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <h3>Pengaturan Akun</h3><hr>
                        <div class="alert alert-warning">
                            <h5><i class="icon fa fa-ban"></i> Peringatan!</h5>
                            <p>Setelah berhasil mengubah data akun admin, maka akan logout terlebih dahulu dan anda harus login kembali</p>
                        </div>
                        <form action="{{route('profilAkun')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama</label>
                                <div class="col-sm-9">
                                <input type="text" value="{{$admin->nama}}" class="form-control @if($errors->get('nama')) is-invalid @endif" name="nama" placeholder="Nama">
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
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                <input type="text" value="{{$admin->email}}" class="form-control @if($errors->get('email')) is-invalid @endif" name="email" placeholder="Email">
                                    @if($errors->get('email'))
                                        @foreach ($errors->get('email') as $pesan)
                                            <div class="invalid-feedback">
                                                {{$pesan}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nomor Telepon</label>
                                <div class="col-sm-9">
                                <input type="text" value="{{$admin->kontak}}" class="form-control @if($errors->get('telepon')) is-invalid @endif" name="telepon" placeholder="Nomor Telepon">
                                    @if($errors->get('telepon'))
                                        @foreach ($errors->get('telepon') as $pesan)
                                            <div class="invalid-feedback">
                                                {{$pesan}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group m-b-0 text-right">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Proses</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="password" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <h3>Pengaturan Password</h3><hr>
                        <div class="alert alert-warning">
                            <h5><i class="icon fa fa-ban"></i> Peringatan!</h5>
                            <p>Setelah berhasil mengubah data akun admin, maka akan logout terlebih dahulu dan anda harus login kembali</p>
                        </div>
                        <form action="{{route('akunPass')}}" method="POST">
                            <div class="form-group row">@csrf
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Password Lama</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control @if($errors->get('password_lama')) is-invalid @endif" name="password_lama" placeholder="Password Lama">
                                    @if($errors->get('password_lama'))
                                        @foreach ($errors->get('password_lama') as $pesan)
                                            <div class="invalid-feedback">
                                                {{$pesan}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Password Baru</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control @if($errors->get('password_baru')) is-invalid @endif" name="password_baru" placeholder="Password Baru">
                                    @if($errors->get('password_baru'))
                                        @foreach ($errors->get('password_baru') as $pesan)
                                            <div class="invalid-feedback">
                                                {{$pesan}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Ulangi Password Baru</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control @if($errors->get('ulangi_password_baru')) is-invalid @endif" name="ulangi_password_baru" placeholder="Ulangi Password Baru">
                                    @if($errors->get('ulangi_password_baru'))
                                        @foreach ($errors->get('ulangi_password_baru') as $pesan)
                                            <div class="invalid-feedback">
                                                {{$pesan}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group m-b-0 text-right">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Proses</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="info" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <h3>Informasi {{$daerah->jenis_daerah}} </h3><hr>
                        <form action="{{route('profilDaerah')}}" method="POST">
                            <div class="form-group row">@csrf
                            <input type="hidden" name="id" value="{{$daerah->id}}">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Camat</label>
                                <div class="col-sm-9">
                                <input type="text" value="{{$daerah->kepala_daerah}}" class="form-control @if($errors->get('kepala_daerah')) is-invalid @endif" name="kepala_daerah" placeholder="Camat">
                                    @if($errors->get('kepala_daerah'))
                                        @foreach ($errors->get('kepala_daerah') as $pesan)
                                            <div class="invalid-feedback">
                                                {{$pesan}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">NIP</label>
                                <div class="col-sm-9">
                                <input type="text" value="{{$daerah->nip}}" class="form-control @if($errors->get('nip')) is-invalid @endif" name="nip" placeholder="NIP">
                                    @if($errors->get('nip'))
                                        @foreach ($errors->get('nip') as $pesan)
                                            <div class="invalid-feedback">
                                                {{$pesan}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group m-b-0 text-right">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Proses</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- end div col 9 --}}
</div>
@endsection