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
        <h3 class="text-center">Cetak surat <a href="{{route("cetak.surat.pelayanan",[$data->slug,$kode])}}">disini</a></h3>
    </h3>
</div>

@else
    <div class="card-body">
        <form action="{{route('add_nosk',[$id_berkas,$data->slug,$kode])}}" method="post">
        @csrf
            <div class="form-group">
                <label for="" class="label-control">Nomor SK</label>
                <div class="row">
                    <div class="col-sm-3"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value="IUMK"></div>
                    <div class="col-sm-3"><input type="text" class="form-control is-valid" name="no_sk[]"@if ($data->no_sk != null) value="{{$new[1]}}" @endif required></div>
                    <div class="col-sm-3"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value="I"></div>
                    <div class="col-sm-3"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value={{date('Y')}}></div>
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

                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#detail" role="tab" aria-controls="pills-timeline" aria-selected="true">Detail Permohonan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#berkas" role="tab" aria-controls="pills-profile" aria-selected="false">Berkas</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <div class="card-body">
                            <small class="text-muted">Nama Usaha</small>
                            <h6>{{$data->nama_usaha}}</h6>
                            <small class="text-muted">Alamat Usaha</small>
                            <h6>{{$data->alamat_usaha}} Buah</h6>
                            <small class="text-muted">Klasifikasi Usaha</small>
                            <h6>{{$data->klasifikasi}}</h6>
                            <small class="text-muted">Kode Pos</small>
                            <h6>{{$data->kodepos}}</h6>
                            <small class="text-muted">Sektor Usaha</small>
                            <h6>{{$data->sektor_usaha}}</h6>
                            <small class="text-muted">Sarana yang digunakan</small>
                            <h6>{{$data->sarana}}</h6>
                            <small class="text-muted">Modal Usaha</small>
                            <h6>{{Kustom::getRupiah($data->modal)}}</h6>
                            <small class="text-muted">NPWP</small>
                            <h6>{{$data->npwp}}</h6>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="berkas" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <div class="card-body">
                            <h6>Scan Kartu Tanda Penduduk</h6>
                            <a href="{{url("$data->scan_ktp")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Scan Kartu Keluarga</h6>
                            <a href="{{url("$data->scan_kk")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Pas Foto 4x6</h6>
                            <a href="{{url("$data->foto")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Scan Pengantar Izin Reklame dari {{$data->jenis_daerah}} {{$data->nama_daerah}}</h6>
                            <a href="{{url("$data->scan_pengantar")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>

