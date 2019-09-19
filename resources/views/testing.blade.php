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
</style>

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
            @for($i=1;$i<3;$i++) <td class="kotak tengah">
                </td>
                @endfor
                <td colspan=2>&nbsp;</td>
                <td class="kanan">*)</td>
                <td class="kotak"></td>
        </tr>
        <tr>
            <td>KABUPATEN/KOTA</td>
            <td>:</td>
            @for($i=1;$i<3;$i++) <td class="kotak tengah">
                </td>
                @endfor
                <td colspan=2>&nbsp;</td>
                <td class="kanan">*)</td>
                <td class="kotak"></td>
        </tr>
        <tr>
            <td>KECAMATAN</td>
            <td>:</td>
            @for($i=1;$i<3;$i++) <td class="kotak tengah">
                </td>
                @endfor
                <td colspan=2>&nbsp;</td>
                <td class="kanan">*)</td>
                <td class="kotak"></td>
        </tr>
        <tr>
            <td>DESA/KELURAHAN</td>
            <td>:</td>
            @for($i=0;$i<4;$i++) <td class="kotak tengah">
                </td>
                @endfor
                {{-- <td colspan=2>&nbsp;</td> --}}
                <td class="kanan">*)</td>
                <td class="kotak"></td>
        </tr>
        <tr>
            <td>DUSUN/DUKUH/KAMPUNG</td>
            <td>:</td>
            <td colspan=6 class="kotak"></td>
        </tr>
    </table>
    <p style="text-align: center;">
        <strong style="font-size: 12pt;">FORMULIR PERMOHONAN PINDAH WNI</strong><br>
        Antar Kabupaten/Kota atau Antar Provinsi <br>
        No. .................................
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
            @for($i=0;$i<16;$i++) <td class="kotak satu">
                &nbsp;
                </td>
                @endfor
                <td colspan=6>&nbsp;</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Nama Kepala Keluarga</td>
            <td colspan=22 class="kotak"></td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Alamat</td>
            <td colspan=12 class="kotak"></td>
            <td colspan=2 style="text-align: center;">RT</td>
            @for($i=0;$i<3;$i++) <td class="kotak satu">

                </td>
                @endfor
                <td colspan=2 style="text-align: center;">RW</td>
                @for($i=0;$i<3;$i++) <td class="kotak satu">

                    </td>
                    @endfor
        </tr>

        <tr>
            <td colspan=2>&nbsp;</td>
            <td colspan=7>Dusun/Dukuh/Kampung</td>
            <td colspan=15 class="kotak"></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>a. Desa/Kelurahan</td>
            <td colspan=8 class="kotak"></td>
            <td colspan=4>c. Kab/Kota</td>
            <td colspan=10 class="kotak"></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>b. Kecamatan</td>
            <td colspan=8 class="kotak"></td>
            <td colspan=4>d. Provinsi</td>
            <td colspan=10 class="kotak"></td>
        </tr>

        <tr>
            <td colspan=2>&nbsp;</td>
            <td colspan=3>Kode Pos</td>
@for($i=0;$i<5;$i++)
            <td class="kotak satu">

            </td>
            @endfor
            <td colspan=4>Telepon</td>
            @for($i=0;$i<10;$i++)
            <td class="kotak satu">

            </td>
            @endfor
        </tr>

        <tr>
            <td>4.</td>
            <td>NIK Pemohon</td>
            @php 
                $nik = str_split("3307120112960005",1);
            @endphp
            @for($i=0;$i<16;$i++)
            <td class="kotak satu">
                {{$nik[$i]}}
            </td>
            @endfor
            <td colspan=6>&nbsp;</td>
        </tr>

        <tr>
            <td>5.</td>
            <td>Nama Lengkap</td>
            <td colspan=22 class="kotak"></td>
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
            <td rowspan="2" class="kotak satu"></td>
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
                    .........................
            </td>
        </tr>

        <tr>
            <td>2.</td>
            <td>Alamat Tujuan Pindah</td>
            <td colspan=12 class="kotak"></td>
            <td colspan=2 style="text-align: center;">RT</td>

            @for($i=0;$i<3;$i++)
            <td class="kotak satu">

            </td>
            @endfor
            <td colspan=2 style="text-align: center;">RW</td>
            @for($i=0;$i<3;$i++)
            <td class="kotak satu">

            </td>
            @endfor
        </tr>

        <tr>
            <td colspan=2>&nbsp;</td>
            <td colspan=7>Dusun/Dukuh/Kampung</td>
            <td colspan=15 class="kotak"></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>a. Desa/Kelurahan</td>
            <td colspan=8 class="kotak"></td>
            <td colspan=4>c. Kab/Kota</td>
            <td colspan=10 class="kotak"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>b. Kecamatan</td>
            <td colspan=8 class="kotak"></td>
            <td colspan=4>d. Provinsi</td>
            <td colspan=10 class="kotak"></td>
        </tr>
        <tr>
            <td colspan=2>&nbsp;</td>
            <td colspan=3>Kode Pos</td>
            @for($i=0;$i<5;$i++)
            <td class="kotak satu">

            </td>
            @endfor
            <td colspan=4>Telepon</td>
            @for($i=0;$i<10;$i++)
            <td class="kotak satu">

            </td>
            @endfor
        </tr>

        <tr>
            <td rowspan="2">3.</td>
            <td rowspan="2">Jenis Kepindahan</td>
            <td rowspan="2" class="kotak satu"></td>
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
            <td class="kotak satu"></td>
            <td colspan=5 class="padat">1. Numpang KK</td>
            <td colspan=6 class="padat">2. Membuat KK Baru</td>
            <td colspan=7 class="padat">3. Nomor KK Tetap</td>
        </tr>

        <tr>
            <td valign="top">5.</td>
            <td>Status KK <br> Bagi Yang Pindah</td>
            <td class="kotak satu"></td>
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
@for($j=0;$j<7;$j++)
        <tr>
        <td class="tengah">&nbsp;{{$j}}</td>
        @for($i=0;$i<16;$i++)
            <td class="tengah">
               {{$i}}
                
            </td>
            @endfor

            <td>
                &nbsp; Cahyo
            </td>

            <td class="tengah">
                &nbsp; Seumur Hidup
            </td>
            <td>
                    &nbsp; 
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
            <td></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Pemalang, 11 September 2019</td>
        </tr>
        <tr>
            <td>Mengetahui,</td>
            <td>Mengetahui,</td>
            <td>Pemohon,</td>
        </tr>
        <tr>
            <td>Camat </td>
            <td></td>
            <td></td>
        </tr>
        <tr style="font-size: 20mm; line-height: normal;">
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
            <td>Muchammad Dwi Cahyo Nugroho</td>
            <td></td>
            <td>(Muchammad Dwi Cahyo Nugroho)</td>
        </tr>
    </table>
    <p>
        <strong>Keterangan:</strong><br>
        *) Diisi Oleh Petugas <br>
        - Formulir ini diisi di Kecamatan
    </p>

</page>