<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelayanan;
use App\Sublayanan;
use App\Admin;
use App\Daerah;
use DataTables;

class ApiAll extends Controller
{
    public function pelayanan()
    {
        $pelayanan = Pelayanan::select('id', 'pelayanan', 'jenis_pelayanan', 'slug')->get();
        return DataTables::of($pelayanan)
            ->addColumn('action', function ($slug) {
                return '<a class="btn btn-warning btn-sm" href=' . url('/kecamatan/pelayanan') . '/' . $slug->slug . '>Ubah </a>';
            })->make(true);
    }
    public function HalamanAkun()
    {
        $datas = Daerah::leftJoin('admins', 'daerahs.id', '=', 'admins.daerah_id')->where('nama_daerah', '<>', 'Pemalang')
            ->select('daerahs.id as id', 'nama_daerah', 'kepala_daerah', 'username', 'nama', 'kontak', 'email')->get();
        return DataTables::of($datas)
            ->setRowId('id')
            ->setRowClass('tombol')
            ->addColumn('action', function ($data) {
                if ($data->username == null) {
                    return "<a href='#add" . $data->nama_daerah . "'  class='btn btn-info btn-sm' data-toggle='modal'>Tambah</a>";
                } else {
                    return "<a href='#edit" . $data->nama_daerah . "' class='btn btn-warning btn-sm' data-toggle='modal'>Ubah</a>";
                }
            })
            ->addIndexColumn()->make(true);
    }
    public function desakelurahan()
    {
        $daerah = Daerah::get();
        return response()->json([
            'daerah' => $daerah
        ]);
    }
    public function dataLayanan($slug)
    {
        $layanan = DB::table("$slug")
            ->join('pemohons', 'pemohons.id', '=', "$slug.id_pemohon")
            ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
            ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
            ->orderBy('created_at', 'desc')
            ->get();

        return DataTables::of($layanan)
            ->editColumn('status', function ($data) {
                if ($data->status == "Setuju") {
                    return '<label class="label label-success"> Siap dicetak <i class="fa fa-print"></i> </label>';
                } elseif ($data->status == "Belum") {
                    return '<label class="label label-danger"> ' . $data->status . ' <i class="fa fa-spinner"></i> </label>';
                } else {
                    return '<label class="label label-warning"> Sudah ada Nomor SK <i class="fa fa-check"></i> </label>';
                }
            })
            ->addColumn('action', function ($data) {
                if ($data->status == "Belum") {
                    return '<a class="btn btn-info btn-sm" href=' . url('/kecamatan/layanan') . '/' . $data->slug . '/' . $data->kode . $data->id_pemohon . '>Detail </a>';
                } elseif ($data->status == "Setuju") {
                    return '<a class="btn btn-primary btn-sm" href=' . url('/kecamatan/layanan') . '/' . $data->slug . '/' . $data->kode . $data->id_pemohon . '/cetak' . '><i class="glyphicon glyphicon-print"></i> Cetak </a>';
                } else {
                    return '<a class="btn btn-success btn-sm" href=' . url('/kecamatan/layanan') . '/' . $data->slug . '/' . $data->kode . $data->id_pemohon . '/setujui' . '>Setujui </a>';
                }
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
    public function dataSublayanan($slug1, $slug2)
    {
        $layanan = DB::table("$slug2")
            ->join('pemohons', 'pemohons.id', '=', "$slug2.id_pemohon")
            ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
            ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
            ->join('sublayanans', 'sublayanans.id', '=', 'pemohons.sublayanan_id')
            ->get();
        return DataTables::of($layanan)
            ->editColumn('status', function ($data) {
                if ($data->status == "Setuju") {
                    return '<label class="label label-success"> Siap dicetak <i class="fa fa-print"></i> </label>';
                } elseif ($data->status == "Belum") {
                    return '<label class="label label-danger"> ' . $data->status . ' <i class="fa fa-spinner"></i> </label>';
                } else {
                    return '<label class="label label-warning"> Sudah ada Nomor SK <i class="fa fa-check"></i> </label>';
                }
            })
            ->addColumn('action', function ($data) {
                if ($data->status == "Belum") {
                    return '<a class="btn btn-info btn-sm" href=' . url('/kecamatan/sublayanan') . '/' . $data->slug . '/' . $data->kode . $data->id_pemohon . '/detail' . '>Detail </a>';
                } elseif ($data->status == "Setuju") {
                    return '<a class="btn btn-primary btn-sm" href=' . url('/kecamatan/sublayanan') . '/' . $data->slug . '/' . $data->kode . $data->id_pemohon . '/cetak' . '><i class="glyphicon glyphicon-print"></i> Cetak  </a>';
                } else {
                    return '<a class="btn btn-success btn-sm" href=' . url('/kecamatan/sublayanan') . '/' . $data->slug . '/' . $data->kode . $data->id_pemohon . '/setujui' . '>Setujui </a>';
                }
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'action'])
            ->make(true);
    }












    // v2

    //LAYANAN TERBARU
    public function allData()
    {
        $layanan = DB::table('pemohons')
        ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
        ->leftJoin('sublayanans', 'sublayanans.id', '=', 'pemohons.sublayanan_id')
        ->orderBy('pemohons.created_at', 'desc')
        ->where('status',"Belum")
        ->select(['pemohons.nama','pelayanans.pelayanan','pemohons.created_at','pelayanans.slug','sublayanans.subpelayanan','sublayanans.slug as slug2'])
        ->get();
        return DataTables::of($layanan)
        ->addColumn('action', function ($data) {
            
            if($data->slug2 == null){
                return '<a class="btn btn-info btn-sm" href=' . url('/kecamatan/v2/data-layanan') . '/' .$data->slug.'>Lihat </a>';
            }else{
                return '<a class="btn btn-info btn-sm" href=' . url('/kecamatan/v2/data-layanan') . '/' .$data->slug.'/'.$data->slug2.'>Lihat </a>';
            }
        })
        ->addColumn('pelayanane',function($data){
            if($data->slug2 == null){
                return "$data->pelayanan";
            }else{
                return "$data->pelayanan ($data->subpelayanan)";
            }
        })
        ->rawColumns(['action','pelayanane'])
        ->make(true);
    }
    // DATA LAYANAN


    public function dataLayananV2($slug)
    {
        $layanan = DB::table("$slug")
            ->join('pemohons', 'pemohons.id', '=', "$slug.id_pemohon")
            ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
            ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
            ->orderBy('pemohons.created_at', 'desc')
            ->get();

        return DataTables::of($layanan)
            ->editColumn('status', function ($data) {
                if ($data->status == "Setuju") {
                    return '<label class="label label-success"> Siap dicetak <i class="fa fa-print"></i> </label>';
                } elseif ($data->status == "Belum") {
                    return '<label class="label label-danger"> ' . $data->status . ' <i class="fa fa-spinner"></i> </label>';
                }elseif($data->status == "Revisi"){
                    return '<label class="label label-danger"> ' . $data->status . ' <i class="fa fa-cog"></i> </label>';
                }
                else {
                    return '<label class="label label-warning"> Sudah ada Nomor SK <i class="fa fa-check"></i> </label>';
                }
            })
            ->addColumn('action', function ($data) {

                if ($data->status != "Setuju") {
                    return '<a class="btn btn-info btn-sm" href=' . url('/kecamatan/v2/data-layanan') . '/' . $data->slug . '/' . $data->kode .  '/detail' . '>Detail </a>';
                } elseif ($data->status == "Setuju") {
                    return '<a class="btn btn-success btn-sm" href=' . url('/kecamatan/v2/data-layanan') . '/' . $data->slug . '/' . $data->kode .  '/detail' . '>Cetak </a>';
                }
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'action'])
            ->make(true);
    }


    // DATA SUBLAYANAN



    public function dataSublayananV2($slug)
    {
        $layanan = DB::table("$slug")
            ->join('pemohons', 'pemohons.id', '=', "$slug.id_pemohon")
            ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
            ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
            ->join('sublayanans', 'sublayanans.id', '=', 'pemohons.sublayanan_id')
            ->orderBy('pemohons.created_at', 'desc')
            ->get();

        return DataTables::of($layanan)
            ->editColumn('status', function ($data) {
                if ($data->status == "Setuju") {
                    return '<label class="label label-success"> Siap dicetak <i class="fa fa-print"></i> </label>';
                } elseif ($data->status == "Belum") {
                    return '<label class="label label-danger"> ' . $data->status . ' <i class="fa fa-spinner"></i> </label>';
                }elseif($data->status == "Revisi"){
                    return '<label class="label label-danger"> ' . $data->status . ' <i class="fa fa-cog"></i> </label>';
                } else {
                    return '<label class="label label-warning"> Sudah ada Nomor SK <i class="fa fa-check"></i> </label>';
                }
            })
            ->addColumn('action', function ($data) {

                if ($data->status != "Setuju") {
                    return '<a class="btn btn-info btn-sm" href=' . url('/kecamatan/v2/data-sublayanan') . '/' . $data->slug . '/' . $data->kode .  '/detail' . '>Detail </a>';
                } elseif ($data->status == "Setuju") {
                    return '<a class="btn btn-success btn-sm" href=' . url('/kecamatan/v2/data-sublayanan') . '/' . $data->slug . '/' . $data->kode .  '/detail' . '>Cetak </a>';
                }
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'action'])
            ->make(true);
    }


    // PELAYANAN

    public function pelayananV2()
    {
        $pelayanan = Pelayanan::select('id', 'pelayanan', 'jenis_pelayanan', 'slug')->get();
        return DataTables::of($pelayanan)
            ->editColumn('status', function ($data) {
                if ($data->status == "Setuju") {
                    return '<label class="label label-success"> Siap dicetak <i class="fa fa-print"></i> </label>';
                } elseif ($data->status == "Belum") {
                    return '<label class="label label-danger"> ' . $data->status . ' <i class="fa fa-spinner"></i> </label>';
                } else {
                    return '<label class="label label-warning"> Sudah ada Nomor SK <i class="fa fa-check"></i> </label>';
                }
            })
            ->addColumn('action', function ($slug) {
                return '<a class="btn btn-default btn-sm" href=' . url('/kecamatan/v2/pengaturan-layanan') . '/' . $slug->slug . '>Detail </a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }



    // DATA LAYANAN DESA/Kelurahan

    public function dataLayananV2Desa($slug, $desa)
    {
        $layanan = DB::table("$slug")
            ->join('pemohons', 'pemohons.id', '=', "$slug.id_pemohon")
            ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
            ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
            ->orderBy('pemohons.created_at', 'desc')
            ->where('pemohons.daerah_id', $desa)
            ->get();

        return DataTables::of($layanan)
            ->editColumn('status', function ($data) {
                if ($data->status == "Setuju") {
                    return '<label class="label label-success"> Siap dicetak <i class="fa fa-print"></i> </label>';
                } elseif ($data->status == "Belum") {
                    return '<label class="label label-danger"> ' . $data->status . ' <i class="fa fa-spinner"></i> </label>';
                }elseif($data->status == "Revisi"){
                    return '<label class="label label-danger"> ' . $data->status . ' <i class="fa fa-cog"></i> </label>';
                }
                 else {
                    return '<label class="label label-warning"> Sudah ada Nomor SK <i class="fa fa-check"></i> </label>';
                }
            })
            ->addColumn('action', function ($data) {

                if ($data->status != "Revisi") {
                    return '<a class="btn btn-success btn-sm" href=' . url('/desa/v2/data-pemohon') . '/' . $data->slug . '/' . $data->kode .  '/detail' . '>Detail </a>';
                } elseif ($data->status == "Revisi") {
                    return '
                    <a class="btn btn-warning btn-sm" href=' . url('/desa/v2/data-pemohon') . '/' . $data->slug . '/' . $data->kode .  '/ubah' . '>Ubah Data </a>
                    <a class="btn btn-success btn-sm" href=' . url('/desa/v2/data-pemohon') . '/' . $data->slug . '/' . $data->kode .  '/detail' . '>Detail </a>
                    ';
                }
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'action'])
            ->make(true);
    }



    // DATA SUBLAYANAN DESA/KELURAHAN


    public function dataSublayananV2Desa($slug, $slug1, $desa)
    {
        $layanan = DB::table("$slug1")
            ->join('pemohons', 'pemohons.id', '=', "$slug1.id_pemohon")
            ->join('daerahs', 'daerahs.id', '=', 'pemohons.daerah_id')
            ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
            ->join('sublayanans', 'sublayanans.id', '=', 'pemohons.sublayanan_id')
            ->orderBy('pemohons.created_at', 'desc')
            ->where('pemohons.daerah_id', $desa)
            ->get();

        return DataTables::of($layanan)
            ->editColumn('status', function ($data) {
                if ($data->status == "Setuju") {
                    return '<label class="label label-success"> Siap dicetak <i class="fa fa-print"></i> </label>';
                } elseif ($data->status == "Belum") {
                    return '<label class="label label-danger"> ' . $data->status . ' <i class="fa fa-refresh"></i> </label>';
                }
                elseif($data->status == "Revisi"){
                    return '<label class="label label-danger"> ' . $data->status . ' <i class="fa fa-cog"></i> </label>';
                } else {
                    return '<label class="label label-warning"> Sudah ada Nomor SK <i class="fa fa-check"></i> </label>';
                }
            })
            ->addColumn('action', function ($data) {
                if ($data->status != "Revisi") {
                    return '<a class="btn btn-success btn-sm" href=' . url('/desa/v2/data-pemohon') . '/' . $data->slug . '/sub/' . $data->kode .  '/detail' . '>Detail </a>';
                } elseif ($data->status == "Revisi") {
                    return '
                    <a class="btn btn-warning btn-sm" href=' . url('/desa/v2/data-pemohon') . '/' . $data->slug . '/sub/' . $data->kode .  '/ubah' . '>Ubah Data </a>
                    <a class="btn btn-success btn-sm" href=' . url('/desa/v2/data-pemohon') . '/' . $data->slug . '/sub/' . $data->kode .  '/detail' . '>Detail </a>
                    ';
                }
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
    public function DataCetak()
    {
        $layanan = DB::table('pemohons')
        ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
        ->leftJoin('sublayanans', 'sublayanans.id', '=', 'pemohons.sublayanan_id')
        ->orderBy('pemohons.created_at', 'desc')
        ->where('status',"Setuju")
        ->select(['pemohons.nama','pelayanans.pelayanan','pemohons.updated_at','pelayanans.slug','sublayanans.subpelayanan','sublayanans.slug as slug2'])
        ->get();
        return DataTables::of($layanan)
        ->addColumn('action', function ($data) {
            
            if($data->slug2 == null){
                return '<a class="btn btn-success btn-sm" href=' . url('/kecamatan/v2/data-layanan') . '/' .$data->slug.'>Cetak </a>';
            }else{
                return '<a class="btn btn-success btn-sm" href=' . url('/kecamatan/v2/data-layanan') . '/' .$data->slug.'/'.$data->slug2.'>Cetak </a>';
            }
        })
        ->addColumn('pelayanane',function($data){
            if($data->slug2 == null){
                return "$data->pelayanan";
            }else{
                return "$data->pelayanan ($data->subpelayanan)";
            }
        })
        ->rawColumns(['action','pelayanane'])
        ->make(true);
    }
    public function DataCetakDesa($desa)
    {
        $layanan = DB::table('pemohons')
        ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
        ->leftJoin('sublayanans', 'sublayanans.id', '=', 'pemohons.sublayanan_id')
        ->orderBy('pemohons.created_at', 'desc')
        ->where('status',"Setuju")
        ->where('pemohons.daerah_id',"$desa")
        ->select(['pemohons.nama','pelayanans.pelayanan','pemohons.updated_at','pelayanans.slug','sublayanans.subpelayanan','sublayanans.slug as slug2'])
        ->get();
        return DataTables::of($layanan)
        ->addColumn('action', function ($data) {
            
            if($data->slug2 == null){
                return '<a class="btn btn-success btn-sm" href=' . url('/desa/v2/data-pemohon') . '/' .$data->slug.'>Detail </a>';
            }else{
                return '<a class="btn btn-success btn-sm" href=' . url('/desa/v2/data-pemohon') . '/' .$data->slug.'/'.$data->slug2.'>Detail </a>';
            }
        })
        ->addColumn('pelayanane',function($data){
            if($data->slug2 == null){
                return "$data->pelayanan";
            }else{
                return "$data->pelayanan ($data->subpelayanan)";
            }
        })
        ->rawColumns(['action','pelayanane'])
        ->make(true);
    }
    public function DataRevisiDesa($desa)
    {
        $layanan = DB::table('pemohons')
        ->join('pelayanans', 'pelayanans.id', '=', 'pemohons.pelayanan_id')
        ->leftJoin('sublayanans', 'sublayanans.id', '=', 'pemohons.sublayanan_id')
        ->orderBy('pemohons.created_at', 'desc')
        ->where('status',"Revisi")
        ->where('pemohons.daerah_id',"$desa")
        ->select(['pemohons.nama','pelayanans.pelayanan','pemohons.updated_at','pelayanans.slug','sublayanans.subpelayanan','sublayanans.slug as slug2'])
        ->get();
        return DataTables::of($layanan)
        ->addColumn('action', function ($data) {
            
            if($data->slug2 == null){
                return '<a class="btn btn-danger btn-sm" href=' . url('/desa/v2/data-pemohon') . '/' .$data->slug.'>Detail </a>';
            }else{
                return '<a class="btn btn-danger btn-sm" href=' . url('/desa/v2/data-pemohon') . '/' .$data->slug.'/'.$data->slug2.'>Detail </a>';
            }
        })
        ->addColumn('pelayanane',function($data){
            if($data->slug2 == null){
                return "$data->pelayanan";
            }else{
                return "$data->pelayanan ($data->subpelayanan)";
            }
        })
        ->rawColumns(['action','pelayanane'])
        ->make(true);
    }
}
