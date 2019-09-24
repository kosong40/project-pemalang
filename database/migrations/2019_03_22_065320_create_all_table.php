<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level');
        });
        Schema::create('daerahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_daerah');
            $table->string('jenis_daerah');
            $table->string('kepala_daerah');
            $table->string('nip')->nullable();
        });
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('nama');
            $table->string('kontak');
            $table->Integer('daerah_id')->unsigned();
            $table->foreign('daerah_id')->references('id')->on('daerahs');
            $table->string('status')->default("0");
            $table->string('level');
            $table->timestamps();
        });
        
        Schema::create('pelayanans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pelayanan');
            $table->string('jenis_pelayanan');
            $table->longText('keterangan')->nullable();
            $table->string('slug');
        });
        Schema::create('sublayanans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subpelayanan');
            $table->string('jenis_pelayanan');
            $table->text('keterangan')->nullable();
            $table->string('slug');
            $table->foreign('id_pelayanan')->references('id')->on('pelayanans');
            $table->integer('id_pelayanan')->unsigned();
        });

        Schema::create('pemohons', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('kode', 16)->unique();
            $table->string('nama');
            $table->string('nik', 16);
            $table->string('telepon');
            $table->string('pekerjaan');
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('jalan')->nullable();
            $table->Integer('daerah_id')->unsigned();
            $table->foreign('daerah_id')->references('id')->on('daerahs');
            $table->Integer('pelayanan_id')->unsigned();
            $table->foreign('pelayanan_id')->references('id')->on('pelayanans');
            $table->Integer('sublayanan_id')->unsigned()->nullable();
            $table->foreign('sublayanan_id')->references('id')->on('sublayanans');
            $table->string('status')->default('Belum');
            $table->timestamps();
        });
        Schema::create('jenis-reklame', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_reklame');
        });
        Schema::create('izin-reklame', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->Integer('id_reklame')->unsigned();
            $table->foreign('id_reklame')->references('id')->on('jenis-reklame');
            $table->Integer('banyak')->unsigned();
            $table->string('pesan_produk');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('tempat_reklame');
            $table->string('scan_ktp');
            $table->string('scan_npwp');
            $table->string('contoh_reklame');
            $table->string('scan_persetujuan');
            $table->string('scan_izin_lama')->nullable();
            $table->string('scan_pengantar');
            $table->string('pesan')->nullable();
            // $table->string('status')->default('Belum');
        });
        Schema::create('izin-mendirikan-bangunan', function (BLueprint $table) {
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('keperluan_bangunan');
            $table->string('konstruksi_bangunan');
            $table->float('luas_bangunan', 8, 2);
            $table->float('luas_tanah', 8, 2);
            $table->string('letak_bangunan');
            $table->string('tanah_milik');
            $table->string('scan_ktp');
            $table->string('scan_persetujuan_tetangga');
            $table->string('scan_fc_kepemilikan_tanah');
            $table->string('scan_fc_sppt_pbb_terakhir');
            $table->string('scan_gambar_rencana');
            $table->string('scan_pengantar');
            $table->string('pesan')->nullable();
        });
        Schema::create('izin-usaha-mikro-dan-kecil', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->string('kodepos');
            $table->string('sektor_usaha');
            $table->string('sarana');
            $table->string('modal');
            $table->string('npwp');
            $table->string('klasifikasi');
            $table->string('scan_ktp');
            $table->string('scan_kk');
            $table->string('scan_pengantar');
            $table->string('foto');
            $table->string('pesan')->nullable();
            // $table->string('status')->default('Belum');
        });
        Schema::create('salon-kecantikan', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('jenis');
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->string('nama_usaha_baru')->nullable();
            $table->string('scan_ktp');
            $table->string('scan_pengantar');
            $table->string('pesan')->nullable();
            // $table->string('status')->default('Belum');
        });
        Schema::create('gelanggang-ketangkasan', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->string('jumlah_monitor');
            $table->string('scan_ktp');
            $table->string('scan_pengantar');
            $table->string('scan_pernyataan_desa');
            $table->string('pesan')->nullable();
            // $table->string('status')->default('Belum');
        });
        Schema::create('atraksi-wisata', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('umur', 3);
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->string('jumlah_karyawan');
            $table->string('nilai_aset');
            $table->string('scan_ktp');
            $table->string('scan_pengantar');
            $table->string('scan_pernyataan_desa');
            $table->string('struktur_organisasi');
            $table->string('pesan')->nullable();
            // $table->string('status')->default('Belum');
        });
        Schema::create('rumah-makan', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('jenis');
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->string('nama_usaha_baru')->nullable();
            $table->string('scan_ktp');
            $table->string('scan_pengantar');
            $table->string('pesan')->nullable();
            // $table->string('status')->default('Belum');
        });

        Schema::create("dispensasi-nikah",function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('calon_suami', 50);
            $table->string('calon_istri', 50);
            $table->smallInteger('umur_calon_suami');
            $table->smallInteger('umur_calon_istri');
            $table->date('tanggal_nikah');
            $table->string('scan_ktp');
            $table->string('scan_kk');
            $table->string('akta_cerai')->nullable();
            $table->string('pesan')->nullable();
        });

        Schema::create("rekomendasi-pendirian-kelompok-seni",function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('pesan')->nullable();
        });
        
        Schema::create("pindah-pergi-datang-antar-desa",function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('pesan')->nullable();
        });

        Schema::create("pindah-pergi-antar-kecamatan",function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('nomor_kk', 16);
            $table->string('kepala_keluarga', 50);
            $table->string('alamat_1', 100);
            $table->string('rt_1', 3);
            $table->string('rw_1', 3);
            $table->string('dusun_1', 100);
            $table->string('kodepos_1', 5)->nullable();
            $table->string('telepon_1', 15)->nullable();
            $table->string('alamat_2', 100);
            $table->string('rt_2', 3);
            $table->string('rw_2', 3);
            $table->string('dusun_2', 100);
            $table->string('desa_2', 100);
            $table->string('kecamatan_2', 100);
            $table->string('kodepos_2', 5)->nullable();
            $table->string('telepon_2', 15)->nullable();
            $table->string('alasan', 20);
            $table->enum('jenis_pindah', [1,2,3,4]);
            $table->enum('stat_kk_nonpindah', [1,2,3]);
            $table->enum('stat_kk_pindah', [1,2,3]);
            $table->string('nik_kel');
            $table->string('nama_kel');
            $table->string('masa_kel');
            $table->string('shdk');
            $table->string('scan_ktp');
            $table->string('scan_kk');
            $table->string('scan_pengantar_rt');
            $table->string('form_129');
            $table->string('no_sk')->unique()->nullable();
            $table->string('pesan')->nullable();
        });
        Schema::create("pindah-datang-antar-kecamatan",function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('nomor_kk', 16);
            $table->string('kepala_keluarga', 50);
            $table->string('alamat_1', 100);
            $table->string('rt_1', 3);
            $table->string('rw_1', 3);
            $table->string('dusun_1', 100);
            $table->string('desa_1', 100);
            $table->string('kecamatan_1', 100);
            $table->string('kodepos_1', 5)->nullable();
            $table->string('telepon_1', 15)->nullable();
            $table->string('alamat_2', 100);
            $table->string('rt_2', 3);
            $table->string('rw_2', 3);
            $table->string('dusun_2', 100);
            $table->string('desa_2', 100);
            $table->string('kodepos_2', 5)->nullable();
            $table->string('telepon_2', 15)->nullable();
            $table->enum('stat_kk_pindah', [1,2,3]);
            $table->string('nik_kel');
            $table->string('nama_kel');
            $table->string('masa_kel');
            $table->string('shdk');
            $table->string('buat_ktp_kk');
            $table->string('form_131');
            $table->string('form_130');
            $table->string('no_sk')->unique()->nullable();
            $table->string('pesan')->nullable();
        });
        Schema::create("pindah-pergi-antar-kabupaten",function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('pesan')->nullable();
        });
        Schema::create("pindah-datang-antar-kabupaten",function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('pesan')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('levels');
        Schema::drop('admins');
        Schema::drop('daerahs');
        Schema::drop('pelayanans');
        Schema::drop('sublayanans');
        Schema::drop('berkas');
        Schema::drop('pemohons');
        Schema::drop('izin-reklame');
        Schema::drop('izin-mendirikan-bangunan');
        Schema::drop('izin-usaha-mirko-dan-kecil');
        Schema::drop('salon-kecantikan');
        Schema::drop('gelanggang-ketangkasan');
        Schema::drop('atraksi-wisata');
        Schema::drop('rumah-makan');
        Schema::drop('jenis-reklame');
    }
}
