<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Helpers\kustom;
use App\Admin;
use App\Daerah;
use App\Pelayanan;
use App\Sublayanan;
use App\Pemohon;
use App\imb;
use Datatables;

class DesaV2 extends Controller
{
    public function index()
    {
        $totalPemohon = DB::table('pemohons')->where('daerah_id', session('daerah'))->get();
        $pel = Pelayanan::Leftjoin('sublayanans','sublayanans.id_pelayanan','=','pelayanans.id')
        ->select(['pelayanans.id as id1','sublayanans.id as id2','pelayanans.pelayanan as pelayanan1','sublayanans.subpelayanan as pelayanan2'])
        ->get();
        // dd($pel);
        $pemohon = DB::table('pemohons')->where('daerah_id', session('daerah'))->get();
        $data = [
            'totalPemohon' => count($totalPemohon),
            'pelayanan' => $pel,
            'pemohon' => $pemohon
        ];
        return view('v2/desa/index', $data);
    }
    public function formulir()
    {
        // $pelayanan = Pelayanan::get();
        $pemohon = Pemohon::where('daerah_id', session('daerah'))->get();
        $pelayanan = Pelayanan::get();
        $data = [
            'pelayanan' => $pelayanan,
            'pemohon' => $pemohon
        ];
        return view('v2/desa/formulir', $data);
    }
    public function formulirPelayanan($slug)
    {
        $pelayanan      = Pelayanan::where('slug', $slug)->first();
        $daerah         = Daerah::find(session('daerah'));
        $reklame        = DB::table('jenis-reklame')->get();
        $pemoho = Pemohon::where('daerah_id', session('daerah'))->get();
        $sublayanan     =   Sublayanan::get();
        $data =
            [
                'pelayanan' => $pelayanan,
                'daerah' => $daerah,
                'reklame' => $reklame,
                'sublayanan' => $sublayanan,
                'pemohon'=>$pemoho,
                'slug' => $slug,
                'cek' => count(Sublayanan::where('id_pelayanan', $pelayanan->id)->get()),
            ];
        return view('v2/desa/formulir-pelayanan', $data);
        // return view('v2/desa/data-pemohon-detail', $data);
    }
    public function formulirSublayanan($slug, $slug2)
    {
        $pelayanan      = Pelayanan::where('slug', $slug)->first();
        $daerah         = Daerah::find(session('daerah'));
        $reklame        = DB::table('jenis-reklame')->get();
        $daerah1         =  Daerah::where('nama_daerah','<>','Pemalang')->get();
        $sublayanan     = Sublayanan::where('slug', "$slug2")->first();
        $data =
            [
                'pelayanan' => $pelayanan,
                'daerah' => $daerah,
                'daerahs' => $daerah1,
                'reklame' => $reklame,
                'sublayanan' => $sublayanan
            ];
        return view('v2/desa/formulir-sublayanan', $data);
    }


    public function formIMB(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required', 'nik' => 'required|min:16|max:18', 'telepon' => 'required|numeric', 'pekerjaan' => 'required',
            'rt' => 'required', 'rw' => 'required', 'jalan' => 'required',
            'keperluan_bangunan' => 'required', 'konstruksi_bangunan' => 'required', 'letak_bangunan' => 'required', 'luas_bangunan' => 'required|numeric', 'luas_tanah' => 'required|numeric', 'tanah_milik' => 'required',
            'scan_ktp' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_persetujuan_tetangga' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_fc_kepemilikan_tanah' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_fc_sppt_pbb_terakhir' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_gambar_rencana' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_pengantar' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ], Kustom::validasi());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama'],
            'kode'  => Kustom::generateKode(6),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['daerah_id'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;

        $a  =   $request->file('scan_ktp');
        $b  =   $request->file('scan_persetujuan_tetangga');
        $c  =   $request->file('scan_fc_kepemilikan_tanah');
        $d  =   $request->file('scan_fc_sppt_pbb_terakhir');
        $e  =   $request->file('scan_gambar_rencana');
        $f  =   $request->file('scan_pengantar');
        $scan_ktp = Kustom::uploadBerkas($a,"izin-mendirikan-bangunan","scan_ktp");
        $scan_persetujuan_tetangga = Kustom::uploadBerkas($b,"izin-mendirikan-bangunan","scan_persetujuan_tetangga");
        $scan_fc_kepemilikan_tanah = Kustom::uploadBerkas($c,"izin-mendirikan-bangunan","scan_fc_kepemilikan_tanah");
        $scan_fc_sppt_pbb_terakhir = Kustom::uploadBerkas($d,"izin-mendirikan-bangunan","scan_fc_sppt_pbb_terakhir");
        $scan_gambar_rencana = Kustom::uploadBerkas($e,"izin-mendirikan-bangunan","scan_gambar_rencana");
        $scan_pengantar = Kustom::uploadBerkas($f,"izin-mendirikan-bangunan","scan_pengantar");
        DB::table('izin-mendirikan-bangunan')->insert([
            'id_pemohon'                => $id_pemohon,
            'keperluan_bangunan'        => $request['keperluan_bangunan'],
            'konstruksi_bangunan'       => $request['konstruksi_bangunan'],
            'luas_bangunan'             => $request['luas_bangunan'],
            'luas_tanah'                => $request['luas_tanah'],
            'letak_bangunan'            => $request['letak_bangunan'],
            'tanah_milik'               => $request['tanah_milik'],
            'scan_ktp'                  => $scan_ktp,
            'scan_persetujuan_tetangga' => $scan_persetujuan_tetangga,
            'scan_fc_kepemilikan_tanah' => $scan_fc_kepemilikan_tanah,
            'scan_fc_sppt_pbb_terakhir' => $scan_fc_sppt_pbb_terakhir,
            'scan_gambar_rencana'       => $scan_gambar_rencana,
            'scan_pengantar'            => $scan_pengantar,
        ]);
        return redirect()->back()->with('sukses', "Pengisian formulir berhasil, mohon untuk menunggu informasi lebih lanjut");
    }
    public function formIR(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required', 'nik' => 'required|min:16|max:18', 'telepon' => 'required|numeric', 'pekerjaan' => 'required', 'rt' => 'required', 'rw' => 'required', 'jalan' => 'required',

            'id_reklame' => 'required|numeric', 'banyak' => 'required|numeric', 'pesan_produk' => 'required', 'tempat_reklame' => 'required', 'tanggal_awal' => 'required|before:tanggal_akhir', 'tanggal_akhir' => 'required|after:tanggal_awal',

            'scan_ktp' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_npwp' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'contoh_reklame' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_persetujuan' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_izin_lama' => 'mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_pengantar' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ], Kustom::validasi());

        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama'],
            'kode'  => Kustom::generateKode(6),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['daerah_id'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);

        $id_pemohon = $pemohon->id;
        $scan_ktp = Kustom::uploadBerkas($request->file('scan_ktp'),"izin-reklame","scan_ktp");
        $scan_npwp = Kustom::uploadBerkas($request->file('scan_npwp'),"izin-reklame","scan_npwp");
        $contoh_reklame = Kustom::uploadBerkas($request->file('contoh_reklame'),'izin-reklame','contoh_reklame');
        $scan_persetujuan = Kustom::uploadBerkas($request->file('scan_persetujuan'),'izin-reklame','scan_persetujuan');
        $scan_izin_lama = Kustom::uploadBerkas($request->file('scan_izin_lama'),'izin-reklame','scan_izin_lama');
        $scan_pengantar = Kustom::uploadBerkas($request->file('scan_pengantar'),'izin-reklame','scan_pengantar');
        
        DB::table('izin-reklame')->insert([
            'id_pemohon'                => $id_pemohon,
            'id_reklame'    => $request['id_reklame'],
            'banyak'        =>  $request['banyak'],
            'pesan_produk'  =>  $request['pesan_produk'],
            'tanggal_awal'  =>  $request['tanggal_awal'],
            'tanggal_akhir' =>  $request['tanggal_akhir'],
            'tempat_reklame'    => $request['tempat_reklame'],
            'scan_ktp'          => $scan_ktp,
            'scan_npwp'         => $scan_npwp,
            'contoh_reklame'    => $contoh_reklame,
            'scan_persetujuan'  => $scan_persetujuan,
            'scan_izin_lama'    => $scan_izin_lama,
            'scan_pengantar'    => $scan_pengantar

        ]);
        return redirect()->back()->with('sukses', "Pengisian formulir berhasil, mohon untuk menunggu informasi lebih lanjut");
    }
    public function formIUMK(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required', 'nik' => 'required|min:16|max:18', 'telepon' => 'required|numeric', 'pekerjaan' => 'required', 'rt' => 'required', 'rw' => 'required', 'jalan' => 'required',

            'nama_usaha' => 'required', 'alamat_usaha' => 'required', 'kodepos' => 'required|numeric', 'sektor_usaha' => 'required', 'sarana' => 'required', 'modal' => 'required|numeric', 'npwp' => 'required|numeric', 'klasifikasi' => 'required',

            'scan_ktp' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_kk' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'foto' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_pengantar' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ], Kustom::validasi());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama'],
            'kode'  => Kustom::generateKode(6),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['daerah_id'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        $scan_ktp = Kustom::uploadBerkas($request->file('scan_ktp'),"izin-usaha-mikro-dan-kecil","scan_ktp");
        $scan_kk = Kustom::uploadBerkas($request->file('scan_kk'),"izin-usaha-mikro-dan-kecil","scan_kk");
        $scan_pengantar = Kustom::uploadBerkas($request->file('scan_pengantar'),"izin-usaha-mikro-dan-kecil","scan_pengantar");
        $foto = Kustom::uploadBerkas($request->file('foto'),"izin-usaha-mikro-dan-kecil","foto");
        DB::table('izin-usaha-mikro-dan-kecil')->insert([
            'id_pemohon'    => $id_pemohon,
            'nama_usaha'    => $request['nama_usaha'],
            'alamat_usaha'  =>  $request['alamat_usaha'],
            'kodepos'       =>  $request['kodepos'],
            'sektor_usaha'  =>  $request['sektor_usaha'],
            'sarana'        =>  $request['sarana'],
            'modal'         =>  $request['modal'],
            'npwp'         =>  $request['npwp'],
            'klasifikasi'         =>  $request['klasifikasi'],
            'scan_ktp'          => $scan_ktp,
            'scan_kk'         => $scan_kk,
            'scan_pengantar'    => $scan_pengantar,
            'foto'  => $foto,

        ]);
        return redirect()->back()->with('sukses', "Pengisian formulir berhasil, mohon untuk menunggu informasi lebih lanjut");
    }
    public function formSK(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required', 'nik' => 'required|min:16|max:18', 'telepon' => 'required', 'pekerjaan' => 'required', 'rt' => 'required', 'rw' => 'required', 'jalan' => 'required', 'jenis' => 'required',
            'nama_usaha' => 'required', 'alamat_usaha' => 'required', 'scan_ktp' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048', 'scan_pengantar' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ], Kustom::validasi());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama'],
            'kode'  => Kustom::generateKode(6),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['daerah_id'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'sublayanan_id' => $request['sublayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        if ($request['jenis'] == "1") {
            $jenis = "Permohonan Baru";
        } elseif ($request['jenis'] == "2") {
            $jenis = "Daftar Ulang";
        } else {
            $jenis = "Balik Nama";
        }
        $scan_ktp = Kustom::uploadBerkas($request->file('scan_ktp'),"salon-kecantikan","scan_ktp");
        $scan_pengantar = Kustom::uploadBerkas($request->file('scan_pengantar'),"salon-kecantikan","scan_pengantar");
        if ($request['jenis'] == "3") {
            DB::table('salon-kecantikan')->insert([
                'id_pemohon' => $id_pemohon,
                'jenis' => $jenis,
                'nama_usaha' => $request['nama_usaha'],
                'alamat_usaha' =>  $request['alamat_usaha'],
                'nama_usaha_baru' =>  $request['usaha_lama'],
                'scan_ktp' => $scan_ktp,
                'scan_pengantar' => $scan_pengantar,
            ]);
        } else {
            DB::table('salon-kecantikan')->insert([
                'id_pemohon' => $id_pemohon,
                'jenis' => $jenis,
                'nama_usaha' => $request['nama_usaha'],
                'alamat_usaha' =>  $request['alamat_usaha'],
                'nama_usaha_baru' =>  "-",
                'scan_ktp' => $scan_ktp,
                'scan_pengantar' => $scan_pengantar,
            ]);
        }
        return redirect()->back()->with('sukses', "Pengisian formulir berhasil, mohon untuk menunggu informasi lebih lanjut");
    }
    public function formRM(Request $request)
    {
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama'],
            'kode'  => Kustom::generateKode(6),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['daerah_id'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'sublayanan_id' => $request['sublayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        if ($request['jenis'] == "1") {
            $jenis = "Permohonan Baru";
        } elseif ($request['jenis'] == "2") {
            $jenis = "Daftar Ulang";
        } else {
            $jenis = "Balik Nama";
        }
        $scan_ktp = Kustom::uploadBerkas($request->file('scan_ktp'),"rumah-makan","scan_ktp");
        $scan_pengantar = Kustom::uploadBerkas($request->file('scan_pengantar'),"rumah-makan","scan_pengantar");
        if ($request['jenis'] == "3") {
            DB::table('rumah-makan')->insert([
                'id_pemohon' => $id_pemohon,
                'jenis' => $jenis,
                'nama_usaha' => $request['nama_usaha'],
                'alamat_usaha' =>  $request['alamat_usaha'],
                'nama_usaha_baru' =>  $request['usaha_lama'],
                'scan_ktp' => $scan_ktp,
                'scan_pengantar' => $scan_pengantar,
            ]);
        } else {
            DB::table('rumah-makan')->insert([
                'id_pemohon' => $id_pemohon,
                'jenis' => $jenis,
                'nama_usaha' => $request['nama_usaha'],
                'alamat_usaha' =>  $request['alamat_usaha'],
                'nama_usaha_baru' =>  "-",
                'scan_ktp' => $scan_ktp,
                'scan_pengantar' => $scan_pengantar,
            ]);
        }
        return redirect()->back()->with('sukses', "Pengisian formulir berhasil, mohon untuk menunggu informasi lebih lanjut");
    }
    public function formGK(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required', 'nik' => 'required|min:16|max:18', 'telepon' => 'required', 'pekerjaan' => 'required', 'rt' => 'required', 'rw' => 'required', 'jalan' => 'required', 'jumlah_monitor' => 'required|numeric',
            'nama_usaha' => 'required', 'alamat_usaha' => 'required', 'scan_ktp' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048', 'scan_pengantar' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048', 'scan_pernyataan_desa' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ], Kustom::validasi());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama'],
            'kode'  => Kustom::generateKode(6),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['daerah_id'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'sublayanan_id' => $request['sublayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        $a  =   $request->file('scan_ktp');
        $b  =   $request->file('scan_pengantar');
        $c  =   $request->file('scan_pernyataan_desa');
        $scan_ktp = Kustom::uploadBerkas($request->file('scan_ktp'),"gelanggang-ketangkasan","scan_ktp");
        $scan_pengantar = Kustom::uploadBerkas($request->file('scan_pengantar'),"gelanggang-ketangkasan","scan_pengantar");
        $scan_pernyataan_desa = Kustom::uploadBerkas($request->file('scan_pernyataan_desa'),"gelanggang-ketangkasan","scan_pernyataan_desa");
        DB::table('gelanggang-ketangkasan')->insert([
            'id_pemohon'    => $id_pemohon,
            'nama_usaha'    => $request['nama_usaha'],
            'alamat_usaha'  =>  $request['alamat_usaha'],
            'jumlah_monitor'    => $request['jumlah_monitor'],
            'scan_ktp'      => $scan_ktp,
            'scan_pengantar'         => $scan_pengantar,
            'scan_pernyataan_desa'  =>$scan_pernyataan_desa,
        ]);
        return redirect()->back()->with('sukses', "Pengisian formulir berhasil, mohon untuk menunggu informasi lebih lanjut");
    }
    public function formAW(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required', 'nik' => 'required|min:16|max:18', 'telepon' => 'required', 'pekerjaan' => 'required', 'rt' => 'required', 'rw' => 'required', 'jalan' => 'required', 'umur' => 'required|numeric',
            'nama_usaha' => 'required', 'alamat_usaha' => 'required', 'scan_ktp' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048', 'scan_pengantar' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048', 'scan_pernyataan_desa' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048', 'struktur_organisasi' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ], Kustom::validasi());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama'],
            'kode'  => Kustom::generateKode(6),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['daerah_id'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'sublayanan_id' => $request['sublayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        $scan_ktp = Kustom::uploadBerkas($request->file('scan_ktp'),"atraksi-wisata","scan_ktp");
        $scan_pengantar = Kustom::uploadBerkas($request->file('scan_pengantar'),"atraksi-wisata","scan_pengantar");
        $scan_pernyataan_desa = Kustom::uploadBerkas($request->file('scan_pernyataan_desa'),"atraksi-wisata","scan_pernyataan_desa");
        $struktur_organisasi = Kustom::uploadBerkas($request->file('struktur_organisasi'),"atraksi-wisata","struktur_organisasi");
        DB::table('atraksi-wisata')->insert([
            'id_pemohon'    => $id_pemohon,

            'umur'      => $request['umur'],
            'nama_usaha'    => $request['nama_usaha'],
            'alamat_usaha'  =>  $request['alamat_usaha'],
            'jumlah_karyawan'    => $request['jumlah_karyawan'],
            'nilai_aset'    =>  $request['nilai_aset'],
            'scan_ktp'      => $scan_ktp,
            'scan_pengantar'         => $scan_pengantar,
            'scan_pernyataan_desa'  => $scan_pernyataan_desa,
            'struktur_organisasi' => $struktur_organisasi,
        ]);
        return redirect()->back()->with('sukses', "Pengisian formulir berhasil, mohon untuk menunggu informasi lebih lanjut");
    }

    public function formDN(Request $request)
    {
        $request->validate([
            'nama' => 'required', 'nik' => 'required|min:16|max:18', 'telepon' => 'required', 'pekerjaan' => 'required', 'rt' => 'required', 'rw' => 'required', 'jalan' => 'required',
            'calon_suami' => 'required', 'umur_calon_suami' => 'required', 
            'calon_istri' => 'required', 'umur_calon_istri' => 'required', 
            'tanggal_nikah' => 'required',
            'scan_ktp' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048', 'scan_kk' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048'
        ], Kustom::validasi());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama'],
            'kode'  => Kustom::generateKode(6),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['daerah_id'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        $scan_ktp = Kustom::uploadBerkas($request->file('scan_ktp'),"dispensasi-nikah","scan_ktp");
        $scan_kk = Kustom::uploadBerkas($request->file('scan_kk'),"dispensasi-nikah","scan_kk");
        if($request->hasFile('akta_cerai')){
            $akta_cerai = Kustom::uploadBerkas($request->file('akta_cerai'),"dispensasi-nikah","akta_cerai");
        }else{
            $akta_cerai = null;
        }
        DB::table('dispensasi-nikah')->insert([
            'id_pemohon'    => $id_pemohon,

            'calon_suami'      => $request['calon_suami'],
            'umur_calon_suami'    => $request['umur_calon_suami'],
            'calon_istri'  =>  $request['calon_istri'],
            'umur_calon_istri'    => $request['umur_calon_istri'],
            'tanggal_nikah'    =>  $request['tanggal_nikah'],
            'scan_ktp'      => $scan_ktp,
            'scan_kk'         => $scan_kk,
            'akta_cerai'  => $akta_cerai,
        ]);
        return redirect()->back()->with('sukses', "Pengisian formulir berhasil, mohon untuk menunggu informasi lebih lanjut");

    }


    public function FormPPDD(Request $request)
    {
        dd($request->all());
    }

    public function FormPPAK(Request $request)      
    {
        // dd($request->all());

        // FORM F-1.30
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama'],
            'kode'  => Kustom::generateKode(6),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['daerah_id'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'sublayanan_id' => $request['sublayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $scan_ktp = Kustom::uploadBerkas($request->file('scan_ktp'),"pindah-pergi-antar-kecamatan","scan_ktp");
        $scan_kk = Kustom::uploadBerkas($request->file('scan_kk'),"pindah-pergi-antar-kecamatan","scan_kk");
        $scan_pengantar_rt = Kustom::uploadBerkas($request->file('scan_pengantar_rt'),"pindah-pergi-antar-kecamatan","scan_pengantar_rt");
        $form_129 = Kustom::uploadBerkas($request->file('form_129'),"pindah-pergi-antar-kecamatan","form_129");
        $alasan = Kustom::imp($request->input('alasan'));
        $nik_kel = Kustom::imp($request->input('nik_kel'));
        $nama_kel = Kustom::imp($request->input('nama_kel'));
        $masa_kel = Kustom::imp($request->input('masa_kel'));
        $shdk = Kustom::imp($request->input('shdk'));
        $id_pemohon = $pemohon->id;
        DB::table('pindah-pergi-antar-kecamatan')->insert([
            'id_pemohon'    => $id_pemohon,
            'nomor_kk'=> $request->input('nomor_kk'),
            'kepala_keluarga'=> $request->input('kepala_keluarga'),
            'alamat_1'=> $request->input('alamat_1'),
            'rt_1'=> $request->input('rt_1'),
            'rw_1'=> $request->input('rw_1'),
            'dusun_1'=> $request->input('dusun_1'),
            'kodepos_1'=> $request->input('kodepos_1'),
            'telepon_1'=> $request->input('telepon_1'),
            'alamat_2'=> $request->input('alamat_2'),
            'rt_2'=> $request->input('rt_2'),
            'rw_2'=> $request->input('rw_2'),
            'dusun_2'=> $request->input('dusun_2'),
            'desa_2'=> $request->input('desa_2'),
            'kecamatan_2'=> $request->input('kecamatan_2'),
            'kodepos_2'=> $request->input('kodepos_2'),
            'telepon_2'=> $request->input('telepon_2'),
            'jenis_pindah'=> $request->input('jenis_pindah'),
            'stat_kk_nonpindah'=> $request->input('stat_kk_nonpindah'),
            'stat_kk_pindah'=> $request->input('stat_kk_pindah'),
            'alasan'=>$alasan,
            'nik_kel'=>$nik_kel,
            'nama_kel'=>$nama_kel,
            'masa_kel'=>$masa_kel,
            'shdk'=>$shdk,
            'scan_ktp'=>$scan_ktp,
            'scan_kk'=>$scan_kk,
            'scan_pengantar_rt'=>$scan_pengantar_rt,
            'form_129'=>$form_129,
        ]);
        return redirect()->back()->with('sukses', "Pengisian formulir berhasil, mohon untuk menunggu informasi lebih lanjut");
    }
    public function FormPDAK(Request $request)      
    {
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama'],
            'kode'  => Kustom::generateKode(6),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['daerah_id'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'sublayanan_id' => $request['sublayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        $buat_ktp_kk = Kustom::uploadBerkas($request->file('buat_ktp_kk'),"pindah-datang-antar-kecamatan","buat_ktp_kk");
        $form_131 = Kustom::uploadBerkas($request->file('form_131'),"pindah-datang-antar-kecamatan","form_131");
        $form_130 = Kustom::uploadBerkas($request->file('form_130'),"pindah-datang-antar-kecamatan","form_130");
        $nik_kel = Kustom::imp($request->input('nik_kel'));
        $nama_kel = Kustom::imp($request->input('nama_kel'));
        $masa_kel = Kustom::imp($request->input('masa_kel'));
        $shdk = Kustom::imp($request->input('shdk'));
        DB::table('pindah-datang-antar-kecamatan')->insert([
            'id_pemohon'    => $id_pemohon,
            'nomor_kk'=> $request->input('nomor_kk'),
            'kepala_keluarga'=> $request->input('kepala_keluarga'),
            'alamat_1'=> $request->input('alamat_1'),
            'rt_1'=> $request->input('rt_1'),
            'rw_1'=> $request->input('rw_1'),
            'dusun_1'=> $request->input('dusun_1'),
            'desa_1'=> $request->input('desa_1'),
            'kecamatan_1'=> $request->input('kecamatan_1'),
            'kodepos_1'=> $request->input('kodepos_1'),
            'telepon_1'=> $request->input('telepon_1'),
            'alamat_2'=> $request->input('alamat_2'),
            'rt_2'=> $request->input('rt_2'),
            'rw_2'=> $request->input('rw_2'),
            'dusun_2'=> $request->input('dusun_2'),
            'desa_2'=> $request->input('desa_2'),
            'kodepos_2'=> $request->input('kodepos_2'),
            'telepon_2'=> $request->input('telepon_2'),
            'stat_kk_pindah'=> $request->input('stat_kk_pindah'),
            'nik_kel'=>$nik_kel,
            'nama_kel'=>$nama_kel,
            'masa_kel'=>$masa_kel,
            'shdk'=>$shdk,
            'buat_ktp_kk'=>$buat_ktp_kk,
            'form_131'=>$form_131,
            'form_130'=>$form_130,
        ]);
        return redirect()->back()->with('sukses', "Pengisian formulir berhasil, mohon untuk menunggu informasi lebih lanjut");
    }
    public function FormPPAKab(Request $request)      
    {
        dd($request->all());
    }
    public function FormPDAKab(Request $request)      
    {
        dd($request->all());
    }
    
    
    

    public function pengaturanAkun()
    {
        $admin = Admin::where('username', session('username'))->first();
        $daerah = Daerah::where('admin_id', $admin->id)->first();
        $data = [
            'admin' => $admin,
            'daerah' => $daerah
        ];
        return view('v2/desa/pengaturan-akun', $data);
    }
    public function datalayanan()
    {
        $pelayanan = Pelayanan::get();
        $pemohon = Pemohon::where('daerah_id', session('daerah'))->get();
        $data = [
            'pelayanan' => $pelayanan,
            'pemohon' => $pemohon
        ];
        return view('v2/desa/data-pemohon', $data);
    }
    public function datapemohonDetail($slug)
    {
        $pelayanan = Pelayanan::where('slug', $slug)->first();
        $sublayanan = Sublayanan::where('id_pelayanan', $pelayanan->id)->get();
        $pemoho = Pemohon::where('daerah_id', session('daerah'))->get();
        $data = [
            'pelayanan' => $pelayanan,
            'cek' =>  count(Sublayanan::where('id_pelayanan', $pelayanan->id)->get()),
            'sublayanan' => $sublayanan,
            'pemohon' => $pemoho,
            'slug' => $slug
        ];
        return view('v2/desa/data-pemohon-detail', $data);
    }
    public function datapemohonDetailSub($slug, $slug1)
    {
        $pelayanan = Pelayanan::where('slug', $slug)->first();
        $sublayanan = Sublayanan::where('slug', $slug1)->first();
        $data = [
            'pelayanan' => $pelayanan,
            'sublayanan' => $sublayanan,
            'slug' => $slug1
        ];
        return view('v2/desa/data-pemohon-sub', $data);
    }
    public function DetailPemohon($slug, $kode)
    {
        // dd($kode);
        $dataDetail = DB::table("$slug")
            ->join('pemohons', 'pemohons.id', '=', "$slug.id_pemohon")
            ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
            ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
            ->where('pemohons.kode', "$kode")
            ->first();
        $getID = DB::table("pemohons")
            ->join("$slug", "$slug.id_pemohon", '=', 'pemohons.id')
            ->where('pemohons.kode', "$kode")
            ->first();
        $pelayanan = Pelayanan::where('slug', $slug)->first();
        if ($slug == "izin-reklame") {
            $reklame = DB::table('jenis-reklame')->find($dataDetail->id_reklame);

            $data = [
                'data' => $dataDetail,
                'id_berkas' => $getID->id,
                'layanan' => $pelayanan,
                'kode' => $kode,
                'nama_reklame' => $reklame->nama_reklame
            ];
        } else {
            $data = [
                'data' => $dataDetail,
                'id_berkas' => $getID->id,
                'layanan' => $pelayanan,
                'kode' => $kode,
            ];
        }
        return view('v2/desa/data-detail-pemohon', $data);
    }
    public function UbahDetailPemohon($slug, $kode)
    {
        $cek = Pemohon::where('kode',$kode)->first();
        if($cek->status !="Revisi"){
            return redirect()->back();
        }else{
        $dataDetail = DB::table("$slug")
            ->join('pemohons', 'pemohons.id', '=', "$slug.id_pemohon")
            ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
            ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
            ->where('pemohons.kode', "$kode")
            ->first();
        $getID = DB::table("pemohons")
            ->join("$slug", "$slug.id_pemohon", '=', 'pemohons.id')
            ->where('pemohons.kode', "$kode")
            ->first();
        $pelayanan = Pelayanan::where('slug', $slug)->first();
        $daerah = Daerah::find(session('daerah'));
        if ($slug == "izin-reklame") {
            $reklame = DB::table('jenis-reklame')->find($dataDetail->id_reklame);

            $data = [
                'data' => $dataDetail,
                'id_berkas' => $getID->id,
                'pelayanan' => $pelayanan,
                'kode' => $kode,
                'daerah' => $daerah,
                'reklame' => DB::table('jenis-reklame')->where('id','<>',$dataDetail->id_reklame)->get(),
                'nama_reklame' => $reklame
            ];
        } else {
           
            $data = [
                'data' => $dataDetail,
                'id_berkas' => $getID->id,
                'pelayanan' => $pelayanan,
                'kode' => $kode,
                'daerah' => $daerah,
            ];
        }
        return view('v2/desa/ubah-data-pemohon-1', $data);
    }
    }
    public function DetailPemohonSub($slug,$kode)
    {
        $dataDetail = DB::table("$slug")
            ->join('pemohons', 'pemohons.id', '=', "$slug.id_pemohon")
            ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
            ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
            ->join('sublayanans', 'sublayanans.id', '=', 'pemohons.sublayanan_id')
            ->where('pemohons.kode', "$kode")
            ->first();
        $getID = DB::table("pemohons")
            ->join("$slug", "$slug.id_pemohon", '=', 'pemohons.id')
            ->where('pemohons.kode', "$kode")
            ->first();
        $sublayanan = Sublayanan::where('slug', $slug)->first();
        $pelayanan = Pelayanan::where('id', $dataDetail->pelayanan_id)->first();
        $daerah = Daerah::find(session('daerah'));
        $data = [
            'data' => $dataDetail,
            'id_berkas' => $getID->id,
            'pelayanan' => $pelayanan,
            'sublayanan' => $sublayanan,
            'kode' => $kode,
            'daerah'=>$daerah
        ];
        // dd($data);
        return view('v2/desa/data-detail-pemohon-2', $data);
        
    }
    public function UbahDetailPemohonSub($slug,$kode)
    {
        $cek = Pemohon::where('kode',$kode)->first();
        if($cek->status !="Revisi" ){
            return redirect()->back();

        }else{
    $dataDetail = DB::table("$slug")
        ->join('pemohons', 'pemohons.id', '=', "$slug.id_pemohon")
        ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
        ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
        ->join('sublayanans', 'sublayanans.id', '=', 'pemohons.sublayanan_id')
        ->where('pemohons.kode', "$kode")
        ->first();
    $getID = DB::table("pemohons")
        ->join("$slug", "$slug.id_pemohon", '=', 'pemohons.id')
        ->where('pemohons.kode', "$kode")
        ->first();
    $sublayanan = Sublayanan::where('slug', $slug)->first();
    $pelayanan = Pelayanan::where('id', $dataDetail->pelayanan_id)->first();
    $daerah = Daerah::find(session('daerah'));
    $data = [
        'data' => $dataDetail,
        'id_berkas' => $getID->id,
        'pelayanan' => $pelayanan,
        'sublayanan' => $sublayanan,
        'kode' => $kode,
        'daerah'=>$daerah
    ];
    
    return view('v2/desa/ubah-data-pemohon-2', $data);
    }
}
    public function UpdateData1($slug,$kode,Request $request)
    {
        $id_pemohon = Pemohon::where('kode',$kode)->first();
        $cekBerkas =  DB::table("$slug")->where('id_pemohon',$id_pemohon->id)->first();
        Pemohon::where('kode',$kode)->update([
            'nama'  =>  $request['nama'],
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['daerah_id'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'sublayanan_id' => $request['sublayanan_id'],
            'status' => 'Belum',
            'updated_at'    =>  now(+7.00),
        ]);
        $data = $request->all();
        $berkas = [
            'scan_ktp' => $request->file('scan_ktp'),
            'scan_persetujuan_tetangga' => $request->file('scan_persetujuan_tetangga'),
            'scan_fc_kepemilikan_tanah' => $request->file('scan_fc_kepemilikan_tanah'),
            'scan_fc_sppt_pbb_terakhir' => $request->file('scan_fc_sppt_pbb_terakhir'),
            'scan_gambar_rencana' => $request->file('scan_gambar_rencana'),
            'scan_pengantar'=> $request->file('scan_pengantar'),
            'scan_npwp'         => $request->file('scan_npwp'),
            'contoh_reklame'    => $request->file('contoh_reklame'),
            'scan_persetujuan'  => $request->file('scan_persetujuan'),
            'scan_kk'         => $request->file('scan_kk'),
            'scan_izin_lama'    => $request->file('scan_izin_lama'),
            'scan_pernyataan_desa'  =>$request->file('scan_pernyataan_desa'),
            'struktur_organisasi'=>$request->file('struktur_organisasi'),
            'foto'  => $request->file('foto')
        ];
        $method = "update_".str_replace('-','_',"$slug");
        DB::table("$slug")->where('id_pemohon',$id_pemohon->id)->update([
            'pesan'=>null
        ]);
        Kustom::$method($data,$id_pemohon->id,$slug,$cekBerkas,$berkas);
        if( $request['sublayanan_id'] == null){
            return redirect("desa/v2/data-pemohon/$slug");
        }else{
            $pela = Pelayanan::find($request['pelayanan_id']);
            return redirect("desa/v2/data-pemohon/$pela->slug/$slug");
        }
        

    }
    
    
}
