<div class="card">
@php
    $no = $data->no_sk;
    if($no == null){
        $new = "";
    }else{
        $new = explode("/",$no);
    }
@endphp
@if(session('username') == "AdminKecamatan")
@if($data->status == "Setuju" && $data->no_sk != null)
    
    <div class="card-body">
        <h3>
        <h3 class="text-center">Cetak surat <a href="{{route("cetak.surat.sublayanan",[$data->slug,$kode])}}">disini</a></h3>
        </h3>
    </div>

@else
    <div class="card-body">
        <form action="{{route('add_nosk',[$id_berkas,$data->slug,$kode])}}" method="post">
        @csrf
            <div class="form-group">
                <label for="" class="label-control">Nomor SK</label>
                <div class="row">
                    <div class="col-sm-4"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value="503.14"></div>
                    <div class="col-sm-4"><input type="text" class="form-control is-valid" name="no_sk[]"@if ($data->no_sk != null) value="{{$new[1]}}" @endif required></div>
                    <div class="col-sm-4"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value={{date('Y')}}></div>
                </div>
                <br>
                @if ($data->no_sk == null)
                <input type="submit" name="tombol" value="Tambah" class="btn btn-default float-right">
                @else
                <input name="tombol" type="submit" value="Ubah" class="btn btn-warning float-right">
                @endif
            </div>
        </form>
    </div>
@endif
@else
@if($data->status == "Setuju" && $data->no_sk != null)
<div class="card-body">
    <h3 class="text-center">Surat siap dicetak</h3>
</div>
@else
<div class="card-body">
    <h3 class="text-center">Surat belum siap dicetak</h3>
</div>
@endif
@endif
        <div class="card-body">
        <hr>
            <small class="text-muted">Nama Usaha</small>
            <h6>{{$data->nama_usaha}}</h6>
            <small class="text-muted">Alamat Usaha</small>
            <h6>{{$data->alamat_usaha}}</h6>
            <small class="text-muted">Jumlah Karyawan</small>
            <h6>{{$data->jumlah_karyawan}} orang</h6>
            <small class="text-muted">Nilai Aset</small>
            <h6>{{Kustom::getRupiah($data->nilai_aset)}}</h6>
            <hr>
            <h6>Scan Kartu Tanda Penduduk</h6>
            <a href="{{url("$data->scan_ktp")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
            <h6>Scan Pengantar Izin Mendirikan Bangunan dari {{$data->jenis_daerah}} {{$data->nama_daerah}}</h6>
            <a href="{{url("$data->scan_pengantar")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
            <h6>Scan Pernyataan yang Diketahui  {{$data->jenis_daerah}} (Bermaterai)</h6>
            <a href="{{url("$data->scan_pernyataan_desa")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
            <h6>Scan Struktur Organisasi</h6>
            <a href="{{url("$data->struktur_organisasi")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
        </div>
    </div>
</div>

