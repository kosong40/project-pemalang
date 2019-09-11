<div class="card">
@php
    switch(date("m",strtotime($data->tanggal_akhir))){
        case '01':$bulan2 = "Januari";break;
        case '02':$bulan2 = "Februari";break;
        case '03':$bulan2 = "Maret";break;
        case '04':$bulan2 = "April";break;
        case '05':$bulan2 = "Mei";break;
        case '06':$bulan2 = "Juni";break;
        case '07':$bulan2 = "Juli";break;
        case '08':$bulan2 = "Agustus";break;
        case '09':$bulan2 = "Spetember";break;
        case '10':$bulan2 = "Oktober";break;
        case '11':$bulan2 = "November";break;
        case '12':$bulan2 = "Desember";break;
    }
    switch(date("m",strtotime($data->tanggal_awal))){
        case '01':$bulan = "Januari";break;
        case '02':$bulan = "Februari";break;
        case '03':$bulan = "Maret";break;
        case '04':$bulan = "April";break;
        case '05':$bulan = "Mei";break;
        case '06':$bulan = "Juni";break;
        case '07':$bulan = "Juli";break;
        case '08':$bulan = "Agustus";break;
        case '09':$bulan = "Spetember";break;
        case '10':$bulan = "Oktober";break;
        case '11':$bulan = "November";break;
        case '12':$bulan = "Desember";break;
    }
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
                    <div class="col-sm-3"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value="503.12"></div>
                    <div class="col-sm-3"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value="R"></div>
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
                            <small class="text-muted">Jenis Reklame</small>
                            <h6>{{$nama_reklame}}</h6>
                            <small class="text-muted">Banyak Reklame</small>
                            <h6>{{$data->banyak}} Buah</h6>
                            <small class="text-muted">Pesan Produk</small>
                            <h6>{{$data->pesan_produk}}</h6>
                            <small class="text-muted">Masa Berlaku</small>
                            <h6>Tanggal {{date('d',strtotime($data->tanggal_awal))}} {{$bulan}} {{date('Y',strtotime($data->tanggal_awal))}}
                            s/d {{date('d',strtotime($data->tanggal_akhir))}} {{$bulan2}} {{date('Y',strtotime($data->tanggal_akhir))}}</h6>
                            <small class="text-muted">Tempat Pemasangan Reklame</small>
                            <h6>{{$data->tempat_reklame}}</h6>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="berkas" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <div class="card-body">
                            <h6>Scan Kartu Tanda Penduduk</h6>
                            <a href="{{url("$data->scan_ktp")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Scan NPWP</h6>
                            <a href="{{url("$data->scan_npwp")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Scan Contoh Reklame</h6>
                            <a href="{{url("$data->contoh_reklame")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Scan Persetujuan Pemasangan Reklame</h6>
                            <a href="{{url("$data->scan_persetujuan")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Scan Izin Reklame Sebelumnya (apabila perpanjangan)</h6>
                            <a href="{{url("$data->scan_izin_lama")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                            <h6>Scan Pengantar Izin Reklame dari {{$data->jenis_daerah}} {{$data->nama_daerah}}</h6>
                            <a href="{{url("$data->scan_pengantar")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>

