<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Helpers\kustom;
use App\Admin;
use App\Daerah;
use App\Pelayanan;
use App\Sublayanan;
use App\Pemohon;
use App\imb;
use Datatables;
use PDF;

class KecamatanV2 extends Controller
{
    public function home()
    {
        $tgl = date('Y-m-d');
        // dd(Pemohon::where('created_at','like',"$tgl%")->get());
        $dataMasuk  = count(DB::table("pemohons")->whereDate('created_at', DB::raw('CURDATE()'))->get());
        $dataTotal  = count(DB::table('pemohons')->get());
        $pelayanan  = Pelayanan::get();
        $daerah     = Daerah::where('nama_daerah', '<>', 'Pemalang')->get();
        $dataPemohon = Pemohon::get();
        $data = [
            'hari_ini'  =>  $dataMasuk,
            'total'     =>  $dataTotal,
            'pelayanan' => count($pelayanan),
            'tabelData' => Pemohon::get(),
            'daerah' => $daerah,
            'dataPemohon' => $dataPemohon
        ];
        return view('v2/kecamatan/index', $data);
    }
    public function dataLayanan()
    {
        $pemohon = Pemohon::get();
        $pelayanan = Pelayanan::get();
        $data = [
            'pelayanan' =>  $pelayanan,
            'pemohon'   =>  $pemohon
        ];
        return view('v2/kecamatan/data-layanan', $data);
    }
    public function dataLayananDetail($slug)
    {
        $pelayanan = Pelayanan::where('slug', $slug)->first();
        $sublayanan = Sublayanan::where('id_pelayanan', $pelayanan->id)->get();
        $pemohon = Pemohon::get();
        $data = [
            'pelayanan'  =>  $pelayanan->pelayanan,
            'slug'       =>  $slug,
            'cek' =>  count(Sublayanan::where('id_pelayanan', $pelayanan->id)->get()),
            'pemohon'   =>  $pemohon,
            'sublayanan'   => $sublayanan
        ];
        return view('v2/kecamatan/data-layanan-detail', $data);
    }
    public function dataSublayanan($slug, $slug1)
    {
        $pelayanan = Pelayanan::where('slug', $slug)->first();
        $sublayanan = Sublayanan::where('slug', $slug1)->first();
        $data = [
            'pelayanan' => $pelayanan,
            'sublayanan' => $sublayanan->subpelayanan,
            'slug' => $slug1
        ];
        return view('v2/kecamatan/data-sublayanan', $data);
    }
    public function adminDesa()
    {
        $akun = Daerah::leftJoin('admins', 'daerahs.id', '=', 'admins.daerah_id')->where('nama_daerah', '<>', 'Pemalang')->get();
        $data = [
            'akun' => $akun
        ];
        return view('v2/kecamatan/admin-desa', $data);
    }
    public function pengaturanLayanan()
    {
        $pelayanan = Pelayanan::get();
        $data = [
            'pelayanan' => $pelayanan
        ];
        return view('v2/kecamatan/pengaturan-layanan', $data);
    }
    public function infoLayanan($slug)
    {
        // dd($slug);
        $pelayanan = Pelayanan::where('slug', $slug)->first();
        $data = [
            'pelayanan' => $pelayanan,
            'sublayanan' => Sublayanan::where('id_pelayanan', $pelayanan->id)->get(),
            'cek' =>  count(Sublayanan::where('id_pelayanan', $pelayanan->id)->get()),
        ];
        return view('v2/kecamatan/pengaturan-layanan-detail', $data);
    }
    public function infoSublayanan($slug, $slug2)
    {
        $pelayanan = Pelayanan::where('slug', $slug)->first();
        $sublayanan = Sublayanan::where('slug', $slug2)->first();
        $data = [
            'pelayanan' => $pelayanan,
            'sublayanan' => $sublayanan
        ];
        return view('v2/kecamatan/pengaturan-layanan-detail-sub', $data);
    }
    public function infoLayananUbah(Request $request, $slug)
    {
        // dd($request->all());
        Pelayanan::where('slug', $slug)->update([
            'keterangan' => $request['keterangan']
        ]);
        return redirect()->back()->with('sukses', 'Informasi pelayanan berhasil diubah');
    }
    public function infoSublayananUbah(Request $request, $slug, $slug2)
    {
        Sublayanan::where("slug", $slug2)->update([
            'keterangan' => $request['keterangan']
        ]);
        return redirect()->back()->with('sukses', 'Informasi pelayanan berhasil diubah');
    }
    public function LayananDetail($slug, $kode)
    {
        // dd($kode);
        // dd(DB::table("$slug")->get());
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
        // dd($dataDetail);
        return view('v2/kecamatan/layanan-detail', $data);
    }
    public function SublayananDetail($slug, $kode)
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
        $data = [
            'data' => $dataDetail,
            'id_berkas' => $getID->id,
            'layanan' => $pelayanan,
            'sublayanan' => $sublayanan,
            'kode' => $kode,
        ];
        // dd($data);
        return view('v2/kecamatan/sublayanan-detail', $data);
    }
    public function addNoSK(Request $request, $id, $slug, $kode)
    {
        // dd($request->all());
        $no_sk = implode('/', $request['no_sk']);
        $cek = DB::table("$slug")
            ->where('no_sk', $no_sk)
            ->get();
        if (count($cek) > 0) {
            return redirect()->back()->with('gagal', 'Nomor Surat Keputusan gagal ditambahkan');
        } else {
            DB::table("$slug")->where('id', $id)
                ->update([
                    'no_sk' => implode("/", $request['no_sk']),
                    'pesan' => "Nomor Surat Keputusan sudah diterbitkan"
                ]);
            Pemohon::where('kode', $kode)->update([
                'status' => "Sudah ada nomor SK",
                'updated_at' => now(+7.00)
            ]);
            if ($request['tombol'] == "Ubah") {
                return redirect()->back()->with('ubah', 'Nomor Surat Keputusan berhasil diubah');
            } else {
                return redirect()->back()->with('sukses', 'Nomor Surat Keputusan berhasil ditambahkan');
            }
        }
    }
    public function SetujuKec($id, $slug, $kode)
    {
        DB::table("$slug")->where('id', $id)
            ->update([
                'pesan' => "Surat keputusan sudah bisa dicetak",
            ]);
        Pemohon::where('kode', $kode)->update([
            'status' => 'Setuju',
            'updated_at' => now(+7.00)
        ]);
        return redirect()->back()->with('sukses', 'Permohonan disetujui');
    }
    public function revForm(Request $request,$id, $slug, $kode)
    {
        // dd($request->all());
        DB::table("$slug")->where('id', $id)
            ->update([
                'pesan' => "$request->catatan",
            ]);
        Pemohon::where('kode', $kode)->update([
            'status' => 'Revisi',
            'updated_at' => now(+7.00)
        ]);
        return redirect()->back()->with('sukses', 'Pengajuan revisi berhasil');
    }
    public function pengaturanAkunKec()
    {
        $admin = Admin::where('username', session('username'))->first();
        $daerah = Daerah::where('admin_id', $admin->id)->first();
        $data = [
            'admin' => $admin,
            'daerah' => $daerah
        ];
        return view('v2/kecamatan/pengaturan-akun', $data);
    }
    public function akunProfil(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'telepon' => 'numeric|required',
            'email' => 'email|required'
        ], Kustom::validasi());
        $cekEmail = Admin::where('email', $request['email'])->get();
        $cekEmail2 = Admin::where('email', $request['email'])->first();
        if (count($cekEmail) == 0) {
            Admin::where('username', session('username'))->update([
                'nama'      => $request['nama'],
                'kontak'    => $request['telepon'],
                'email'     =>  $request['email'],
                'status'    => '0',
                'remember_token' => '',
                'updated_at' => now(+7.00)
            ]);
            session()->flush();
            return redirect('/login');
        } elseif ($cekEmail2 != $request['email']) {
            Admin::where('username', session('username'))->update([
                'nama'      => $request['nama'],
                'kontak'    => $request['telepon'],
                'email'     =>  $request['email'],
                'status'    => '0',
                'remember_token' => '',
                'updated_at' => now(+7.00)
            ]);
            session()->flush();
            return redirect('/login');
        } else {
            // dd($request['email']);
            return redirect()->back()->with('gagal', 'Email yang anda masukkan telah didaftarkan');
        }
    }


    public function akunPass(Request $request)
    {
        // dd($request->all());
        $admin      =   Admin::where('username', session('username'))->first();
        $request->validate([
            'password_lama'  => 'required',
            'password_baru'  => 'required|min:8',
            'ulangi_password_baru' =>  'required|min:8|same:password_baru'
        ], Kustom::validasi());

        if (Hash::check($request['password_lama'], $admin->password)) {
            Admin::where('username', session('username'))->update([
                'password'     =>  bcrypt($request['password_baru']),
                'status'    => '0',
                'remember_token' => '',
                'updated_at' => now(+7.00)
            ]);
            session()->flush();
            return redirect('/login');
        } else {
            return redirect()->back()->with('gagal', 'Password lama anda salah');
        }
    }
    public function profilDaerah(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'kepala_daerah'  => 'required',
            'nip'   =>  'required'
        ], Kustom::validasi());
        Daerah::where('id', $request['id'])->update([
            'kepala_daerah' => $request['kepala_daerah'],
            'nip'           =>  $request['nip']
        ]);
        return redirect()->back()->with('sukses', 'Berhasil mengubah informasi Kecamatan');
    }
    public function CetakPelayanan($slug,$kode)
    {
        // dd([$slug,$kode]);
        $daerah = Daerah::where('nama_daerah', 'Pemalang')->get();
        if($slug == "izin-reklame"){
        $layanan = DB::table("$slug")
            ->join('pemohons', 'pemohons.id', '=', "$slug.id_pemohon")
            ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
            ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
            ->join('jenis-reklame','jenis-reklame.id','=',"$slug.id_reklame")
            ->where("pemohons.kode", $kode)
            ->get();
        }else{
        $layanan = DB::table("$slug")
            ->join('pemohons', 'pemohons.id', '=', "$slug.id_pemohon")
            ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
            ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
            ->where("pemohons.kode", $kode)
            ->get();
        }
        // dd($layanan);
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'layanan' => $layanan,
            'daerah' => $daerah
        ];
        // dd($data);  
        return view("surat/$slug", $data);
    }
    public function CetakSublayanan($slug,$kode)
    {
        $layanan = DB::table("$slug")
            ->join('pemohons', 'pemohons.id', '=', "$slug.id_pemohon")
            ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
            ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
            ->join('sublayanans', 'sublayanans.id', '=', 'pemohons.sublayanan_id')
            ->where("pemohons.kode", $kode)
            ->get();
        $daerah = Daerah::where('nama_daerah', 'Pemalang')->get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'layanan' => $layanan,
            'daerah' => $daerah
        ];
        // dd($data);
        return view("surat/$slug", $data);
    }
}
