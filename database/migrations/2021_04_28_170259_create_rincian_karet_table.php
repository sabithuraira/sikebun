<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianKaretTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_karet', function (Blueprint $table) {
            $table->id();
            
            $table->integer("survei_id");
            $table->integer("jenis");

            $table->string('rincian')->nullable();
            $table->double('tbm1')->nullable();
            $table->double('tsm1')->nullable();
            $table->double('tstm1')->nullable();
            $table->double('ttm1')->nullable();
            $table->double('produksi1')->nullable();
            $table->double('tbm2')->nullable();
            $table->double('tsm2')->nullable();
            $table->double('tstm2')->nullable();
            $table->double('ttm2')->nullable();
            $table->double('produksi2')->nullable();
            $table->double('tbm3')->nullable();
            $table->double('tsm3')->nullable();
            $table->double('tstm3')->nullable();
            $table->double('ttm3')->nullable();
            $table->double('produksi3')->nullable();

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
        Schema::dropIfExists('rincian_karet');
    }
}
