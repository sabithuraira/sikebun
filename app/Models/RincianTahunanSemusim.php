<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KebunTahunanSemusim;

class RincianTahunanSemusim extends Model
{
    use HasFactory;
    
    protected $table = "rincian_tahunan_semusim";
    
    public function getList_kebun_semusim_sendiriAttribute(){
        return KebunTahunanSemusim::where('survei_id', '=', $this->survei_id)->where('rincian_id', '=', $this->id)->where('jenis', '=', 1)->get();
    }
    
    public function getList_kebun_semusim_plasmaAttribute(){
        return KebunTahunanSemusim::where('survei_id', '=', $this->survei_id)->where('rincian_id', '=', $this->id)->where('jenis', '=', 2)->get();
    }
}
