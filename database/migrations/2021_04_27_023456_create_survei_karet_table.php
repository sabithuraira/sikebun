<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveiKaretTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survei_karet', function (Blueprint $table) {
            $table->id();
            
            $table->integer("user_id");
            $table->integer("tahun");
            $table->integer("triwulan");
            
            $table->string('nama_perusahaan');
            $table->string('alamat');
            $table->string('kode_pos')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->char('kode_prov', 2);
            $table->char('kode_kab', 4);
            $table->char('kode_kec', 7)->nullable();
            $table->char('kode_desa')->nullable();
            $table->string('label_prov');
            $table->string('label_kab');
            $table->string('label_kec')->nullable();
            $table->string('label_desa')->nullable();
            $table->string('nama_contact');
            $table->string('nomor_hp');
            $table->string('nama_kantor_pusat')->nullable();
            $table->string('alamat_kantor_pusat')->nullable();
            $table->string('kode_pos_kantor_pusat')->nullable();
            $table->string('telp_kantor_pusat')->nullable();
            $table->string('email_kantor_pusat')->nullable();
            $table->string('fax_kantor_pusat')->nullable();
            $table->char('kode_prov_kantor_pusat',2)->nullable();
            $table->char('kode_kab_kantor_pusat',4)->nullable();
            $table->string('label_prov_kantor_pusat')->nullable();
            $table->string('label_kab_kantor_pusat')->nullable();
            $table->string('nama_grup')->nullable();
            $table->string('alamat_grup')->nullable();
            $table->string('kode_pos_grup')->nullable();
            $table->string('telepon_grup')->nullable();
            $table->string('fax_grup')->nullable();
            $table->string('email_grup')->nullable();
            $table->char('kode_prov_grup',2)->nullable();
            $table->char('kode_kab_grup',2)->nullable();
            $table->string('label_prov_grup')->nullable();
            $table->string('label_kab_grup')->nullable();
            $table->integer('status_pemodalan_grup')->nullable();
            $table->integer('badan_hukum_grup')->nullable();
            $table->integer('apakah_pelaksana_kemitraan')->nullable();
            $table->integer('punya_kebun_plasma')->nullable();
            $table->integer('punya_unit_pengolahan')->nullable();
            $table->integer('tahun_berdiri')->nullable();
            $table->string('nama_pencacah')->nullable();
            $table->date('tanggal_pencacah')->nullable();
            $table->string('ttd_pencacah')->nullable();
            $table->string('nama_pemeriksa')->nullable();
            $table->date('tanggal_pemeriksa')->nullable();
            $table->string('ttd_pemeriksa')->nullable();
            
            $table->double('301_a3_total_tbm_bulan1')->nullable();
            $table->double('301_a3_total_tsm_bulan1')->nullable();
            $table->double('301_a3_total_tstm_bulan1')->nullable();
            $table->double('301_a3_total_ttm_bulan1')->nullable();
            $table->double('301_a3_total_produksi_bulan1')->nullable();
            $table->double('301_a3_total_tbm_bulan2')->nullable();
            $table->double('301_a3_total_tsm_bulan2')->nullable();
            $table->double('301_a3_total_tstm_bulan2')->nullable();
            $table->double('301_a3_total_ttm_bulan2')->nullable();
            $table->double('301_a3_total_produksi_bulan2')->nullable();
            $table->double('301_a3_total_tbm_bulan3')->nullable();
            $table->double('301_a3_total_tsm_bulan3')->nullable();
            $table->double('301_a3_total_tstm_bulan3')->nullable();
            $table->double('301_a3_total_ttm_bulan3')->nullable();
            $table->double('301_a3_total_produksi_bulan3')->nullable();
            $table->double('301_b_bulan1')->nullable();
            $table->double('301_b_bulan2')->nullable();
            $table->double('301_b_bulan3')->nullable();
            $table->double('301_c_bulan1')->nullable();
            $table->double('301_c_bulan2')->nullable();
            $table->double('301_c_bulan3')->nullable();
            
            $table->double('302_2a')->nullable();
            $table->double('302_3a')->nullable();
            $table->double('302_4a')->nullable();
            $table->double('302_2b')->nullable();
            $table->double('302_3b')->nullable();
            $table->double('302_4b')->nullable();
            $table->double('302_2c')->nullable();
            $table->double('302_3c')->nullable();
            $table->double('302_4c')->nullable();
            
            $table->text('catatan')->nullable();
            $table->string('diisi_di')->nullable();
            $table->string('diisi_tanggal')->nullable();
            $table->integer('status_dokumen');

            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survei_karet');
    }
}
