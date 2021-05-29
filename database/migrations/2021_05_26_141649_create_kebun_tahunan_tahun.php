<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKebunTahunanTahun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kebun_tahunan_tahun', function (Blueprint $table) {
            $table->id();
            
            $table->integer("survei_id");
            $table->integer("jenis");
            $table->integer("kode_prov")->nullable();
            $table->integer("kode_kab")->nullable();
            $table->integer("kode_kec")->nullable();
            $table->integer("kode_desa")->nullable();
            
            $table->double("real1_tbm")->nullable();
            $table->double("real1_tsm")->nullable();
            $table->double("real1_tstm")->nullable();
            $table->double("real1_ttm")->nullable();
            $table->double("real1_produksi")->nullable();
            $table->double("real1_nilai")->nullable();
            $table->double("real2_tbm")->nullable();
            $table->double("real2_tsm")->nullable();
            $table->double("real2_tstm")->nullable();
            $table->double("real2_ttm")->nullable();
            $table->double("real2_produksi")->nullable();
            $table->double("real2_nilai")->nullable();
            $table->double("real3_tbm")->nullable();
            $table->double("real3_tsm")->nullable();
            $table->double("real3_tstm")->nullable();
            $table->double("real3_ttm")->nullable();
            $table->double("real3_produksi")->nullable();
            $table->double("real3_nilai")->nullable();
            $table->double("real4_tbm")->nullable();
            $table->double("real4_tsm")->nullable();
            $table->double("real4_tstm")->nullable();
            $table->double("real4_ttm")->nullable();
            $table->double("real4_produksi")->nullable();
            $table->double("real4_nilai")->nullable();
            
            $table->double("target1_tbm")->nullable();
            $table->double("target1_tsm")->nullable();
            $table->double("target1_tstm")->nullable();
            $table->double("target1_ttm")->nullable();
            $table->double("target1_produksi")->nullable();
            $table->double("target1_nilai")->nullable();
            $table->double("target2_tbm")->nullable();
            $table->double("target2_tsm")->nullable();
            $table->double("target2_tstm")->nullable();
            $table->double("target2_ttm")->nullable();
            $table->double("target2_produksi")->nullable();
            $table->double("target2_nilai")->nullable();
            $table->double("target3_tbm")->nullable();
            $table->double("target3_tsm")->nullable();
            $table->double("target3_tstm")->nullable();
            $table->double("target3_ttm")->nullable();
            $table->double("target3_produksi")->nullable();
            $table->double("target3_nilai")->nullable();
            $table->double("target4_tbm")->nullable();
            $table->double("target4_tsm")->nullable();
            $table->double("target4_tstm")->nullable();
            $table->double("target4_ttm")->nullable();
            $table->double("target4_produksi")->nullable();
            $table->double("target4_nilai")->nullable();
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
        Schema::dropIfExists('kebun_tahunan_tahun');
    }
}
