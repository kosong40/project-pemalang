<div class="card-body">
    <h4 class="card-title">Detail Permohonan</h4>
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Nama Calon Suami</label>
        <div class="col-sm-9">
            <input type="text" value="{{$data->calon_suami}}" class="form-control @if($errors->get('calon_suami')) is-invalid @endif" name="calon_suami" placeholder="Nama Calon Suami">
            @if($errors->get('calon_suami'))
                @foreach ($errors->get('calon_suami') as $pesan)
                    <div class="invalid-feedback">
                        {{$pesan}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Umur Calon Suami</label>
        <div class="col-sm-9">
            <input type="number" value="{{$data->umur_calon_suami}}" class="form-control @if($errors->get('umur_calon_suami')) is-invalid @endif" name="umur_calon_suami" placeholder="Umur Calon Suami">
            @if($errors->get('umur_calon_suami'))
                @foreach ($errors->get('umur_calon_suami') as $pesan)
                    <div class="invalid-feedback">
                        {{$pesan}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Nama Calon Istri</label>
        <div class="col-sm-9">
            <input type="text" value="{{$data->calon_istri}}" class="form-control @if($errors->get('calon_istri')) is-invalid @endif" name="calon_istri" placeholder="Nama Calon Istri">
            @if($errors->get('calon_istri'))
                @foreach ($errors->get('calon_istri') as $pesan)
                    <div class="invalid-feedback">
                        {{$pesan}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Umur Calon Istri</label>
        <div class="col-sm-9">
            <input type="number" value="{{$data->umur_calon_istri}}" class="form-control @if($errors->get('umur_calon_istri')) is-invalid @endif" name="umur_calon_istri" placeholder="Umur Calon Istri">
            @if($errors->get('umur_calon_istri'))
                @foreach ($errors->get('umur_calon_istri') as $pesan)
                    <div class="invalid-feedback">
                        {{$pesan}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Tanggal Menikah</label>
        <div class="col-sm-9">
            <input type="date" value="{{$data->tanggal_nikah}}" class="form-control @if($errors->get('tanggal_nikah')) is-invalid @endif" name="tanggal_nikah">
            @if($errors->get('tanggal_nikah'))
                @foreach ($errors->get('tanggal_nikah') as $pesan)
                    <div class="invalid-feedback">
                        {{$pesan}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="card-body">
        <h4 class="card-title">Berkas Lampiran</h4>
        <div class="row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Kartu Tanda Penduduk (Calon Suami / Istri)</label>
            <div class="custom-file col-sm-9">
                <input type="file" class="form-control @if($errors->get('scan_ktp')) is-invalid @endif" name="scan_ktp">
                @if($errors->get('scan_ktp'))
                    @foreach ($errors->get('scan_ktp') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Kartu Keluarga</label>
            <div class="custom-file col-sm-9">
                <input type="file" class="form-control @if($errors->get('scan_kk')) is-invalid @endif" name="scan_kk">
                @if($errors->get('scan_kk'))
                    @foreach ($errors->get('scan_kk') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div><br>
        <div class="row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Akta Cerai (Jika ada)</label>
            <div class="custom-file col-sm-9">
                <input type="file" class="form-control @if($errors->get('akta_cerai')) is-invalid @endif" name="akta_cerai">
                @if($errors->get('akta_cerai'))
                    @foreach ($errors->get('akta_cerai') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>   
</div>