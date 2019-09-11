
    <div class="card-body">
        <h4 class="card-title">Detail Permohonan</h4>
        <input type="hidden" value="{{$data->id}}" name="id_berkas">
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Nama Usaha</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->nama_usaha}}" class="form-control @if($errors->get('nama_usaha')) is-invalid @endif" name="nama_usaha" placeholder="Nama Usaha">
                    @if($errors->get('nama_usaha'))
                        @foreach ($errors->get('nama_usaha') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Alamat Usaha</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->alamat_usaha}}" class="form-control @if($errors->get('alamat_usaha')) is-invalid @endif" name="alamat_usaha" placeholder="Alamat Usaha">
                    @if($errors->get('alamat_usaha'))
                        @foreach ($errors->get('alamat_usaha') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Klasifikasi Usaha</label>
            <div class="col-sm-9">
                <select name="klasifikasi" class="form-control @if($errors->get('klasifikasi')) is-invalid @endif" required>
                    <option value="{{$data->klasifikasi}}">{{$data->klasifikasi}}</option>
                    @if($data->klasifikasi == "Kecil")                    
                    <option value="Mikro">Mikro</option>
                    @else
                    <option value="Kecil">Kecil</option>
                    @endif
                </select>
                @if($errors->get('klasifikasi'))
                    @foreach ($errors->get('klasifikasi') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Kode Pos</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->kodepos}}" class="form-control @if($errors->get('kodepos')) is-invalid @endif" name="kodepos" placeholder="Kode Pos ">
                @if($errors->get('kodepos'))
                    @foreach ($errors->get('kodepos') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Sektor Usaha</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->sektor_usaha}}" class="form-control @if($errors->get('sektor_usaha')) is-invalid @endif" name="sektor_usaha" placeholder="Sektor Usaha">
                @if($errors->get('sektor_usaha'))
                    @foreach ($errors->get('sektor_usaha') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Sarana yang digunakan</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->sarana}}" class="form-control @if($errors->get('sarana')) is-invalid @endif" name="sarana" placeholder="Sarana yang digunakan">
                @if($errors->get('sarana'))
                    @foreach ($errors->get('sarana') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Modal Usaha</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->modal}}" class="form-control @if($errors->get('modal')) is-invalid @endif" name="modal" placeholder="Modal Usaha">
                @if($errors->get('modal'))
                    @foreach ($errors->get('modal') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">NPWP</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->npwp}}" class="form-control @if($errors->get('npwp')) is-invalid @endif" name="npwp" placeholder="NPWP">
                @if($errors->get('npwp'))
                    @foreach ($errors->get('npwp') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <hr>
    <div class="card-body">
        <h4 class="card-title">Berkas Lampiran</h4>
        <div class="row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Kartu Tanda Penduduk</label>
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
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Pengantar Izin Usaha Mikro dan Kecail (IUMK)</label>
            <div class="custom-file col-sm-9">
                <input type="file" class="form-control @if($errors->get('scan_pengantar')) is-invalid @endif" name="scan_pengantar">
                @if($errors->get('scan_pengantar'))
                    @foreach ($errors->get('scan_pengantar') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div><br>
        <div class="row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Pas Foto 4x6</label>
            <div class="custom-file col-sm-9">
                <input type="file" class="form-control @if($errors->get('foto')) is-invalid @endif" name="foto">
                @if($errors->get('foto'))
                    @foreach ($errors->get('foto') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div><br>
    </div><br>
