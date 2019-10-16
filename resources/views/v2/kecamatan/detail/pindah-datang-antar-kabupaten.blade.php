<div class="card">
    @php
        $no = $data->no_sk;
        if($no == null){
            $new = "";
        }else{
            $new = explode("/",$no);
        }
        function stat_kk($data){
            if($data == 1){
                return "Numpang KK";
            }elseif($data == 2){
                return "Membuat KK Baru";
            }else{
                return "Nomor KK Tetap";
            }
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
                        <div class="col-sm-3"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value="471.2"></div>
                        
                        <div class="col-sm-3"><input type="text" class="form-control is-valid" name="no_sk[]"@if ($data->no_sk != null) value="{{$new[1]}}" @endif required></div>
                        <div class="col-sm-3"><input type="text" class="form-control is-valid" name="no_sk[]" @if ($data->no_sk != null) value="{{$new[2]}}" @endif></div>
                        <div class="col-sm-3"><input type="text" class="form-control is-valid" readonly  name="no_sk[]" value="Pemalang"></div>
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
            <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#detail" role="tab" aria-controls="pills-timeline" aria-selected="true">Data Daerah Asal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-timeline-tab" data-toggle="pill" href="#tujuan" role="tab" aria-controls="pills-timeline" aria-selected="true">Data Kepindahan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-timeline-tab" data-toggle="pill" href="#keluarga" role="tab" aria-controls="pills-timeline" aria-selected="true">Keluarga Yang Pindah</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#berkas" role="tab" aria-controls="pills-profile" aria-selected="false">Berkas</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="pills-timeline-tab">
            <div class="card-body">
                <small class="text-muted">Nomor Kartu Keluarga</small>
                <h6>{{$data->nomor_kk}}</h6>
                <small class="text-muted">Nama Kepala Keluarga</small>
                <h6>{{$data->kepala_keluarga}}</h6>
                <small class="text-muted">Alamat</small>
                <h6>{{$data->alamat_1}} RT: {{$data->rt_1}} RW: {{$data->rw_1}} Dusun {{$data->dusun_1}} DESA {{Kustom::exp($data->desa_1)[1]}} KECAMATAN {{Kustom::exp($data->kecamatan_1)[1]}} <br>
                {{Kustom::exp($data->kabupaten_1)[1]}} PROVINSI {{Kustom::exp($data->provinsi_1)[1]}}
                </h6>
                <small class="text-muted">Kode Pos</small>
                <h6>{{$data->kodepos_1}}</h6>
                <small class="text-muted">Telepon</small>
                <h6>{{$data->telepon_1}}</h6>
            </div>
        </div>
        <div class="tab-pane fade show" id="tujuan" role="tabpanel" aria-labelledby="pills-timeline-tab">
            <div class="card-body">
                    <small class="text-muted">Nomor Kartu Keluarga</small>
                    <h6>{{$data->nomor_kk_2}}</h6>
                    <small class="text-muted">NIK Kepala Keluarga</small>
                    <h6>{{$data->nik_kepala_keluarga_2}}</h6>
                    <small class="text-muted">Nama Kepala Keluarga</small>
                    <h6>{{$data->kepala_keluarga_2}}</h6>
                    <small class="text-muted">Tanggal Kepindahan</small>
                    <h6>{{Kustom::getDay($data->tanggal_pindah)}}{{Kustom::getTanggal($data->tanggal_pindah)}}</h6>
                <small class="text-muted">Alamat</small>
                <h6>{{$data->alamat_2}} RT: {{$data->rt_2}} RW: {{$data->rw_2}} Dusun {{$data->dusun_2}} Desa {{$data->desa_2}} Kecamatan Pemalang</h6>
                <small class="text-muted">Kode Pos</small>
                <h6>{{$data->kodepos_2}}</h6>
                <small class="text-muted">Telepon</small>
                <h6>{{$data->telepon_2}}</h6>
                <small class="text-muted">Status KK yang pindah</small>
                <h6>{{stat_kk($data->stat_kk_pindah)}}</h6>
            </div>
        </div>
        <div class="tab-pane fade show" id="berkas" role="tabpanel" aria-labelledby="pills-timeline-tab">
            <div class="card-body">
                <h6>Scan Kartu Tanda Penduduk</h6>
                <a href="{{url("$data->buat_ktp_kk")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                <h6>Scan Form F-1.38</h6>
                <a href="{{url("$data->form_138")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                <h6>Scan Form F-1.39</h6>
                <a href="{{url("$data->form_139")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                <h6>Scan Surat Nikah</h6>
                <a href="{{url("$data->scan_surat_nikah")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                <h6>Scan SKCK</h6>
                <a href="{{url("$data->scan_skck")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>

            </div>
        </div>
        <div class="tab-pane fade show" id="keluarga" role="tabpanel" aria-labelledby="pills-timeline-tab">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Nik</td>
                            <td>Nama</td>
                            <td>Masa Berlaku KTP</td>
                            <td>SHDK</td>
                        </tr>
                        @php   
                            $no = count(Kustom::exp($data->nik_kel));
                        @endphp
                        @for ($i = 0; $i < ($no); $i++)
                            <tr>
                                <td>{{Kustom::exp($data->nik_kel)[$i]}}</td>
                                <td>{{Kustom::exp($data->nama_kel)[$i]}}</td>
                                <td>{{Kustom::exp($data->masa_kel)[$i]}}</td>
                                <td>{{Kustom::shdk(Kustom::exp($data->shdk)[$i])}}</td>
                            </tr>
                        @endfor
                    </table>
                </div>
            </div>
    </div>
</div>
    
