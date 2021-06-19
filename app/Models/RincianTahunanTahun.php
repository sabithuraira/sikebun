<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KebunTahunanTahun;

class RincianTahunanTahun extends Model
{
    use HasFactory;
    
    protected $table = "rincian_tahunan_tahun";

    public function getList_kebun_tahunan_sendiriAttribute(){
        return KebunTahunanTahun::where('survei_id', '=', $this->survei_id)->where('rincian_id', '=', $this->id)->where('jenis', '=', 1)->get();
    }
    
    public function getList_kebun_tahunan_plasmaAttribute(){
        return KebunTahunanTahun::where('survei_id', '=', $this->survei_id)->where('rincian_id', '=', $this->id)->where('jenis', '=', 2)->get();
    }
}
