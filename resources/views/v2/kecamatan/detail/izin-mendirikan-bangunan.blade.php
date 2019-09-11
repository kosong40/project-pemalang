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
                    <div class="col-sm-3"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value="503.4"></div>
                    <div class="col-sm-3"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value="B"></div>
                    <div class="col-sm-3"><input type="text" class="form-control is-valid" name="no_sk[]"@if ($data->no_sk != null) value="{{$new[2]}}" @endif required></div>
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
                            <small class="text-muted">Keperluan Bangunan</small>
                            <h6>{{$data->keperluan_bangunan}}</h6>
                            <small class="text-muted">Konstruksi Bangunan</small>
                            <h6>{{$data->konstruksi_bangunan}}</h6>
                            <small class="text-muted">Luas Bangunan</small>
                            <h6>{{$data->luas_bangunan}}</h6>
                            <small class="text-muted">Luas Tanah</small>
                            <h6>{{$data->luas_tanah}}</h6>
                            <small class="text-muted">Pemilik Tanah</small>
                            <h6>{{$data->tanah_milik}}</h6>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="berkas" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <div class="card-body">
                            <h6>Scan Kartu Tanda Penduduk</h6>
                            <a href="{{url("$data->scan_ktp")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Scan Pengantar Izin Mendirikan Bangunan dari {{$data->jenis_daerah}} {{$data->nama_daerah}}</h6>
                            <a href="{{url("$data->scan_pengantar")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Scan Persetujuan Tetangga</h6>
                            <a href="{{url("$data->scan_persetujuan_tetangga")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Scan Kepemilikan Tanah</h6>
                            <a href="{{url("$data->scan_fc_kepemilikan_tanah")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Scan SPPT PBB Terakhir</h6>
                            <a href="{{url("$data->scan_fc_sppt_pbb_terakhir")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Gambar Rencana Bangunan</h6>
                            <a href="{{url("$data->scan_gambar_rencana")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>

