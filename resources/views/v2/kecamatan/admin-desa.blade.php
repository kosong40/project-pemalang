@extends('layout.v2.kecamatan')
@section('title',"Admin Desa")
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('kecamatan/v2/')}}">Beranda</a></li>
<li class="breadcrumb-item active" aria-current="page">Admin Desa</li>
@endsection
@section('content')
    <div class="table-responsive">
        <table id="akunAdmin" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Desa/Kelurahan</th>
                    <th>Username Admin</th>
                    <th>Nama Admin</th>
                    <th>Kontak Admin</th>
                    <th>Email Admin</th>
                    <th>Atur</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

@foreach($akun as $data)
    <div class="modal fade" id="add{{$data['nama_daerah']}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Akun {{$data['nama_daerah']}}</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('AddAdminDesa')}}" method="POST">
                        <div class="form-group">
                            <label for="" class="label-control">Username</label>
                            <input type="text" value="Admin{{$data['nama_daerah']}}" readonly name="username" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Nama Admin</label>
                            <input type="text" value="" name="nama" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Kontak Admin</label>
                            <input type="text" value="" name="kontak" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Email Admin</label>
                            <input type="email" value="" name="email" id="" class="form-control">
                        </div>
                        @csrf
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit{{$data['nama_daerah']}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Akun {{$data['nama_daerah']}}</h4>
                </div>
                <div class="modal-body">
                    <form action="{{url('/kecamatan/akun/edit/'.$data['username'])}}" method="POST">
                        <div class="form-group">
                            <label for="" class="label-control">Username</label>
                            <input type="text" value="Admin{{$data['nama_daerah']}}" readonly name="username" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Nama Admin</label>
                            <input type="text" value="{{$data['nama']}}" name="nama" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Kontak Admin</label>
                            <input type="text" value="{{$data['kontak']}}" name="kontak" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Email Admin</label>
                            <input type="email" value="{{$data['email']}}" name="email" id="" class="form-control">
                        </div>
                        @csrf
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{url('kecamatan/akun/resetpass/'.$data['username'])}}" class="btn btn-warning">Reset Password</a>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
@section('css')
<link href="{{url('adminbite/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('js')
<script src="{{url('adminbite/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
        $(function () {
        $('button').click(function(){
            console.log('hall')
        });
        $('#akunAdmin').DataTable({
            "processing"    : true,
            "serverSide"    : true,
            "ajax"          : "{{url('/api/akunpage')}}",
            "buttons"       :[
                'print'
            ],
            "columns"       :[
                {"data" : "DT_RowIndex"},
                {"data" : "nama_daerah"},
                {"data" : "username"},
                {"data" : "nama"},
                {"data" : "kontak"},
                {"data" : "email"},
                {"data" : "action","classname":"tambah","orderable":false,"searchable":false }
            ]
        });
    });

</script>
@endsection