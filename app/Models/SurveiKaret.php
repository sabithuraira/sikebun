<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveiKaret extends Model
{
    use HasFactory;
    
    protected $table = "survei_karet";
    
    public function getListStatusAttribute(){
        return [
            1 => 'SAVED - ERROR',
            2 => 'SAVED - CLEAN',
            3 => 'SEND - APPROVAL',
            4 => 'PERBAIKAN - APPROVAL',
            5 => 'SEND - BPS',
            6 => 'PERBAIKAN - PEMERIKSA',
            7 => 'OK',
        ];
    }
    
    public function company()
    {
        return $this->hasOne(ProfilPerusahaan::class, 'id', 'user_id');
    }
}
