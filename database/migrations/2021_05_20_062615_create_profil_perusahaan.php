<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilPerusahaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan')->nullable();
            $table->text('alamat_perusahaan')->nullable();
            $table->string('kode_pos_perusahaan')->nullable();
            $table->string('telp_perusahaan')->nullable();
            $table->string('fax_perusahaan')->nullable();
            $table->char('kode_prov',2)->nullable();
            $table->char('kode_kab',4)->nullable();
            $table->char('kode_kec',7)->nullable();
            $table->char('kode_desa',10)->nullable();
            $table->string('label_prov')->nullable();
            $table->string('label_kab')->nullable();
            $table->string('label_kec')->nullable();
            $table->string('label_desa')->nullable();

            $table->string('nama_kantor_pusat')->nullable();
            $table->text('alamat_kantor_pusat')->nullable();
            $table->string('kode_pos_kantor_pusat')->nullable();
            $table->string('telp_kantor_pusat')->nullable();
            $table->string('fax_kantor_pusat')->nullable();
            $table->char('kode_prov_kantor_pusat',2)->nullable();
            $table->char('kode_kab_kantor_pusat',4)->nullable();;
            $table->string('label_prov_kantor_pusat')->nullable();
            $table->string('label_kab_kantor_pusat')->nullable();
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
        Schema::dropIfExists('profil_perusahaan');
    }
}
