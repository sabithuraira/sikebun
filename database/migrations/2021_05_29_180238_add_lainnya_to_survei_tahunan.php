<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLainnyaToSurveiTahunan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survei_tahunan', function (Blueprint $table) {
            $table->string("pupuk1")->nullable();
            $table->string("pupuk2")->nullable();
            $table->string("pestisida1")->nullable();
            $table->string("pestisida2")->nullable();
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
