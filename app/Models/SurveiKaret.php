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
            1 => 'SAVED',
            2 => 'CLEAN',
            3 => 'SEND',
        ];
    }
}
