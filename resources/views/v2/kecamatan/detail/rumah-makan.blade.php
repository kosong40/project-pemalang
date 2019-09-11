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
        {{-- <h3 class="text-center">Cetak surat <a href="">disini</a></h3> --}}
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
                    @if($data->jenis != "Permohonan Baru")
                    <div class="col-sm-4"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value="503"></div>
                    @else
                    <div class="col-sm-4"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value="503.14"></div>
                    @endif
                    <div class="col-sm-4"><input type="text" class="form-control is-valid" name="no_sk[]"@if ($data->no_sk != null) value="{{$new[2]}}" @endif required></div>
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
            <small class="text-muted">Jenis Permohonan</small>
            <h6>{{$data->jenis}}</h6>
            @if($data->jenis != "Balik Nama")
            <small class="text-muted">Nama Usaha</small>
            <h6>{{$data->nama_usaha}}</h6>
            <small class="text-muted">Alamat Usaha</small>
            <h6>{{$data->alamat_usaha}}</h6>
            @else
            <small class="text-muted">Nama Usaha</small>
            <h6>{{$data->nama_usaha}}</h6>
            <small class="text-muted">Alamat Usaha</small>
            <h6>{{$data->alamat_usaha}}</h6>
            <small class="text-muted">Pemilik Usaha Lama</small>
            <h6>{{$data->nama_usaha_baru}}</h6>
            @endif
            <hr>
            <h6>Scan Kartu Tanda Penduduk</h6>
            <a href="{{url("$data->scan_ktp")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
            <h6>Scan Pengantar Izin Mendirikan Bangunan dari {{$data->jenis_daerah}} {{$data->nama_daerah}}</h6>
            <a href="{{url("$data->scan_pengantar")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
        </div>
    </div>
</div>

