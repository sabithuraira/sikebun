<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveiTahunan extends Model
{
    use HasFactory;
    
    protected $table = "survei_tahunan";
    
    public function getListStatusAttribute(){
        return [
            1 => 'SAVED',
            2 => 'CLEAN',
            3 => 'SEND',
            4 => 'SELESAI',
        ];
    }
}
