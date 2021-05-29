<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKebunTahunanSemusim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kebun_tahunan_semusim', function (Blueprint $table) {
            $table->id();

            $table->integer("survei_id");
            $table->integer("jenis");
            $table->integer("kode_prov")->nullable();
            $table->integer("kode_kab")->nullable();
            $table->integer("kode_kec")->nullable();
            $table->integer("kode_desa")->nullable();
            
            $table->double("real1_luas_tanam")->nullable();
            $table->double("real1_luas_panen")->nullable();
            $table->double("real1_produksi")->nullable();
            $table->double("real1_nilai")->nullable();
            $table->double("real2_luas_tanam")->nullable();
            $table->double("real2_luas_panen")->nullable();
            $table->double("real2_produksi")->nullable();
            $table->double("real2_nilai")->nullable();
            $table->double("real3_luas_tanam")->nullable();
            $table->double("real3_luas_panen")->nullable();
            $table->double("real3_produksi")->nullable();
            $table->double("real3_nilai")->nullable();
            $table->double("real4_luas_tanam")->nullable();
            $table->double("real4_luas_panen")->nullable();
            $table->double("real4_produksi")->nullable();
            $table->double("real4_nilai")->nullable();
            
            $table->double("target1_luas_tanam")->nullable();
            $table->double("target1_luas_panen")->nullable();
            $table->double("target1_produksi")->nullable();
            $table->double("target1_nilai")->nullable();
            $table->double("target2_luas_tanam")->nullable();
            $table->double("target2_luas_panen")->nullable();
            $table->double("target2_produksi")->nullable();
            $table->double("target2_nilai")->nullable();
            $table->double("target3_luas_tanam")->nullable();
            $table->double("target3_luas_panen")->nullable();
            $table->double("target3_produksi")->nullable();
            $table->double("target3_nilai")->nullable();
            $table->double("target4_luas_tanam")->nullable();
            $table->double("target4_luas_panen")->nullable();
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
        Schema::dropIfExists('kebun_tahunan_semusim');
    }
}
