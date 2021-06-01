<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPupukPestisidaToRincianTahunanTahun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rincian_tahunan_tahun', function (Blueprint $table) {
            $table->double("pupuk3")->nullable();
            $table->double("pestisida3")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rincian_tahunan_tahun', function (Blueprint $table) {
            //
        });
    }
}
