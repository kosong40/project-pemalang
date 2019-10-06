<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class kustom
{
    public static function validasi()
    {
        $pesan = [
            'accepted'             => 'Isian :attribute harus diterima.',
            'active_url'           => 'Isian :attribute bukan URL yang sah.',
            'after'                => 'Isian :attribute harus tanggal setelah :date.',
            'alpha'                => 'Isian :attribute hanya boleh berisi huruf.',
            'alpha_dash'           => 'Isian :attribute hanya boleh berisi huruf, angka, dan strip.',
            'alpha_num'            => 'Isian :attribute hanya boleh berisi huruf dan angka.',
            'array'                => 'Isian :attribute harus berupa sebuah array.',
            'before'               => 'Isian :attribute harus tanggal sebelum :date.',
            'between'              => [
                'numeric' => 'Isian :attribute harus antara :min dan :max.',
                'file'    => 'Isian :attribute harus antara :min dan :max kilobytes.',
                'string'  => 'Isian :attribute harus antara :min dan :max karakter.',
                'array'   => 'Isian :attribute harus antara :min dan :max item.',
            ],
            'boolean'              => 'Isian :attribute harus berupa true atau false',
            'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
            'date'                 => 'Isian :attribute bukan tanggal yang valid.',
            'date_format'          => 'Isian :attribute tidak cocok dengan format :format.',
            'different'            => 'Isian :attribute dan :other harus berbeda.',
            'digits'               => 'Isian :attribute harus berupa angka :digits.',
            'digits_between'       => 'Isian :attribute harus antara angka :min dan :max.',
            'dimensions'           => 'Isian :attribute harus merupakan dimensi gambar yang sah.',
            'distinct'             => 'Isian :attribute memiliki nilai yang duplikat.',
            'email'                => 'Isian :attribute harus berupa alamat surel yang valid.',
            'exists'               => 'Isian :attribute yang dipilih tidak valid.',
            'filled'               => 'Isian :attribute wajib diisi.',
            'image'                => 'Isian :attribute harus berupa gambar.',
            'in'                   => 'Isian :attribute yang dipilih tidak valid.',
            'in_array'             => 'Isian :attribute tidak terdapat dalam :other.',
            'integer'              => 'Isian :attribute harus merupakan bilangan bulat.',
            'ip'                   => 'Isian :attribute harus berupa alamat IP yang valid.',
            'json'                 => 'Isian :attribute harus berupa JSON string yang valid.',
            'max'                  => [
                'numeric' => 'Isian :attribute seharusnya tidak lebih dari :max.',
                'file'    => 'Isian :attribute seharusnya tidak lebih dari :max kilobytes.',
                'string'  => 'Isian :attribute seharusnya tidak lebih dari :max karakter.',
                'array'   => 'Isian :attribute seharusnya tidak lebih dari :max item.',
            ],
            'mimes'                => 'Isian :attribute harus dokumen berjenis : :values.',
            'min'                  => [
                'numeric' => 'Isian :attribute harus minimal :min.',
                'file'    => 'Isian :attribute harus minimal :min kilobytes.',
                'string'  => 'Isian :attribute harus minimal :min karakter.',
                'array'   => 'Isian :attribute harus minimal :min item.',
            ],
            'not_in'               => 'Isian :attribute yang dipilih tidak valid.',
            'numeric'              => 'Isian :attribute harus berupa angka.',
            'present'              => 'Isian :attribute wajib ada.',
            'regex'                => 'Format isian :attribute tidak valid.',
            'required'             => 'Isian :attribute wajib diisi.',
            'required_if'          => 'Isian :attribute wajib diisi bila :other adalah :value.',
            'required_unless'      => 'Isian :attribute wajib diisi kecuali :other memiliki nilai :values.',
            'required_with'        => 'Isian :attribute wajib diisi bila terdapat :values.',
            'required_with_all'    => 'Isian :attribute wajib diisi bila terdapat :values.',
            'required_without'     => 'Isian :attribute wajib diisi bila tidak terdapat :values.',
            'required_without_all' => 'Isian :attribute wajib diisi bila tidak terdapat ada :values.',
            'same'                 => 'Isian :attribute dan :other harus sama.',
            'size'                 => [
                'numeric' => 'Isian :attribute harus berukuran :size.',
                'file'    => 'Isian :attribute harus berukuran :size kilobyte.',
                'string'  => 'Isian :attribute harus berukuran :size karakter.',
                'array'   => 'Isian :attribute harus mengandung :size item.',
            ],
            'string'               => 'Isian :attribute harus berupa string.',
            'timezone'             => 'Isian :attribute harus berupa zona waktu yang valid.',
            'unique'               => 'Isian :attribute sudah ada sebelumnya.',
            'url'                  => 'Format isian :attribute tidak valid.',
        ];
        return $pesan;
    }
    public static function getRupiah($value)
    {
        $format = "Rp. " . number_format($value, 2, ',', '.');
        return $format;
    }
    public static function CountPrint()
    {
        $sum = count(DB::table('pemohons')->where('status', 'Sudah ada nomor SK')->get());
        return $sum;
    }
    public static function CountSetuju()
    {
        $sum = count(DB::table('pemohons')->where('status', 'Setuju')->get());
        return $sum;
    }
    public static function CountBelum()
    {
        $sum = count(DB::table('pemohons')->where('status', 'Belum')->get());
        return $sum;
    }
    public static function generateKode($banyak)
    {
        $string = "ABCDEFGHIJKLMNOPQRETUVWXYZabcdefghijklmnopqrstuwvxyz1234567890";
        $acak = substr(str_shuffle($string), 0, $banyak);
        return $acak;
    }
    public static function uploadBerkas($file,$slug,$folder)
    {
        $string = "ABCDEFGHIJKLMNOPQRETUVWXYZabcdefghijklmnopqrstuwvxyz1234567890";
        $acak = substr(str_shuffle($string), 0, 16);
        $path =   "berkas/$slug/$folder/";
        $nama =   $acak. "_$folder." . $file->getClientOriginalExtension();
        $file->move($path, $nama);
        $url = $path.$nama;
        return $url;
    }
    public static function kapital($teks){
        return strtoupper($teks);
    }
    public static function lengthRTRW($teks)
    {
        $data = str_split($teks,1);
        return count($data);
    }
    public static function stoa($teks)
    {
        return str_split($teks,1);
    }
    public static function update_izin_mendirikan_bangunan($data,$id,$slug,$cekBerkas,$berkas)
    {
        DB::table("$slug")->where('id_pemohon',$id)
        ->update([
            'keperluan_bangunan'        => $data['keperluan_bangunan'],
            'konstruksi_bangunan'       => $data['konstruksi_bangunan'],
            'luas_bangunan'             => $data['luas_bangunan'],
            'luas_tanah'                => $data['luas_tanah'],
            'letak_bangunan'            => $data['letak_bangunan'],
            'tanah_milik'               => $data['tanah_milik'],
        ]);
        if(array_key_exists("scan_ktp",$data)){
            $scan_ktp = Kustom::uploadBerkas($berkas['scan_ktp'],"$slug","scan_ktp");
            unlink($cekBerkas->scan_ktp);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_ktp' => $scan_ktp
            ]);
        }
        if(array_key_exists("scan_persetujuan_tetangga",$data)){
            $scan_persetujuan_tetangga = Kustom::uploadBerkas($berkas['scan_persetujuan_tetangga'],"$slug","scan_persetujuan_tetangga");
            unlink($cekBerkas->scan_persetujuan_tetangga);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_persetujuan_tetangga' => $scan_persetujuan_tetangga
            ]);
        }
        if(array_key_exists("scan_fc_kepemilikan_tanah",$data)){
            $scan_fc_kepemilikan_tanah = Kustom::uploadBerkas($berkas['scan_fc_kepemilikan_tanah'],"$slug","scan_fc_kepemilikan_tanah");
            unlink($cekBerkas->scan_fc_kepemilikan_tanah);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_fc_kepemilikan_tanah' => $scan_fc_kepemilikan_tanah
            ]);
        }
        if(array_key_exists("scan_fc_sppt_pbb_terakhir",$data)){
            $scan_fc_sppt_pbb_terakhir = Kustom::uploadBerkas($berkas['scan_fc_sppt_pbb_terakhir'],"$slug","scan_fc_sppt_pbb_terakhir");
            unlink($cekBerkas->scan_fc_sppt_pbb_terakhir);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_fc_sppt_pbb_terakhir' => $scan_fc_sppt_pbb_terakhir
            ]);
        }
        if(array_key_exists("scan_gambar_rencana",$data)){
            $scan_gambar_rencana = Kustom::uploadBerkas($berkas['scan_gambar_rencana'],"$slug","scan_gambar_rencana");
            unlink($cekBerkas->scan_gambar_rencana);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_gambar_rencana' => $scan_gambar_rencana
            ]);
        }
        if(array_key_exists("scan_pengantar",$data)){
            $scan_pengantar = Kustom::uploadBerkas($berkas['scan_pengantar'],"$slug","scan_pengantar");
            unlink($cekBerkas->scan_pengantar);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_pengantar' => $scan_pengantar
            ]);
        }
    }
    public static function update_izin_reklame ($data,$id,$slug,$cekBerkas,$berkas)
    {
        DB::table("$slug")->where('id_pemohon',$id)
        ->update([
            'id_reklame'    => $data['id_reklame'],
            'banyak'        =>  $data['banyak'],
            'pesan_produk'  =>  $data['pesan_produk'],
            'tanggal_awal'  =>  $data['tanggal_awal'],
            'tanggal_akhir' =>  $data['tanggal_akhir'],
            'tempat_reklame'    => $data['tempat_reklame'],
        ]);
        if(array_key_exists("scan_ktp",$data)){
            $scan_ktp = Kustom::uploadBerkas($berkas['scan_ktp'],"$slug","scan_ktp");
            unlink($cekBerkas->scan_ktp);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_ktp' => $scan_ktp
            ]);
        }
        if(array_key_exists("scan_npwp",$data)){
            $scan_npwp = Kustom::uploadBerkas($berkas['scan_npwp'],"$slug","scan_npwp");
            unlink($cekBerkas->scan_npwp);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_npwp' => $scan_npwp
            ]);
        }
        if(array_key_exists("contoh_reklame",$data)){
            $contoh_reklame = Kustom::uploadBerkas($berkas['contoh_reklame'],"$slug","contoh_reklame");
            unlink($cekBerkas->contoh_reklame);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'contoh_reklame' => $contoh_reklame
            ]);
        }
        if(array_key_exists("scan_persetujuan",$data)){
            $scan_persetujuan = Kustom::uploadBerkas($berkas['scan_persetujuan'],"$slug","scan_persetujuan");
            unlink($cekBerkas->scan_persetujuan);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_persetujuan' => $scan_persetujuan
            ]);
        }
        if(array_key_exists("scan_izin_lama",$data)){
            $scan_izin_lama = Kustom::uploadBerkas($berkas['scan_izin_lama'],"$slug","scan_izin_lama");
            unlink($cekBerkas->scan_izin_lama);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_izin_lama' => $scan_izin_lama
            ]);
        }
        if(array_key_exists("scan_pengantar",$data)){
            $scan_pengantar = Kustom::uploadBerkas($berkas['scan_pengantar'],"$slug","scan_pengantar");
            unlink($cekBerkas->scan_pengantar);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_pengantar' => $scan_pengantar
            ]);
        }
    }
    public static function update_izin_usaha_mikro_dan_kecil($data,$id,$slug,$cekBerkas,$berkas)
    {
        DB::table("$slug")->where('id_pemohon',$id)
        ->update([
            'nama_usaha'=> $data['nama_usaha'],
            'alamat_usaha'=>  $data['alamat_usaha'],
            'kodepos'=>  $data['kodepos'],
            'sektor_usaha'=>  $data['sektor_usaha'],
            'sarana'=>  $data['sarana'],
            'modal'=>  $data['modal'],
            'npwp'=>  $data['npwp'],
            'klasifikasi'=>  $data['klasifikasi'],
        ]);
        if(array_key_exists("scan_ktp",$data)){
            $scan_ktp = Kustom::uploadBerkas($berkas['scan_ktp'],"$slug","scan_ktp");
            unlink($cekBerkas->scan_ktp);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_ktp' => $scan_ktp
            ]);
        }
        if(array_key_exists("scan_kk",$data)){
            $scan_kk = Kustom::uploadBerkas($berkas['scan_kk'],"$slug","scan_kk");
            unlink($cekBerkas->scan_kk);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_kk' => $scan_kk
            ]);
        }
        if(array_key_exists("scan_pengantar",$data)){
            $scan_pengantar = Kustom::uploadBerkas($berkas['scan_pengantar'],"$slug","scan_pengantar");
            unlink($cekBerkas->scan_pengantar);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_pengantar' => $scan_pengantar
            ]);
        }
        if(array_key_exists("foto",$data)){
            $foto = Kustom::uploadBerkas($berkas['foto'],"$slug","foto");
            unlink($cekBerkas->foto);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'foto' => $foto
            ]);
        }
    }
    public static function update_salon_kecantikan($request,$id,$slug,$cekBerkas,$berkas)
    {
        if ($request['jenis'] == "Balik Nama") {
            DB::table("$slug")->where('id_pemohon',$id)->update([
                'jenis' => $request['jenis'],
                'nama_usaha' => $request['nama_usaha'],
                'alamat_usaha' =>  $request['alamat_usaha'],
                'nama_usaha_baru' =>  $request['usaha_lama'],
            ]);
        } else {
            DB::table("$slug")->where('id_pemohon',$id)->update([
                'jenis' => $request['jenis'],
                'nama_usaha' => $request['nama_usaha'],
                'alamat_usaha' =>  $request['alamat_usaha'],
                'nama_usaha_baru' =>  "-",
            ]);
        }
        if(array_key_exists("scan_ktp",$request)){
            $scan_ktp = Kustom::uploadBerkas($berkas['scan_ktp'],"$slug","scan_ktp");
            unlink($cekBerkas->scan_ktp);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_ktp' => $scan_ktp
            ]);
        }
        if(array_key_exists("scan_pengantar",$request)){
            $scan_pengantar = Kustom::uploadBerkas($berkas['scan_pengantar'],"$slug","scan_pengantar");
            unlink($cekBerkas->scan_pengantar);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_pengantar' => $scan_pengantar
            ]);
        }
    }
    public static function update_rumah_makan($request,$id,$slug,$cekBerkas,$berkas)
    {
        if ($request['jenis'] == "Balik Nama") {
            DB::table("$slug")->where('id_pemohon',$id)->update([
                'jenis' => $request['jenis'],
                'nama_usaha' => $request['nama_usaha'],
                'alamat_usaha' =>  $request['alamat_usaha'],
                'nama_usaha_baru' =>  $request['usaha_lama'],
            ]);
        } else {
            DB::table("$slug")->where('id_pemohon',$id)->update([
                'jenis' => $request['jenis'],
                'nama_usaha' => $request['nama_usaha'],
                'alamat_usaha' =>  $request['alamat_usaha'],
                'nama_usaha_baru' =>  "-",
            ]);
        }
        if(array_key_exists("scan_ktp",$request)){
            $scan_ktp = Kustom::uploadBerkas($berkas['scan_ktp'],"$slug","scan_ktp");
            unlink($cekBerkas->scan_ktp);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_ktp' => $scan_ktp
            ]);
        }
        if(array_key_exists("scan_pengantar",$request)){
            $scan_pengantar = Kustom::uploadBerkas($berkas['scan_pengantar'],"$slug","scan_pengantar");
            unlink($cekBerkas->scan_pengantar);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_pengantar' => $scan_pengantar
            ]);
        }
    }
    public static function update_gelanggang_ketangkasan($request,$id,$slug,$cekBerkas,$berkas)
    {
        DB::table("$slug")->where('id_pemohon',$id)->update([
            'nama_usaha' => $request['nama_usaha'],
            'alamat_usaha' =>  $request['alamat_usaha'],
            'jumlah_monitor'    => $request['jumlah_monitor'],
        ]);
        if(array_key_exists("scan_ktp",$request)){
            $scan_ktp = Kustom::uploadBerkas($berkas['scan_ktp'],"$slug","scan_ktp");
            unlink($cekBerkas->scan_ktp);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_ktp' => $scan_ktp
            ]);
        }
        if(array_key_exists("scan_pengantar",$request)){
            $scan_pengantar = Kustom::uploadBerkas($berkas['scan_pengantar'],"$slug","scan_pengantar");
            unlink($cekBerkas->scan_pengantar);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_pengantar' => $scan_pengantar
            ]);
        }
        if(array_key_exists("scan_pernyataan_desa",$request)){
            $scan_pernyataan_desa = Kustom::uploadBerkas($berkas['scan_pernyataan_desa'],"$slug","scan_pernyataan_desa");
            unlink($cekBerkas->scan_pernyataan_desa);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_pernyataan_desa' => $scan_pernyataan_desa
            ]);
        }
    }
    public static function update_atraksi_wisata($request,$id,$slug,$cekBerkas,$berkas)
    {
        DB::table("$slug")->where('id_pemohon',$id)->update([
            'umur'      => $request['umur'],
            'nama_usaha'    => $request['nama_usaha'],
            'alamat_usaha'  =>  $request['alamat_usaha'],
            'jumlah_karyawan'    => $request['jumlah_karyawan'],
            'nilai_aset'    =>  $request['nilai_aset'],
        ]);
        if(array_key_exists("scan_ktp",$request)){
            $scan_ktp = Kustom::uploadBerkas($berkas['scan_ktp'],"$slug","scan_ktp");
            unlink($cekBerkas->scan_ktp);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_ktp' => $scan_ktp
            ]);
        }
        if(array_key_exists("scan_pengantar",$request)){
            $scan_pengantar = Kustom::uploadBerkas($berkas['scan_pengantar'],"$slug","scan_pengantar");
            unlink($cekBerkas->scan_pengantar);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_pengantar' => $scan_pengantar
            ]);
        }
        if(array_key_exists("scan_pernyataan_desa",$request)){
            $scan_pernyataan_desa = Kustom::uploadBerkas($berkas['scan_pernyataan_desa'],"$slug","scan_pernyataan_desa");
            unlink($cekBerkas->scan_pernyataan_desa);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'scan_pernyataan_desa' => $scan_pernyataan_desa
            ]);
        }
        if(array_key_exists("struktur_organisasi",$request)){
            $struktur_organisasi = Kustom::uploadBerkas($berkas['struktur_organisasi'],"$slug","struktur_organisasi");
            unlink($cekBerkas->struktur_organisasi);
            DB::table("$slug")->where('id_pemohon',$id)
            ->update([
            'struktur_organisasi' => $struktur_organisasi
            ]);
        }
    }
    public static function getData($i)
    {
        return count(DB::table("pemohons")->whereDate('created_at', DB::raw("CURDATE()+$i"))->get());
    }
    public static function form($input,$label)
    {
        return "<div class='form-group row'>
        <label  class='col-sm-3 text-right control-label col-form-label'>".$label."</label>
        <div class='col-sm-9'>
            ".$input."
        </div>
        </div>
        ";
    }
    public static function getDay($date)
    {
        $hari = null;
        switch (date("l",strtotime($date))) {
            case 'Wednesday':$hari = "Rabu, ";break;
            case 'Monday':$hari = "Senin, ";break;
            case 'Tuesday':$hari = "Selasa, ";break;
            case 'Thursday':$hari = "Kamis, ";break;
            case 'Friday':$hari = "Jumat, ";break;
            case 'Saturday':$hari = "Sabtu, ";break;
            case 'Sunday':$hari = "Minggu, ";break;
            default:$hari = date("l");break;
        }
        return $hari;
    }

    public static function bulan($date){;
        return date('m',strtotime($date));
    }
    public static function tanggal($date){;
        return date('d',strtotime($date));
    }
    public static function tahun($date){;
        return date('Y',strtotime($date));
    }

    public static function getTanggal($date)
    {
        $m;
        switch(date("m",strtotime($date))){
            case '01':$m = "Januari";break;
            case '02':$m = "Februari";break;
            case '03':$m = "Maret";break;
            case '04':$m = "April";break;
            case '05':$m = "Mei";break;
            case '06':$m = "Juni";break;
            case '07':$m = "Juli";break;
            case '08':$m = "Agustus";break;
            case '09':$m = "Spetember";break;
            case '10':$m = "Oktober";break;
            case '11':$m = "November";break;
            case '12':$m = "Desember";break;
        }
        return date('d',strtotime($date))." ".$m." ".date('Y',strtotime($date));
    }
    public static function imp($data = array())
    {
        return implode(",",$data);
    }
    public static function exp($data = array())
    {
        return explode(",",$data);
    }
    public static function shdk($no){
        if($no ==1){
            return "Kepala Keluarga";
        }elseif($no == 2){
            return "Suami";
        }elseif($no == 3){
            return "Istri";
        }elseif($no == 4){
            return "Anak";
        }elseif($no == 5){
            return "Menantu";
        }elseif($no == 6){
            return "Cucu";
        }elseif($no == 7){
            return "Orangtua";
        }elseif($no == 8){
            return "Mertua";
        }elseif($no == 9){
            return "Famili Lain";
        }elseif($no == 10){
            return "Pembantu";
        }elseif($no == 11){
            return "Lainnya";
        }

    }
}
