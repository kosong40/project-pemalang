        <div class="card-body">
            <h4 class="card-title">Detail Permohonan</h4>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Keperluan Bangunan</label>
                <div class="col-sm-9">
                    <input type="text" value="{{old('keperluan_bangunan')}}" class="form-control @if($errors->get('keperluan_bangunan')) is-invalid @endif" name="keperluan_bangunan" placeholder="Keperluan Bangunan">
                    @if($errors->get('keperluan_bangunan'))
                        @foreach ($errors->get('keperluan_bangunan') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Konstruksi Bangunan</label>
                <div class="col-sm-9">
                    <input type="text" value="{{old('konstruksi_bangunan')}}" class="form-control @if($errors->get('konstruksi_bangunan')) is-invalid @endif" name="konstruksi_bangunan" placeholder="Konstruksi Bangunan">
                    @if($errors->get('konstruksi_bangunan'))
                        @foreach ($errors->get('konstruksi_bangunan') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Letak Bangunan</label>
                <div class="col-sm-9">
                    <input type="text" value="{{old('letak_bangunan')}}" class="form-control @if($errors->get('letak_bangunan')) is-invalid @endif" name="letak_bangunan" placeholder="Letak Bangunan">
                    @if($errors->get('letak_bangunan'))
                        @foreach ($errors->get('letak_bangunan') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Luas Bangunan</label>
                <div class="col-sm-9 input-group mb-3">
                    <input type="text" value="{{old('luas_bangunan')}}" class="form-control @if($errors->get('luas_bangunan')) is-invalid @endif" name="luas_bangunan" placeholder="Luas Bangunan">
                    @if($errors->get('luas_bangunan'))
                        @foreach ($errors->get('luas_bangunan') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                    <div class="input-group-append">
                        <span class="input-group-text" >M <sup>2</sup></span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Luas Tanah</label>
                <div class="col-sm-9 input-group mb-3">
                    <input type="text" value="{{old('luas_tanah')}}" class="form-control @if($errors->get('luas_tanah')) is-invalid @endif" name="luas_tanah" placeholder="Luas Tanah">
                    @if($errors->get('luas_tanah'))
                        @foreach ($errors->get('luas_tanah') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                    <div class="input-group-append">
                        <span class="input-group-text" >M <sup>2</sup></span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Pemilik Tanah</label>
                <div class="col-sm-9">
                    <input type="text" value="{{old('tanah_milik')}}" class="form-control @if($errors->get('tanah_milik')) is-invalid @endif" name="tanah_milik" placeholder="Pemilik Tanah">
                    @if($errors->get('tanah_milik'))
                        @foreach ($errors->get('tanah_milik') as $pesan)
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
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Persetujuan Tetangga</label>
                <div class="custom-file col-sm-9">
                    <input type="file" class="form-control @if($errors->get('scan_persetujuan_tetangga')) is-invalid @endif" name="scan_persetujuan_tetangga">
                    @if($errors->get('scan_persetujuan_tetangga'))
                        @foreach ($errors->get('scan_persetujuan_tetangga') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div><br>
            <div class="row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Bukti Kepemilikan Tanah</label>
                <div class="custom-file col-sm-9">
                    <input type="file" class="form-control @if($errors->get('scan_fc_kepemilikan_tanah')) is-invalid @endif" name="scan_fc_kepemilikan_tanah">
                    @if($errors->get('scan_fc_kepemilikan_tanah'))
                        @foreach ($errors->get('scan_fc_kepemilikan_tanah') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div><br>
            <div class="row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan SPPT PBB Tahun Terakhir</label>
                <div class="custom-file col-sm-9">
                    <input type="file" class="form-control @if($errors->get('scan_fc_sppt_pbb_terakhir')) is-invalid @endif" name="scan_fc_sppt_pbb_terakhir">
                    @if($errors->get('scan_fc_sppt_pbb_terakhir'))
                        @foreach ($errors->get('scan_fc_sppt_pbb_terakhir') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div><br>
            <div class="row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Gambar Rencana Bangunan</label>
                <div class="custom-file col-sm-9">
                    <input type="file" class="form-control @if($errors->get('scan_gambar_rencana')) is-invalid @endif" name="scan_gambar_rencana">
                    @if($errors->get('scan_gambar_rencana'))
                        @foreach ($errors->get('scan_gambar_rencana') as $pesan)
                            <div class="invalid-feedback">
                                {{$pesan}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div><br>
            <div class="row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Scan Pengantar IMB dari {{$daerah->jenis_daerah}}</label>
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
