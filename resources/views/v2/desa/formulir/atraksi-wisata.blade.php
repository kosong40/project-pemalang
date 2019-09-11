
<div class="card-body">
    <h4 class="card-title">Detail Permohonan {{$sublayanan->id}}</h4>
    <input type="hidden" name="sublayanan_id" value="{{$sublayanan->id}}">
    
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Nama Usaha</label>
        <div class="col-sm-9">
            <input type="text" value="{{old('nama_usaha')}}" class="form-control @if($errors->get('nama_usaha')) is-invalid @endif" name="nama_usaha" placeholder="Nama Usaha">
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
            <input type="text" value="{{old('alamat_usaha')}}" class="form-control @if($errors->get('alamat_usaha')) is-invalid @endif" name="alamat_usaha" placeholder="Alamat Usaha">
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
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Jumlah Karyawan</label>
        <div class="col-sm-9">
            <input type="number" value="{{old('jumlah_karyawan')}}" class="form-control @if($errors->get('jumlah_karyawan')) is-invalid @endif" name="jumlah_karyawan" placeholder="Jumlah Karyawan">
            @if($errors->get('jumlah_karyawan'))
                @foreach ($errors->get('jumlah_karyawan') as $pesan)
                    <div class="invalid-feedback">
                        {{$pesan}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Nilai Aset</label>
        <div class="col-sm-9">
            <input type="number" value="{{old('nilai_aset')}}" class="form-control @if($errors->get('nilai_aset')) is-invalid @endif" name="nilai_aset" placeholder="Nilai Aset">
            @if($errors->get('nilai_aset'))
                @foreach ($errors->get('nilai_aset') as $pesan)
                    <div class="invalid-feedback">
                        {{$pesan}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
</div>
<div class="card-body">
<h4 class="card-title">Berkas Lampiran</h4>
    <div class="form-group row">
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
    <div class="form-group row">
    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Pengantar dari {{$daerah->jenis_daerah}} terkait lokasi usaha</label>
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
    </div>
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Pernyataan yang Diketahui  {{$daerah->jenis_daerah}} (Bermaterai) </label>
        <div class="custom-file col-sm-9">
            <input type="file" class="form-control @if($errors->get('scan_pernyataan_desa')) is-invalid @endif" name="scan_pernyataan_desa">
            @if($errors->get('scan_pernyataan_desa'))
                @foreach ($errors->get('scan_pernyataan_desa') as $pesan)
                    <div class="invalid-feedback">
                        {{$pesan}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Struktur Organisasi </label>
        <div class="custom-file col-sm-9">
            <input type="file" class="form-control @if($errors->get('struktur_organisasi')) is-invalid @endif" name="struktur_organisasi">
            @if($errors->get('struktur_organisasi'))
                @foreach ($errors->get('struktur_organisasi') as $pesan)
                    <div class="invalid-feedback">
                        {{$pesan}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>