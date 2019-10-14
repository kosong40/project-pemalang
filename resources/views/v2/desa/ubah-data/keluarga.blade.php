<div class="card-body">
    <h4 class="card-title">Daftar Keluarga yang Pindah</h4>
    <div id="place_button" class="float-right mb-2">
            <p id='hapusRow' class='btn btn-danger'>Hapus</p>
        <p id="add" class="btn btn-success ">Tambah</p>
    </div>
    <table class="table" id="keluarga">
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Masa Berlaku KTP</th>
            <th>SHDK</th>
        </tr>
        @php
             $no = count(Kustom::exp($data->nik_kel));
        @endphp
        @for($i=0;$i<$no;$i++)
        <tr id="contoh">
            <td>
            <input type="text" value="{{Kustom::exp($data->nik_kel)[$i]}}" pattern=".{16}" title="Harus di isi 16 karakter" name="nik_kel[]" id="" class="form-control">
            </td>
            <td>
                <input type="text" value="{{Kustom::exp($data->nama_kel)[$i]}}" name="nama_kel[]" id="" class="form-control">
            </td>
            <td>
                <input type="text" value="{{Kustom::exp($data->masa_kel)[$i]}}" name="masa_kel[]" id="" class="form-control">
            </td>
            <td>
                <select name="shdk[]" id="" class="form-control">
                    <option value="{{Kustom::exp($data->shdk)[$i]}}">{{Kustom::shdk(Kustom::exp($data->shdk)[$i])}}</option>
                    <option value="1">Kepala Keluarga</option>
                    <option value="2">Suami</option>
                    <option value="3">Istri</option>
                    <option value="4">Anak</option>
                    <option value="5">Menantu</option>
                    <option value="6">Cucu</option>
                    <option value="7">Orangtua</option>
                    <option value="8">Mertua</option>
                    <option value="9">Famili Lain</option>
                    <option value="10">Pembantu</option>
                    <option value="11">Lainnya</option>
                </select>
            </td>
        </tr>
        @endfor

    </table>
</div>