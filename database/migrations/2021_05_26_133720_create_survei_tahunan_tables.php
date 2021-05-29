<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveiTahunanTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survei_tahunan', function (Blueprint $table) {
            $table->id();

            $table->integer("user_id");
            $table->integer("tahun");
            
            $table->string('nama_perusahaan');
            $table->string('alamat');
            $table->string('kode_pos')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->char('kode_prov', 2)->nullable();
            $table->char('kode_kab', 4)->nullable();
            $table->char('kode_kec', 7)->nullable();
            $table->char('kode_desa')->nullable();
            $table->string('label_prov')->nullable();
            $table->string('label_kab')->nullable();
            $table->string('label_kec')->nullable();
            $table->string('label_desa')->nullable();
            $table->string('nama_contact')->nullable();
            $table->string('nomor_hp')->nullable();
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
            
            
            $table->integer('kondisi_perusahaan')->nullable();
            $table->integer('badan_hukum')->nullable();
            $table->integer('status_pemodalan')->nullable();
            $table->integer('masa_berlaku_hgu_dari')->nullable();
            $table->integer('masa_berlaku_hgu_sampai')->nullable();
            $table->integer('apakah_pelaksana_kemitraan')->nullable();
            $table->integer('jenis_kemitraan')->nullable();
            $table->string('jenis_kemitraan_lainnya')->nullable();
            $table->integer('punya_unit_pengolahan')->nullable();
            
            $table->integer('bpt_admin_laki')->nullable();
            $table->integer('bpt_admin_perempuan')->nullable();
            $table->integer('bpt_kebun_laki')->nullable();
            $table->integer('bpt_kebun_perempuan')->nullable();
            $table->double('upt_admin_laki')->nullable();
            $table->double('upt_admin_perempuan')->nullable();
            $table->double('upt_kebun_laki')->nullable();
            $table->double('upt_kebun_perempuan')->nullable();
            
            $table->integer('bptt_admin_laki')->nullable();
            $table->integer('bptt_admin_perempuan')->nullable();
            $table->integer('bptt_kebun_laki')->nullable();
            $table->integer('bptt_kebun_perempuan')->nullable();
            $table->double('uptt_admin_laki')->nullable();
            $table->double('uptt_admin_perempuan')->nullable();
            $table->double('uptt_kebun_laki')->nullable();
            $table->double('uptt_kebun_perempuan')->nullable();
            
            $table->double('pendapatan_bersih_kebun')->nullable();
            $table->double('pendapatan_bersih_tani_lain')->nullable();
            $table->double('pendapatan_hasil_kemitraan')->nullable();
            $table->double('pendapatan_dari_sewa')->nullable();
            $table->double('pendapatan_jual_bibit')->nullable();
            $table->double('pendapatan_bersih_lain')->nullable();
            
            $table->string('nama_pencacah')->nullable();
            $table->date('tanggal_pencacah')->nullable();
            $table->string('ttd_pencacah')->nullable();
            $table->string('nama_pemeriksa')->nullable();
            $table->date('tanggal_pemeriksa')->nullable();
            $table->string('ttd_pemeriksa')->nullable();

            $table->text('catatan')->nullable();
            $table->string('diisi_di')->nullable();
            $table->string('diisi_tanggal')->nullable();
            $table->string('diisi_administratur')->nullable();
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
        Schema::dropIfExists('survei_tahunan_tables');
    }
}
