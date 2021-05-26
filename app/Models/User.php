<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getIsKaretAttributes(){
        if($this->company_id!='' && $this->company_id!=null){
            $perusahaan = ProfilPerusahaan::find($this->company_id);
            if($perusahaan!=null){
                if($perusahaan->is_karet==1) return true;
            }
        }

        return false;
    }
    
    public function getIsSawitAttributes(){
        if($this->company_id!='' && $this->company_id!=null){
            $perusahaan = ProfilPerusahaan::find($this->company_id);
            if($perusahaan!=null){
                if($perusahaan->is_sawit==1) return true;
            }
        }

        return false;
    }

    
    //relasi yang menghubungkan dengan user yang melakukan input
    public function company()
    {
        return $this->hasOne(ProfilPerusahaan::class, 'id', 'company_id');
    }
}
