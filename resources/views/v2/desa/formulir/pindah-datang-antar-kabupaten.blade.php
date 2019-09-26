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
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Provinsi</label>
        <div class="col-sm-9">
            <select id="provinsi" name="provinsi_1[]" class="select2 form-control @if($errors->get('provinsi_1')) is-invalid @endif"
                required style="width: 100%; height:36px;">
                <option value="">Pilih Provinsi</option>
            </select>
            @if($errors->get('provinsi_1'))
            @foreach ($errors->get('provinsi_1') as $pesan)
            <div class="invalid-feedback">
                {{$pesan}}
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Kabupaten/Kota</label>
        <div class="col-sm-9">
            <select id="kabupaten" name="kabupaten_1[]" class="select2 form-control @if($errors->get('kabupaten_1')) is-invalid @endif"
                required style="width: 100%; height:36px;">
                <option value="">Pilih Kabupaten/Kota</option>
            </select>
            @if($errors->get('kabupaten_1'))
            @foreach ($errors->get('kabupaten_1') as $pesan)
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
            <select id="kecamatan" name="kecamatan_1[]" class="select2 form-control @if($errors->get('kecamatan_1')) is-invalid @endif"
                required  style="width: 100%; height:36px;">
                <option value="">Pilih Kecamatan</option>
            </select>
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
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Desa/Kelurahan</label>
        <div class="col-sm-9" >
            <select id="desa" name="desa_1[]" class="select2 form-control @if($errors->get('desa_1')) is-invalid @endif"
                required  style="width: 100%; height:36px;">
                <option value="">Pilih Desa/Kelurahan</option>
            </select>
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
        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">{{$daerah->jenis_daerah}}</label>
        <div class="col-sm-9">
            {{-- <input type="text" value="{{old('desa_2')}}"
                class="form-control @if($errors->get('desa_2')) is-invalid @endif" name="desa_2" placeholder="Desa"> --}}
            <select name="desa_2" class="form-control">
                <option>Pilih</option>
                @foreach ($daerahs as $item)
                    <option value="{{$item->nama_daerah}}">{{$item->nama_daerah}}</option>
                @endforeach
            </select>
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
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Surat Keterangan Pindah WNI</label>
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
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Form 1-38</label>
            <div class="custom-file col-sm-9">
                <input type="file" class="form-control @if($errors->get('form_138')) is-invalid @endif" name="form_138">
                @if($errors->get('form_138'))
                    @foreach ($errors->get('form_138') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Form 1-39</label>
            <div class="custom-file col-sm-9">
                <input type="file" class="form-control @if($errors->get('form_139')) is-invalid @endif" name="form_139">
                @if($errors->get('form_139'))
                    @foreach ($errors->get('form_139') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Surat Nikah (Apabila ada perubahan)</label>
            <div class="custom-file col-sm-9">
                <input type="file" class="form-control @if($errors->get('scan_surat_nikah')) is-invalid @endif" name="scan_surat_nikah">
                @if($errors->get('scan_surat_nikah'))
                    @foreach ($errors->get('scan_surat_nikah') as $pesan)
                        <div class="invalid-feedback">
                            {{$pesan}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan SKCK (Apabila dipersyaratkan oleh daerah tujuan)</label>
            <div class="custom-file col-sm-9">
                <input type="file" class="form-control @if($errors->get('scan_skck')) is-invalid @endif" name="scan_skck">
                @if($errors->get('scan_skck'))
                    @foreach ($errors->get('scan_skck') as $pesan)
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
<input type="hidden" name="provinsi_1[]" id="input_prov">
<input type="hidden" name="kabupaten_1[]" id="input_kab">
<input type="hidden" name="kecamatan_1[]" id="input_kec">
<input type="hidden" name="desa_1[]" id="input_desa">
@section('js')
<script src="{{url('js/axios.js')}}"></script>
<script src="{{url('adminbite/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{url('adminbite/assets/libs/select2/dist/js/select2.min.js')}}"></script>
<script src="{{url('adminbite/dist/js/pages/forms/select2/select2.init.js')}}"></script>
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
    <script>
    $(function(){
        var urlProv = "{{url('json/propinsi.json')}}";
        axios.get(urlProv).then(function(response){
            for(i=0;i<response.data.length;i++){
                $("#provinsi").append("<option value='"+response.data[i].id+"'>"+response.data[i].nama+"</option>")
            }
        });
        $("#provinsi").on('change',function(){
            var idProv = $("#provinsi option:selected").val();
            var urlKab = "{{url('json/kabupaten')}}/"+idProv+".json";
            $("#input_prov").val($("#provinsi option:selected").text())
            $("#kabupaten").empty();
            $("#kecamatan").empty();
            $("#desa").empty();
            axios.get(urlKab).then(function(response){
                for(i=0;i<response.data.length;i++){
                    $("#kabupaten").append("<option value='"+response.data[i].id+"'>"+response.data[i].nama+"</option>")
                }
            });
            $("#kabupaten").on('change',function(){
                var idKab = $("#kabupaten option:selected").val();
                var urlKec = "{{url('json/kecamatan')}}/"+idKab+".json";
                $("#input_kab").val($("#kabupaten option:selected").text())
                $("#kecamatan").empty();
                $("#desa").empty();
                axios.get(urlKec).then(function(response){
                    for(i=0;i<response.data.length;i++){
                        $("#kecamatan").append("<option value='"+response.data[i].id+"'>"+response.data[i].nama+"</option>")
                    }
                });
                $("#kecamatan").on('change',function(){
                    var idKec = $("#kecamatan option:selected").val();
                    var urlDesa = "{{url('json/kelurahan')}}/"+idKec+".json";
                    $("#input_kec").val($("#kecamatan option:selected").text())
                    $("#desa").empty();
                    axios.get(urlDesa).then(function(response){
                        for(i=0;i<response.data.length;i++){
                            $("#desa").append("<option value='"+response.data[i].id+"'>"+response.data[i].nama+"</option>")
                        }
                    });
                    $("#desa").on('change',function(){
                        $("#input_desa").val($("#desa option:selected").text())
                    });
                });
            });
        });
    })
</script>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('adminbite/assets/libs/select2/dist/css/select2.min.css')}}">
@endsection
