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
        <tr id="contoh">
            <td>
                <input type="text" name="nik_kel[]" id="" class="form-control">
            </td>
            <td>
                <input type="text" name="nama_kel[]" id="" class="form-control">
            </td>
            <td>
                <input type="text" name="masa_kel[]" id="" class="form-control">
            </td>
            <td>
                <select name="shdk[]" id="" class="form-control">
                    <option value="" selected>Pilih</option>
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

    </table>
</div>