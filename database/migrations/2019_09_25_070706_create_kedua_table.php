<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeduaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("pindah-pergi-antar-kabupaten",function(Blueprint $table){
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
            $table->string('provinsi_2', 100);
            $table->string('kabupaten_2', 100);
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
            $table->string('scan_pengantar_rt_rw');
            $table->string('scan_kk');
            $table->string('scan_surat_nikah');
            $table->string('scan_skck');
            $table->string('surat_pernyataan');
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
        Schema::dropIfExists('kedua');
    }
}
