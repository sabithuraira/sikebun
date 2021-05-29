<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianTahunanTahun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_tahunan_tahun', function (Blueprint $table) {
            $table->id();
            
            $table->integer("survei_id");
            $table->string("kode_tanaman");
            $table->double("luas_sendiri_5")->nullable();
            $table->double("luas_sendiri_5_10")->nullable();
            $table->double("luas_sendiri_11_25")->nullable();
            $table->double("luas_sendiri_25")->nullable();
            $table->double("luas_plasma_5")->nullable();
            $table->double("luas_plasma_5_10")->nullable();
            $table->double("luas_plasma_11_25")->nullable();
            $table->double("luas_plasma_25")->nullable();
            
            $table->integer("sendiri_bentuk_produksi")->nullable();
            $table->double("sendiri_rata_rendemen")->nullable();
            $table->integer("plasma_bentuk_produksi")->nullable();
            $table->double("plasma_rata_rendemen")->nullable();

            $table->double("bibit_tanaman")->nullable();
            $table->double("pupuk1")->nullable();
            $table->double("pupuk2")->nullable();
            $table->double("pestisida1")->nullable();
            $table->double("pestisida2")->nullable();
            $table->double("bahan_bakar_budidaya")->nullable();
            $table->double("sewa_lahan")->nullable();
            $table->double("sewa_alat")->nullable();
            $table->double("pengeluaran_lainnya")->nullable();
            $table->double("biaya_kemitraan")->nullable();
            
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
        Schema::dropIfExists('rincian_tahunan_tahun');
    }
}
