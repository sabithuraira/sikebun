<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanamanDiolahToRincianTahunanSemusim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rincian_tahunan_semusim', function (Blueprint $table) {
            $table->string("tanaman_diolah")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rincian_tahunan_semusim', function (Blueprint $table) {
            //
        });
    }
}
