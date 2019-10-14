<div class="card-body">
        <h4 class="card-title">Detail Daerah Asal</h4>
        <input type="hidden" name="sublayanan_id" value="{{$sublayanan->id}}">
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Nomor Kartu Keluarga</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->nomor_kk_1}}"
                    class="form-control @if($errors->get('nomor_kk_1')) is-invalid @endif" name="nomor_kk_1"
                    placeholder="Nomor Kartu Keluarga">
                @if($errors->get('nomor_kk_1'))
                @foreach ($errors->get('nomor_kk_1') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Nama Kepala Keluarga</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->kepala_keluarga_1}}"
                    class="form-control @if($errors->get('kepala_keluarga_1')) is-invalid @endif" name="kepala_keluarga_1"
                    placeholder="Nama Kepala Keluarga">
                @if($errors->get('kepala_keluarga_1'))
                @foreach ($errors->get('kepala_keluarga_1') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->alamat_1}}"
                    class="form-control @if($errors->get('alamat_1')) is-invalid @endif" name="alamat_1"
                    placeholder="Alamat">
                @if($errors->get('alamat_1'))
                @foreach ($errors->get('alamat_1') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">RT</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->rt_1}}" class="form-control @if($errors->get('rt_1')) is-invalid @endif"
                    name="rt_1" placeholder="RT">
                @if($errors->get('rt_1'))
                @foreach ($errors->get('rt_1') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">RW</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->rw_1}}" class="form-control @if($errors->get('rw_1')) is-invalid @endif"
                    name="rw_1" placeholder="RW">
                @if($errors->get('rw_1'))
                @foreach ($errors->get('rw_1') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Dusun/ Dukuh</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->dusun_1}}"
                    class="form-control @if($errors->get('dusun_1')) is-invalid @endif" name="dusun_1"
                    placeholder="Dusun/ Dukuh">
                @if($errors->get('dusun_1'))
                @foreach ($errors->get('dusun_1') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Desa / Kelurahan</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->desa_1}}"
                class="form-control @if($errors->get('desa_1')) is-invalid @endif" name="desa_1"
                placeholder="Desa / Kelurahan">
                @if($errors->get('desa_1'))
                @foreach ($errors->get('desa_1') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Kecamatan</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->kecamatan_1}}"
                class="form-control @if($errors->get('kecamatan_1')) is-invalid @endif" name="kecamatan_1"
                placeholder="Kecamatan">
                @if($errors->get('kecamatan_1'))
                @foreach ($errors->get('kecamatan_1') as $pesan)
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
                <input type="text" value="{{$data->kodepos_1}}"
                    class="form-control @if($errors->get('kodepos_1')) is-invalid @endif" name="kodepos_1"
                    placeholder="Kode Pos">
                @if($errors->get('kodepos_1'))
                @foreach ($errors->get('kodepos_1') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Telepon</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->telepon_1}}"
                    class="form-control @if($errors->get('telepon_1')) is-invalid @endif" name="telepon_1"
                    placeholder="Telepon">
                @if($errors->get('telepon_1'))
                @foreach ($errors->get('telepon_1') as $pesan)
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
        <h4 class="card-title">Data Kepindahan</h4>
        
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Nomor Kartu Keluarga</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->nomor_kk_2}}"
                    class="form-control @if($errors->get('nomor_kk_2')) is-invalid @endif" name="nomor_kk_2"
                    placeholder="Nomor Kartu Keluarga">
                @if($errors->get('nomor_kk_2'))
                @foreach ($errors->get('nomor_kk_2') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">NIK Kepala Keluarga</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->nik_kepala_keluarga_2}}"
                    class="form-control @if($errors->get('nik_kepala_keluarga_2')) is-invalid @endif" name="nik_kepala_keluarga_2"
                    placeholder="NIK Kepala Keluarga">
                @if($errors->get('nik_kepala_keluarga_2'))
                @foreach ($errors->get('nik_kepala_keluarga_2') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Nama Kepala Keluarga</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->kepala_keluarga_2}}"
                    class="form-control @if($errors->get('kepala_keluarga_2')) is-invalid @endif" name="kepala_keluarga_2"
                    placeholder="Nama Kepala Keluarga">
                @if($errors->get('kepala_keluarga_2'))
                @foreach ($errors->get('kepala_keluarga_2') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Tanggal Pindah</label>
            <div class="col-sm-9">
                <input type="date" value="{{$data->tanggal_pindah}}"
                    class="form-control @if($errors->get('tanggal_pindah')) is-invalid @endif" name="tanggal_pindah"
                    placeholder="Tanggal Pindah">
                @if($errors->get('tanggal_pindah'))
                @foreach ($errors->get('tanggal_pindah') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->alamat_2}}"
                    class="form-control @if($errors->get('alamat_2')) is-invalid @endif" name="alamat_2"
                    placeholder="Alamat">
                @if($errors->get('alamat_2'))
                @foreach ($errors->get('alamat_2') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">RT</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->rt_2}}" class="form-control @if($errors->get('rt_2')) is-invalid @endif"
                    name="rt_2" placeholder="RT">
                @if($errors->get('rt_2'))
                @foreach ($errors->get('rt_2') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">RW</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->rw_2}}" class="form-control @if($errors->get('rw_2')) is-invalid @endif"
                    name="rw_2" placeholder="RW">
                @if($errors->get('rw_2'))
                @foreach ($errors->get('rw_2') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Dusun/ Dukuh</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->dusun_2}}"
                    class="form-control @if($errors->get('dusun_2')) is-invalid @endif" name="dusun_2"
                    placeholder="Dusun/ Dukuh">
                @if($errors->get('dusun_2'))
                @foreach ($errors->get('dusun_2') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">{{$daerah->jenis_daerah}}</label>
            <div class="col-sm-9">
                <input readonly type="text" class="form-control" value="{{$daerah->nama_daerah}}">
            </div>
        </div>
        <input type="hidden" name="desa_2" value="{{$daerah->nama_daerah}}">
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Kode Pos</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->kodepos_2}}"
                    class="form-control @if($errors->get('kodepos_2')) is-invalid @endif" name="kodepos_2"
                    placeholder="Kode Pos">
                @if($errors->get('kodepos_2'))
                @foreach ($errors->get('kodepos_2') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Telepon</label>
            <div class="col-sm-9">
                <input type="text" value="{{$data->telepon_2}}"
                    class="form-control @if($errors->get('telepon_2')) is-invalid @endif" name="telepon_2"
                    placeholder="Telepon">
                @if($errors->get('telepon_2'))
                @foreach ($errors->get('telepon_2') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Status KK (yang Pindah)</label>
            <div class="col-sm-9">
                <select name="stat_kk_pindah" class="form-control @if($errors->get('stat_kk_pindah')) is-invalid @endif"
                    required>
                    @php
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
                    <option value="{{$data->stat_kk_pindah}}">{{stat_kk($data->stat_kk_pindah)}}</option>
                    <option value="1">Numpang KK</option>
                    <option value="2">Membuat KK Baru</option>
                    <option value="3">Nomor KK Tetap</option>
                </select>
                @if($errors->get('stat_kk_pindah'))
                @foreach ($errors->get('stat_kk_pindah') as $pesan)
                <div class="invalid-feedback">
                    {{$pesan}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
        @include('v2/desa/ubah-data/keluarga')
        <div class="card-body">
            <h4 class="card-title">Berkas Lampiran</h4>
            <div class="row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Pengantar Pembuatan KTP dan KK dari Desa/Kelurahan</label>
                <div class="custom-file col-sm-9">
                    <input type="file" class="form-control @if($errors->get('buat_ktp_kk')) is-invalid @endif" name="buat_ktp_kk">
                    @if($errors->get('buat_ktp_kk'))
                        @foreach ($errors->get('buat_ktp_kk') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Form 1-31</label>
                <div class="custom-file col-sm-9">
                    <input type="file" class="form-control @if($errors->get('form_131')) is-invalid @endif" name="form_131">
                    @if($errors->get('form_131'))
                        @foreach ($errors->get('form_131') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Form 1-30</label>
                <div class="custom-file col-sm-9">
                    <input type="file" class="form-control @if($errors->get('form_130')) is-invalid @endif" name="form_130">
                    @if($errors->get('form_130'))
                        @foreach ($errors->get('form_130') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <br>
        </div>
    </div>
    @section('js')
    <script>
        $(document).ready(function () {
           
            $("#alasanInput").hide(true)
            $("#alasan").change(function () {
                var coba = $(this)
                var getText = $("#alasan option:selected")
                if (coba.val() == 7) {
                    $("#alasanInput").show(true).val(null).attr('readonly', false)
                } else {
                    $("#alasanInput").show(true).val(getText.text()).attr('readonly', true)
                }
            });
        });
    
    </script>
    <script>
        $("#hapusRow").hide(true)
        $("#add").click(function () {
            var tabel = $("#contoh").clone();
            $("table").append(tabel.val(null))
            $("#hapusRow").show(true)
            var count = $("table tr").length
            // console.log(count)
            if(count > 7){
                $("#add").hide(true)
            }
            
        });
        $("#hapusRow").click(function(){
            $("#keluarga tr:last").remove()
            var count = $("table tr").length
            if(count <3){
                $("#hapusRow").hide(true)
            }else if(count >3 && count <8){
                $("#add").show(true)
            }
        })
    
    
    </script>
    @endsection
    