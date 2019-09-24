<div class="card-body">
    <h4 class="card-title">Detail Daerah Asal</h4>
    <input type="hidden" name="sublayanan_id" value="{{$sublayanan->id}}">
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Nomor Kartu Keluarga</label>
        <div class="col-sm-9">
            <input type="text" value="{{old('nomor_kk')}}"
                class="form-control @if($errors->get('nomor_kk')) is-invalid @endif" name="nomor_kk"
                placeholder="Nomor Kartu Keluarga">
            @if($errors->get('nomor_kk'))
            @foreach ($errors->get('nomor_kk') as $pesan)
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
            <input type="text" value="{{old('kepala_keluarga')}}"
                class="form-control @if($errors->get('kepala_keluarga')) is-invalid @endif" name="kepala_keluarga"
                placeholder="Nama Kepala Keluarga">
            @if($errors->get('kepala_keluarga'))
            @foreach ($errors->get('kepala_keluarga') as $pesan)
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
            <input type="text" value="{{old('alamat_1')}}"
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
            <input type="text" value="{{old('rt_1')}}" class="form-control @if($errors->get('rt_1')) is-invalid @endif"
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
            <input type="text" value="{{old('rw_1')}}" class="form-control @if($errors->get('rw_1')) is-invalid @endif"
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
            <input type="text" value="{{old('dusun_1')}}"
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
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">{{$daerah->jenis_daerah}}</label>
        <div class="col-sm-9">
            <input readonly type="text" class="form-control" nama="desa_1" value="{{$daerah->nama_daerah}}"
                placeholder="{{$daerah->jenis_daerah}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Kode Pos</label>
        <div class="col-sm-9">
            <input type="text" value="{{old('kodepos_1')}}"
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
            <input type="text" value="{{old('telepon_1')}}"
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
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Alasan Pindah</label>
        <div class="col-sm-9">
            <select id="alasan" name="alasan[]" class="form-control @if($errors->get('alasan')) is-invalid @endif"
                required>
                <option selected>Pilih</option>
                <option value="1">Pekerjaan</option>
                <option value="2">Pendidikan</option>
                <option value="3">Keamanan</option>
                <option value="4">Kesehatan</option>
                <option value="5">Perumahan</option>
                <option value="6">Keluarga</option>
                <option value="7">Lainnya</option>
            </select>
            <input type="text" value="{{old('alasan')}}"
                class="mt-3 form-control @if($errors->get('alasan')) is-invalid @endif" name="alasan[]"
                placeholder="Alasan" id="alasanInput">
            @if($errors->get('alasan'))
            @foreach ($errors->get('alasan') as $pesan)
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
            <input type="text" value="{{old('alamat_2')}}"
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
            <input type="text" value="{{old('rt_2')}}" class="form-control @if($errors->get('rt_2')) is-invalid @endif"
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
            <input type="text" value="{{old('rw_2')}}" class="form-control @if($errors->get('rw_2')) is-invalid @endif"
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
            <input type="text" value="{{old('dusun_2')}}"
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
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Desa / Kelurahan</label>
        <div class="col-sm-9">
            <input type="text" value="{{old('desa_2')}}"
            class="form-control @if($errors->get('desa_2')) is-invalid @endif" name="desa_2"
            placeholder="Desa / Kelurahan">
            @if($errors->get('desa_2'))
            @foreach ($errors->get('desa_2') as $pesan)
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
            <input type="text" value="{{old('kecamatan_2')}}"
            class="form-control @if($errors->get('kecamatan_2')) is-invalid @endif" name="kecamatan_2"
            placeholder="Kecamatan">
            @if($errors->get('kecamatan_2'))
            @foreach ($errors->get('kecamatan_2') as $pesan)
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
            <input type="text" value="{{old('kodepos_2')}}"
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
            <input type="text" value="{{old('telepon_2')}}"
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
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Jenis Kepindahan</label>
        <div class="col-sm-9">
            <select name="jenis_pindah" class="form-control @if($errors->get('jenis_pindah')) is-invalid @endif"
                required>
                <option selected>Pilih</option>
                <option value="1">Kep. Keluarga</option>
                <option value="2">Kep. Keluarga dan Seluruh Anggota Keluarga</option>
                <option value="3">Kep. Keluarga dan Sebagian Anggota Keluarga</option>
                <option value="4">Anggota Keluarga</option>
            </select>
            @if($errors->get('jenis_pindah'))
            @foreach ($errors->get('jenis_pindah') as $pesan)
            <div class="invalid-feedback">
                {{$pesan}}
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Status KK (yang Tidak
            Pindah)</label>
        <div class="col-sm-9">
            <select name="stat_kk_nonpindah"
                class="form-control @if($errors->get('stat_kk_nonpindah')) is-invalid @endif" required>
                <option selected>Pilih</option>
                <option value="1">Numpang KK</option>
                <option value="2">Membuat KK Baru</option>
                <option value="3">Nomor KK Tetap</option>
            </select>
            @if($errors->get('stat_kk_nonpindah'))
            @foreach ($errors->get('stat_kk_nonpindah') as $pesan)
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
                <option selected>Pilih</option>
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
    @include('v2/desa/formulir/keluarga')
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
        </div>
        <br>
        <div class="row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Surat Pengantar RT/RW</label>
            <div class="custom-file col-sm-9">
                <input type="file" class="form-control @if($errors->get('scan_pengantar_rt')) is-invalid @endif" name="scan_pengantar_rt">
                @if($errors->get('scan_pengantar_rt'))
                    @foreach ($errors->get('scan_pengantar_rt') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Form 1-29  </label>
            <div class="custom-file col-sm-9">
                <input type="file" class="form-control @if($errors->get('form_129')) is-invalid @endif" name="form_129">
                @if($errors->get('form_129'))
                    @foreach ($errors->get('form_129') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <br>
    
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
