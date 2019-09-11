@extends('layout.v2.kecamatan')
@section('title','Data Layanan')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('kecamatan/v2/')}}">Beranda</a></li>
<li class="breadcrumb-item active" aria-current="page">Data Layanan</li>
@endsection
@section('content')
<div class="row">
    @foreach ($pelayanan as $pelayanan)

    <div class="col-sm-12 col-lg-3">
        <div class="card bg-light">
            <div class="card-body">
                <h4 class="card-title">{{$pelayanan->pelayanan}}</h4>
                <table class="table no-border mini-table m-t-20">
                    <tbody>
                        <tr>
                            <td class="text-muted">Total</td>
                            <td class="font-medium">{{count($pemohon->where('pelayanan_id',$pelayanan->id))}}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Siap Dicetak</td>
                            <td class="font-medium">
                                {{count($pemohon->where('pelayanan_id',$pelayanan->id)->where('status','Setuju'))}}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Sudah ada No SK</td>
                            <td class="font-medium">
                                {{count($pemohon->where('pelayanan_id',$pelayanan->id)->where('status','Sudah ada nomor SK'))}}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">Belum ada No SK</td>
                            <td class="font-medium">
                                {{count($pemohon->where('pelayanan_id',$pelayanan->id)->where('status','Belum'))}}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Revisi Berkas</td>
                            <td class="font-medium">
                                {{count($pemohon->where('pelayanan_id',$pelayanan->id)->where('status','Revisi'))}}</td>
                        </tr>
                    </tbody>
                </table>
                <p align="center"><a class="btn btn-info"
                        href="{{url('kecamatan/v2/data-layanan/'.$pelayanan->slug)}}">Detail <i
                            class="ti-arrow-right"></i></a></p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection