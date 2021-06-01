<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPupukPestisidaToSurveiTahunan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survei_tahunan', function (Blueprint $table) {
            $table->string("pupuk3")->nullable();
            $table->string("pestisida3")->nullable();
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
