<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRincianIdToKebunTahunanSemusim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kebun_tahunan_semusim', function (Blueprint $table) {
            $table->integer("rincian_id");
            $table->string("nama_kebun");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kebun_tahunan_semusim', function (Blueprint $table) {
            //
        });
    }
}
