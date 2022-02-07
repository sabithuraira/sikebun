<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaProdukToKebunTahunanTahun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rincian_tahunan_tahun', function (Blueprint $table) {
            $table->string("nama_produk_utama")->nullable();
            $table->string("kbki_produk_utama")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kebun_tahunan_tahun', function (Blueprint $table) {
            //
        });
    }
}
