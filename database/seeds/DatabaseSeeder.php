<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daerahs')->insert([
            ['kode_daerah'=>'0001','nama_daerah'=>'Banjarmulya','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0011','nama_daerah'=>'Bojongbata','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0012','nama_daerah'=>'Bojongnangka','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0020','nama_daerah'=>'Danasari','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0014','nama_daerah'=>'Kebondalem','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0006','nama_daerah'=>'Kramat','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0017','nama_daerah'=>'Lawangrejo','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0008','nama_daerah'=>'Mengori','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0015','nama_daerah'=>'Mulyoharjo','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0005','nama_daerah'=>'Paduraksa','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0003','nama_daerah'=>'Pegongsoran','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0016','nama_daerah'=>'Pelutan','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'08','nama_daerah'=>'Pemalang','jenis_daerah'=>'Kecamatan','kepala_daerah'=>'SUHIRMAN, S.Sos., M.Si','nip'=>'19671213 199803 1 005'],
            ['kode_daerah'=>'0010','nama_daerah'=>'Saradan','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0009','nama_daerah'=>'Sewaka','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0018','nama_daerah'=>'Sugihwaras','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0004','nama_daerah'=>'Sungapan','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0002','nama_daerah'=>'Surajaya','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0013','nama_daerah'=>'Tambakrejo','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0007','nama_daerah'=>'Wanamulya','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['kode_daerah'=>'0019','nama_daerah'=>'Widuri','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],

        ]);
        DB::table('admins')->insert([
            [
                'username'=>'AdminKecamatan',
                'password'=>bcrypt('AdminKecamatan'),
                'email'=>'mdcnugroho@gmail.com',
                'nama'=>'Muchammad Dwi Cahyo Nugroho',
                'kontak'=>'082326464265',
                'daerah_id' =>13 ,
                'level' => "1",
                'created_at' => now(+7.00)
            ],
            [
                'username'=>'AdminBanjarmulya',
                'password'=>bcrypt('AdminBanjarmulya'),
                'email'=>'mdcnugroho@student.undip.ac.id',
                'nama'=>'Muchammad Dwi Cahyo Nugroho',
                'kontak'=>'082326464265',
                'daerah_id' =>1 ,
                'level' => "2",
                'created_at' => now(+7.00)
            ]
        ]);
        DB::table('levels')->insert([
            ['level'=>'Kecamatan'],
            ['level'=>'Desa/Kelurahan']
        ]);
        // DB::table('daerahs')->where('nama_daerah','Pemalang')->update([
        //     'admin_id' => 1
        // ]);

        $ter    =   "Perizinan Terstruktur";
        $tidk   =   "Perizinan Tidak Terstruktur";
        $imb    =   "Izin Mendirikan Bangunan";
        $ir     =   "Izin Reklame";
        $iumk   =   "Izin Usaha Mikro dan Kecil";
        $iup    =   "Izin Usaha Pariwisata";
        $skpp   =   "Surat Keterangan Pindah Penduduk";
        $dp     =   "Dispensasi Nikah";
        $rpks   =   "Rekomendasi Pendirian Kelompok Seni";
        $sk     =   "Salon Kecantikan";
        $rm     =   "Rumah Makan";
        $gk     =   "Gelanggang Ketangkasan";
        $aw     =   "Atraksi Wisata";
        $ppakec =   "Pindah Pergi Antar Kecamatan";
        $pdakec =   "Pindah Datang Antar Kecamatan";
        $ppakab =   "Pindah Pergi Antar Kabupaten";
        $pdakab =   "Pindah Datang Antar Kabupaten";

        function slug($string){
            return strtolower(str_replace(" ","-",$string));
        }
        DB::table('pelayanans')->insert([
            ['pelayanan'=>"$imb",'jenis_pelayanan'=>"$ter",'slug'=>slug($imb)],
            ['pelayanan'=>"$ir",'jenis_pelayanana'=>"$ter",'slug'=>slug($ir)],
            ['pelayanan'=>"$iumk",'jenis_pelayanan'=>"$ter",'slug'=>slug($iumk)],
            ['pelayanan'=>"$iup",'jenis_pelayanan'=>"$ter",'slug'=>slug($iup)],
            ['pelayanan'=>"$skpp",'jenis_pelayanan'=>"$tidk",'slug'=>slug($skpp)],
            ['pelayanan'=>"$dp",'jenis_pelayanan'=>"$tidk","slug"=>slug($dp)],
            ['pelayanan'=>"$rpks",'jenis_pelayanan'=>$tidk,'slug'=>slug($rpks)]
        ]);
        DB::table('sublayanans')->insert([
            ['subpelayanan'=>"$sk",'jenis_pelayanan'=>"$ter",'slug'=>slug($sk),'id_pelayanan'=>4],
            ['subpelayanan'=>"$rm",'jenis_pelayanan'=>"$ter",'slug'=>slug($rm),'id_pelayanan'=>4],
            ['subpelayanan'=>"$gk",'jenis_pelayanan'=>"$ter",'slug'=>slug($gk),'id_pelayanan'=>4],
            ['subpelayanan'=>"$aw",'jenis_pelayanan'=>"$ter",'slug'=>slug($aw),'id_pelayanan'=>4],
            ['subpelayanan'=>"$ppakec",'jenis_pelayanan'=>$tidk,'slug'=>slug($ppakec),'id_pelayanan'=>5],
            ['subpelayanan'=>"$pdakec",'jenis_pelayanan'=>$tidk,'slug'=>slug($pdakec),'id_pelayanan'=>5],
            ['subpelayanan'=>"$ppakab",'jenis_pelayanan'=>$tidk,'slug'=>slug($ppakab),'id_pelayanan'=>5],
            ['subpelayanan'=>"$pdakab",'jenis_pelayanan'=>$tidk,'slug'=>slug($pdakab),'id_pelayanan'=>5]
        ]);
        DB::table('jenis-reklame')->insert([
            ['nama_reklame'=>'Reklame Papan'],
            ['nama_reklame'=>'Reklame Baliho'],
            ['nama_reklame'=>'Reklame Kain'],
            ['nama_reklame'=>'Reklame Melekat (Stiker)'],
            ['nama_reklame'=>'Reklame Selebaran'],
            ['nama_reklame'=>'Reklame Berjalan'],
            ['nama_reklame'=>'Reklame Udara'],
            ['nama_reklame'=>'Reklame Apung'],
            ['nama_reklame'=>'Reklame Suara'],
            ['nama_reklame'=>'Reklame Film'],
            ['nama_reklame'=>'Reklame Peragaan']
        ]);
    }
}
