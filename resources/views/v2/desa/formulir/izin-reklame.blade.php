        <div class="card-body">
            <h4 class="card-title">Detail Permohonan</h4>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Jenis Reklame</label>
                <div class="col-sm-9">
                    <select name="id_reklame" class="custom-select mr-sm-2">
                        <option selected>Pilih</option>
                        @foreach ($reklame as $reklame)
                            <option value="{{$reklame->id}}">{{$reklame->nama_reklame}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Banyak Reklame</label>
                <div class="col-sm-9">
                    <input type="number" value="{{old('banyak')}}" class="form-control @if($errors->get('banyak')) is-invalid @endif" name="banyak" placeholder="Banyak Reklame">
                    @if($errors->get('banyak'))
                        @foreach ($errors->get('banyak') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Pesan Produk</label>
                <div class="col-sm-9">
                    <input type="text" value="{{old('pesan_produk')}}" class="form-control @if($errors->get('pesan_produk')) is-invalid @endif" name="pesan_produk" placeholder="Pesan Produk">
                    @if($errors->get('pesan_produk'))
                        @foreach ($errors->get('pesan_produk') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Tempat Pemasangan</label>
                <div class="col-sm-9">
                    <input type="text" value="{{old('tempat_reklame')}}" class="form-control @if($errors->get('tempat_reklame')) is-invalid @endif" name="tempat_reklame" placeholder="Tempat Pemasangan">
                    @if($errors->get('tempat_reklame'))
                        @foreach ($errors->get('tempat_reklame') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <p class="text-center">Masa Berlaku</p>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Tanggal Awal</label>
                <div class="col-sm-9">
                    <input type="date" value="{{old('tanggal_awal')}}" name="tanggal_awal" class="form-control  @if($errors->get('tanggal_awal')) is-invalid @endif" placeholder="mm/dd/yyyy">
                     @if($errors->get('tanggal_awal'))
                        @foreach ($errors->get('tanggal_awal') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Tanggal Akhir</label>
                <div class="col-sm-9">
                    <input type="date" value="{{old('tanggal_akhir')}}" name="tanggal_akhir" class="form-control  @if($errors->get('tanggal_akhir')) is-invalid @endif" placeholder="mm/dd/yyyy">
                     @if($errors->get('tanggal_akhir'))
                        @foreach ($errors->get('tanggal_akhir') as $pesan)
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
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan NPWP</label>
                <div class="custom-file col-sm-9">
                    <input type="file" class="form-control @if($errors->get('scan_npwp')) is-invalid @endif" name="scan_npwp">
                    @if($errors->get('scan_npwp'))
                        @foreach ($errors->get('scan_npwp') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div><br>
            <div class="row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Contoh Reklame</label>
                <div class="custom-file col-sm-9">
                    <input type="file" class="form-control @if($errors->get('contoh_reklame')) is-invalid @endif" name="contoh_reklame">
                    @if($errors->get('contoh_reklame'))
                        @foreach ($errors->get('contoh_reklame') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div><br>
            <div class="row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Persetujuan Pemasangan Reklame</label>
                <div class="custom-file col-sm-9">
                    <input type="file" class="form-control @if($errors->get('scan_persetujuan')) is-invalid @endif" name="scan_persetujuan">
                    @if($errors->get('scan_persetujuan'))
                        @foreach ($errors->get('scan_persetujuan') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div><br>
            <div class="row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Izin Reklame Sebelumnya (apabila perpanjangan)</label>
                <div class="custom-file col-sm-9">
                    <input type="file" class="form-control @if($errors->get('scan_izin_lama')) is-invalid @endif" name="scan_izin_lama">
                    @if($errors->get('scan_izin_lama'))
                        @foreach ($errors->get('scan_izin_lama') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div><br>
            <div class="row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Pengantar Izin Reklame dari {{$daerah->jenis_daerah}}</label>
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
        </div><br>

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('adminbite/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

@endsection
@section('js')
<script src="{{url('adminbite/assets/libs/moment/moment.js')}}"></script>
<script src="{{url('adminbite/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
jQuery('#datepicker-autoclose').datepicker({
    autoclose: true,
    todayHighlight: true
});
jQuery('#date-range').datepicker({
    toggleActive: true
});
jQuery('#datepicker-inline').datepicker({
    todayHighlight: true
});
</script>

@endsection