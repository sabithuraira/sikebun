<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewToSukebunSurveiTahunan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survei_tahunan', function (Blueprint $table) {
            $table->string("nama_pic")->nullable();
            $table->string("jabatan_pic")->nullable();
            $table->integer("jenis_kelamin_pic")->nullable();
            $table->string("nama_unit_pic")->nullable();
            $table->integer("status_usaha")->nullable();
            $table->string("koordinat_long")->nullable();
            $table->string("koordinat_lat")->nullable();
            $table->string("website")->nullable();
            $table->string("akun_medsos")->nullable();
            $table->char("kbli", 5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survei_tahunan', function (Blueprint $table) {
            //
        });
    }
}
