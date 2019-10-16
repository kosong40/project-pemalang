<style type="text/css">
    table.disdukcapil {
        font-size: 10pt;
        width: 100%;
        /*border-collapse: collapse;*/
    }

    table.disdukcapil td {
        padding: 1px 1px 1px 3px;
    }

    table.disdukcapil td.satu {
        width: 10px;
        text-align: center;
    }

    table.disdukcapil td.padat {
        padding: 0px;
        margin: 0px;
        font-size: 9.5pt;
    }

    table.disdukcapil td.kotak {
        border: solid 1px #000000;
    }

    table.disdukcapil td.kanan {
        text-align: right;
    }

    table.disdukcapil td.tengah {
        text-align: center;
    }

    table.pengikut {
        font-size: 10pt;
        margin-top: 25px;
        border-collapse: collapse;
        border: solid 1px black;
        width: 100%;
    }

    table.pengikut td,
    th {
        border: solid 1px black;
        padding: 1px 1px 1px 3px;
    }

    table.pengikut th {
        text-align: center;
        vertical-align: middle;
    }

    table.pengikut td.tengah {
        text-align: center;
    }

    table.ttd {
        margin-top: 20px;
        width: 100%;
    }

    table.ttd td {
        text-align: center;
    }
    table tr td p{
        font-size: 13pt;
    }
</style>

@foreach ($layanan as $item)
{{-- {{dd($item )}} --}}
<body onload="window.print()">
{{-- <body> --}}
<page orientation="portrait" format="210x330" style="font-size: 10pt">
    <table align="right" style="padding: 5px 20px; border: solid 1px black;">
        <tr>
            <td><strong>F.1-36</strong></td>
        </tr>
    </table>
    <table style="margin-top: 10px;" class="disdukcapil">
        <col style="width: 26%;">
        <col span="6" style="width: 4%;">
        <col style="width: 50%;">
        <tr>
            <td>PROVINSI</td>
            <td>:</td>
            @for($i=1;$i<3;$i++) 
                <td class="kotak tengah">3</td>
            @endfor
                <td colspan=2>&nbsp;</td>
                <td class="kanan">*)</td>
                <td class="kotak">JAWA TENGAH</td>
        </tr>
        <tr>
            <td>KABUPATEN/KOTA</td>
            <td>:</td>
            {{-- @for($i=1;$i<3;$i++)  --}}
            <td class="kotak tengah">2</td>
            <td class="kotak tengah">7</td>
            {{-- @endfor --}}
                <td colspan=2>&nbsp;</td>
                <td class="kanan">*)</td>
                <td class="kotak">PEMALANG</td>
        </tr>
        <tr>
            <td>KECAMATAN</td>
            <td>:</td>
            <td class="kotak tengah">0</td>
            <td class="kotak tengah">8</td>
                <td colspan=2>&nbsp;</td>
                <td class="kanan">*)</td>
                <td class="kotak">PEMALANG</td>
        </tr>
        <tr>
            <td>DESA/KELURAHAN</td>
            <td>:</td>
            @php 
                $kode_kel = str_split($item->kode_daerah,1)
            @endphp
            @for($i=0;$i<4;$i++) 
                <td class="kotak tengah">{{$kode_kel[$i]}}</td>
            @endfor
                {{-- <td colspan=2>&nbsp;</td> --}}
            <td class="kanan">*)</td>
            <td class="kotak">{{strtoupper($item->nama_daerah)}}</td>
        </tr>
        <tr>
            <td>DUSUN/DUKUH/KAMPUNG</td>
            <td>:</td>
            <td colspan=6 class="kotak">{{Kustom::kapital($item->jalan)}}</td>
        </tr>
    </table>
    <p style="text-align: center;">
        <strong style="font-size: 12pt;">FORMULIR PERMOHONAN PINDAH WNI</strong><br>
        Antar Kabupaten/Kota atau Antar Provinsi <br>
        No. {{$item->no_sk}}
    </p>

    <table class="disdukcapil">
        <col style="width: 3%;">
        <col style="width: 24.4%;">
        <col span="22" style="width: 3.3%">
        <tr>
            <td colspan=2><strong>DATA DAERAH ASAL</strong></td>
            <td colspan=22>&nbsp;</td>
        </tr>
        <tr>
            <td>1.</td>
            <td>Nomor Kartu Keluarga</td>
            @for($i=0;$i<16;$i++) 
            <td class="kotak satu">{{str_split($item->nomor_kk,1)[$i]}}</td>
            @endfor
            <td colspan=6>&nbsp;</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Nama Kepala Keluarga</td>
            <td colspan=22 class="kotak">{{Kustom::kapital($item->kepala_keluarga)}}</td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Alamat</td>
            <td colspan=12 class="kotak">{{Kustom::kapital($item->alamat_1)}}</td>
            <td colspan=2 style="text-align: center;">RT</td>
            @if(Kustom::lengthRTRW($item->rt_1) == 1)
            <td class="kotak satu">0</td>
            <td class="kotak satu">0</td>
            <td class="kotak satu">{{$item->rt_1}}</td>
            @elseif(Kustom::lengthRTRW($item->rt_1) == 2)
            <td class="kotak satu">0</td>
            <td class="kotak satu">{{str_split($item->rt_1,1)[0]}}</td>
            <td class="kotak satu">{{str_split($item->rt_1,1)[1]}}</td>
            @else
            <td class="kotak satu">{{str_split($item->rt_1,1)[0]}}</td>
            <td class="kotak satu">{{str_split($item->rt_1,1)[1]}}</td>
            <td class="kotak satu">{{str_split($item->rt_1,1)[2]}}</td>
            @endif
            <td colspan=2 style="text-align: center;">RW</td>
            @if(Kustom::lengthRTRW($item->rw_1) == 1)
            <td class="kotak satu">0</td>
            <td class="kotak satu">0</td>
            <td class="kotak satu">{{$item->rw_1}}</td>
            @elseif(Kustom::lengthRTRW($item->rw_1) == 2)
            <td class="kotak satu">0</td>
            <td class="kotak satu">{{str_split($item->rw_1,1)[0]}}</td>
            <td class="kotak satu">{{str_split($item->rw_1,1)[1]}}</td>
            @else
            <td class="kotak satu">{{str_split($item->rw_1,1)[0]}}</td>
            <td class="kotak satu">{{str_split($item->rw_1,1)[1]}}</td>
            <td class="kotak satu">{{str_split($item->rw_1,1)[2]}}</td>
            @endif
        </tr>

        <tr>
            <td colspan=2>&nbsp;</td>
            <td colspan=7>Dusun/Dukuh/Kampung</td>
            <td colspan=15 class="kotak">{{Kustom::kapital($item->dusun_1)}}</td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>a. Desa/Kelurahan</td>
            <td colspan=8 class="kotak">{{Kustom::kapital($item->nama_daerah)}}</td>
            <td colspan=4>c. Kab/Kota</td>
            <td colspan=10 class="kotak">{{Kustom::kapital("Kabupaten Pemalang")}}</td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>b. Kecamatan</td>
            <td colspan=8 class="kotak">{{Kustom::kapital("pemalang")}}</td>
            <td colspan=4 class="tengah">d. Provinsi</td>
            <td colspan=10 class="kotak">{{Kustom::kapital("Jawa tengah")}}</td>
        </tr>

        <tr>
            <td colspan=2>&nbsp;</td>
            <td colspan=3>Kode Pos</td>
            @for($i=0;$i<5;$i++)
            <td class="kotak satu">
                {{Kustom::stoa($item->kodepos_1)[$i]}}
            </td>
            @endfor
            <td colspan=4 class="tengah">Telepon</td>
            @for($i=0;$i<10;$i++)
            <td class="kotak satu">
                {{Kustom::noTelp($item->telepon_1)[$i]}}
            </td>
            @endfor
        </tr>

        <tr>
            <td>4.</td>
            <td>NIK Pemohon</td>
            @for($i=0;$i<16;$i++)
            <td class="kotak satu">
                {{Kustom::stoa($item->nik)[$i]}}
            </td>
            @endfor
            <td colspan=6>&nbsp;</td>
        </tr>

        <tr>
            <td>5.</td>
            <td>Nama Lengkap</td>
            <td colspan=22 class="kotak">{{$item->nama}}</td>
        </tr>
        <tr>
            <td colspan=24>&nbsp;</td>
        </tr>
        <tr>
            <td colspan=2><strong>DATA KEPINDAHAN</strong></td>
            <td colspan=22>&nbsp;</td>
        </tr>

        <tr>
            <td rowspan="2">1.</td>
            <td rowspan="2">Alasan Pindah</td>
        <td rowspan="2" class="kotak satu">{{Kustom::exp($item->alasan)[0]}}</td>
            <td rowspan="2">&nbsp;</td>
            <td colspan=4 class="padat">1. Pekerjaan</td>
            <td colspan=4 class="padat">3. Keamanan</td>
            <td colspan=4 class="padat">5. Perumahan</td>
            <td colspan=8 class="padat">7. Lainnya (sebutkan)</td>

        </tr>

        <tr>
            <td colspan=4 class="padat">2. Pendidikan</td>
            <td colspan=4 class="padat">4. Kesehatan</td>
            <td colspan=4 class="padat">6. Keluarga</td>
            <td colspan=8 class="padat">
            @if(Kustom::exp($item->alasan)[0] != 7)
                .........................
            @else
                &nbsp;&nbsp;&nbsp;&nbsp;<u>{{Kustom::exp($item->alasan)[1]}}</u>
            @endif
            </td>
        </tr>

        <tr>
            <td>3.</td>
            <td>Alamat Tujuan Pindah</td>
            <td colspan=12 class="kotak">{{Kustom::kapital($item->alamat_2)}}</td>
            <td colspan=2 style="text-align: center;">RT</td>
            @if(Kustom::lengthRTRW($item->rt_2) == 1)
            <td class="kotak satu">0</td>
            <td class="kotak satu">0</td>
            <td class="kotak satu">{{$item->rt_2}}</td>
            @elseif(Kustom::lengthRTRW($item->rt_2) == 2)
            <td class="kotak satu">0</td>
            <td class="kotak satu">{{str_split($item->rt_2,1)[0]}}</td>
            <td class="kotak satu">{{str_split($item->rt_2,1)[1]}}</td>
            @else
            <td class="kotak satu">{{str_split($item->rt_2,1)[0]}}</td>
            <td class="kotak satu">{{str_split($item->rt_2,1)[1]}}</td>
            <td class="kotak satu">{{str_split($item->rt_2,1)[2]}}</td>
            @endif
            <td colspan=2 style="text-align: center;">RW</td>
            @if(Kustom::lengthRTRW($item->rw_2) == 1)
            <td class="kotak satu">0</td>
            <td class="kotak satu">0</td>
            <td class="kotak satu">{{$item->rw_2}}</td>
            @elseif(Kustom::lengthRTRW($item->rw_2) == 2)
            <td class="kotak satu">0</td>
            <td class="kotak satu">{{str_split($item->rw_2,1)[0]}}</td>
            <td class="kotak satu">{{str_split($item->rw_2,1)[1]}}</td>
            @else
            <td class="kotak satu">{{str_split($item->rw_2,1)[0]}}</td>
            <td class="kotak satu">{{str_split($item->rw_2,1)[1]}}</td>
            <td class="kotak satu">{{str_split($item->rw_2,1)[2]}}</td>
            @endif
        </tr>

        <tr>
            <td colspan=2>&nbsp;</td>
            <td colspan=7>Dusun/Dukuh/Kampung</td>
            <td colspan=15 class="kotak">{{Kustom::kapital($item->dusun_2)}}</td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>a. Desa/Kelurahan</td>
            <td colspan=8 class="kotak">{{Kustom::exp($item->desa_2)[1]}}</td>
            <td colspan=4>c. Kab/Kota</td>
            <td colspan=10 class="kotak">{{Kustom::exp($item->kabupaten_2)[1]}}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>b. Kecamatan</td>
            <td colspan=8 class="kotak">{{Kustom::exp($item->kecamatan_2)[1]}}</td>
            <td colspan=4>d. Provinsi</td>
            <td colspan=10 class="kotak">{{Kustom::exp($item->provinsi_2)[1]}}</td>
        </tr>
        <tr>
            <td colspan=2>&nbsp;</td>
            <td colspan=3>Kode Pos</td>
            @for($i=0;$i<5;$i++)
            <td class="kotak satu">
                {{Kustom::stoa($item->kodepos_2)[$i]}}
            </td>
            @endfor
            <td colspan=4 class="tengah">Telepon</td>
            @for($i=0;$i<10;$i++)
            <td class="kotak satu">
                {{Kustom::noTelp($item->telepon_2)[$i]}}
            </td>
            @endfor
        </tr>

        <tr>
            <td rowspan="2">3.</td>
            <td rowspan="2">Jenis Kepindahan</td>
            <td rowspan="2" class="kotak satu">{{$item->jenis_pindah}}</td>
            <td colspan=11 class="padat">1. Kep. Keluarga</td>
            <td colspan=10 class="padat">3. Kep. Keluarga dan Sbg. Angg. Keluarga</td>
        </tr>
        <tr>
            <td colspan=11 class="padat">2. Kep. Keluarga dan Seluruh Angg. Keluarga</td>
            <td colspan=10 class="padat">4. Angg. Keluarga</td>
        </tr>

        <tr>
            <td valign="top">4.</td>
            <td>Status KK <br> Bagi Yang Tidak Pindah</td>
            <td class="kotak satu">{{$item->stat_kk_nonpindah}}</td>
            <td colspan=5 class="padat">1. Numpang KK</td>
            <td colspan=6 class="padat">2. Membuat KK Baru</td>
            <td colspan=7 class="padat">3. Nomor KK Tetap</td>
        </tr>

        <tr>
            <td valign="top">5.</td>
            <td>Status KK <br> Bagi Yang Pindah</td>
            <td class="kotak satu">{{$item->stat_kk_pindah}}</td>
            <td colspan=5 class="padat">1. Numpang KK</td>
            <td colspan=6 class="padat">2. Membuat KK Baru</td>
            <td colspan=7 class="padat">3. Nomor KK Tetap</td>
        </tr>
        <tr>
            <td>6.</td>
            <td>Keluarga Yang Pindah</td>
            <td colspan=20>&nbsp;</td>
        </tr>
    </table>

    <table class="pengikut">
        <tr>
            <th style="width: 5%">NO.</th>
            <th style="width: 35%" colspan=16>NIK</th>
            <th style="width: 33%">NAMA</th>
            <th style="width: 17%">MASA BERLAKU KTP S/D</th>
            <th style="width: 10%" colspan=2>SHDK</th>
        </tr>
    @php 
        $nik = Kustom::exp($item->nik_kel);
        $nama = Kustom::exp($item->nama_kel);
        $masa = Kustom::exp($item->masa_kel);
        $shdk = Kustom::exp($item->shdk);
        $pjg = count($nik);
        $panjang = 7- $pjg;
        for($i=0;$i<$panjang;$i++){
            array_push($nik,null);
            array_push($nama,null);
            array_push($masa,null);
            array_push($shdk,null);
        }
    @endphp
@for($j=0;$j<7;$j++)
        <tr>
        <td class="tengah">&nbsp;{{$j+1}}</td>
        @php 
            // echo dd(Kustom::stoa($nik[0])[5]);
        @endphp
        @if($j < count(Kustom::exp($item->nik_kel)))
            @for($i=0;$i<16;$i++)
            <td class="tengah">
                {{Kustom::stoa($nik[$j])[$i]}}
            </td>
        @endfor
        @else
        @for($i=0;$i<16;$i++)
        <td class="tengah">
        </td>
        @endfor
        @endif
        
            <td class="tengah">
                {{$nama[$j]}}
            </td>

            <td class="tengah">
                {{$masa[$j]}}
            </td>
            <td class="tengah">
                {{Kustom::shdk($shdk[$j])}}
            </td>

        </tr>
    @endfor
    </table>

    <table class="ttd">
        <col style="width:35%">
        <col style="width:30%">
        <col style="width:35%">

        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>
                <p align="center" style="font-size:10pt">
                    Pemalang, {{Kustom::getTanggal(date('d-m-Y'))}}
                </p>
            </td>
        </tr>
        <tr>
            <td>Petugas Registrasi </td>
            <td></td>
            <td>Pemohon</td>
        </tr>
        <tr style="font-size: 13mm; line-height: normal;">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>(........................................)</td>
            <td></td>
            <td>{{$item->nama}}</td>
        </tr>
    </table>
    <p>
        <strong>Keterangan:</strong><br>
        *) Diisi Oleh Petugas <br>
        - Formulir ini diisi di Kecamatan <br>
        - Lembar 1 dibawa oleh pemohon dan diarsipkan di Dinas Kependudukan dan Pencatatan Sipil <br>
        - Lembar 2 untuk pemohon <br>
        - Lembar 3 diarsipkan di Kecamatan <br>
    </p>

</page>
  
<page orientation="portrait" format="210x330" style="font-size: 10pt;" >
    <div class="page-2" style="padding: 1cm 2cm 2cm 2cm">
        <br><br><br><br>
        <table align="right" style="padding: 5px 20px; border: solid 1px black;">
            <tr>
                <td><strong>F.1-35</strong></td>
            </tr>
        </table>
        <br><br><br><br>
        <h2 align="center" style="margin:0;">SURAT PENGANTAR PINDAH</h2>
        <h2 align="center" style="margin:0;"><u>ANTAR KABUPATEN/KOTA ATAU ANTAR PROVINSI</u></h2>
        <h2 align="center" style="margin:0;font-weight:normal">Nomor: {{$item->no_sk}}</h2><br><br>
        <p align="justify" style="font-size: 13pt">
            Yang bertanda tangan dibawah ini, menerangkan Permohonan Pindah Penduduk WNI dengan data sebagai berikut:
        </p>
        <br><br>
        <table>
            <tr>
                <td valign="top">
                    <p>1.</p>
                </td>
                <td valign="top" style="width:40%">
                    <p>NIK</p>
                </td>
                <td valign="top">
                    <p>:</p>
                </td>
                <td>
                    <p>{{$item->nik}}</p>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <p>2.</p>
                </td>
                <td valign="top">
                    <p>Nama Lengkap</p>
                </td>
                <td valign="top">
                    <p>:</p>
                </td>
                <td>
                <p>{{Kustom::kapital($item->nama)}}</p>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <p>3.</p>
                </td>
                <td valign="top">
                    <p>Nomor Kartu Keluarga</p>
                </td>
                <td valign="top">
                    <p>:</p>
                </td>
                <td>
                    <p>{{$item->nomor_kk}}</p>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <p>4.</p>
                </td>
                <td valign="top">
                    <p>Nama Kepala Keluarga</p>
                </td>
                <td valign="top">
                    <p>:</p>
                </td>
                <td>
                    <p>{{Kustom::kapital($item->kepala_keluarga)}}</p>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <p>5.</p>
                </td>
                <td valign="top">
                    <p>Alamat Sekarang</p>
                </td>
                <td valign="top">
                    <p>:</p>
                </td>
                <td>
                    <p><p>{{Kustom::kapital($item->alamat_1) ." RT: $item->rt_2 RW: $item->rw_2 DUSUN ". Kustom::kapital($item->dusun_1) ." DESA ". Kustom::kapital($item->nama_daerah)." KECAMATAN PEMALANG KABUPATEN PEMALANG PROVINSI JAWA TENGAH"}}</p></p>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <p>6.</p>
                </td>
                <td valign="top">
                    <p>Alamat Tujuan</p>
                </td>
                <td valign="top">
                    <p>:</p>
                </td>
                <td>
                    <p>{{Kustom::kapital($item->alamat_2) ." RT: $item->rt_2 RW: $item->rw_2 DUSUN ". Kustom::kapital($item->dusun_2) ." DESA ". Kustom::exp($item->desa_2)[1]." KECAMATAN ".Kustom::exp($item->kecamatan_2)[1]." ".Kustom::exp($item->kabupaten_2)[1]." PROVINSI ".Kustom::exp($item->provinsi_2)[1]}}</p>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <p>7.</p>
                </td>
                <td valign="top">
                    <p>Jumlah Keluarga Yang Pindah</p>
                </td>
                <td valign="top">
                    <p>:</p>
                </td>
                <td>
                    <p>{{$pjg}} Orang</p>
                </td>
            </tr>
        </table>
        <br><br>
        <p style="font-size:13pt" align="justify">
            Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir.
        </p>
        <p style="font-size:13pt;text-indent: 60px;" align="justify">
            Demikian Surat Pengantar Pindah ini dibuat agar digunakan sebagaimana mestinya.
        </p>
        <br><br><br>
        <table class="ttd">
            <col style="width:35%">
            <col style="width:30%">
            <col style="width:35%">
    
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <p align="center">
                        Pemalang, {{Kustom::getTanggal(date('d-m-Y'))}}
                    </p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><p>Mengetahui</p></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>CAMAT PEMALANG</td>
            </tr>
            <tr style="font-size: 23mm; line-height: normal;">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>__________________________</td>
            </tr>
        </table>
    </div>
</page>
</body>
@endforeach