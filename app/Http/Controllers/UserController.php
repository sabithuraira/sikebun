<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProfilPerusahaan;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit(){
        $model = User::find(Auth::id());
        $model_profil = new ProfilPerusahaan;

        if($model->company_id!=null) $model_profil = ProfilPerusahaan::find($model->company_id);

        return view('user.edit', compact(
            'model', 'model_profil'
        ));
    }

    public function update(Request $request){
        $model = User::find(Auth::id());
        $model_profil = new ProfilPerusahaan;

        // $temp_profile = ProfilPerusahaan::where('user_id', '=', $model->id)->first();
        if($model->company_id!=null) $model_profil = ProfilPerusahaan::find($model->company_id);
        else $model_profil->created_by = Auth::id();

        $model_profil->user_id = $model->id;
        $model_profil->nama_perusahaan = $request->nama_perusahaan;
        $model_profil->alamat_perusahaan = $request->alamat_perusahaan;
        $model_profil->kode_pos_perusahaan = $request->kode_pos_perusahaan;
        $model_profil->telp_perusahaan = $request->telp_perusahaan;
        $model_profil->fax_perusahaan = $request->fax_perusahaan;
        $model_profil->kode_prov = $request->kode_prov;
        $model_profil->kode_kab = $request->kode_kab;
        $model_profil->kode_kec = $request->kode_kec;
        $model_profil->kode_desa = $request->kode_desa;
        $model_profil->label_prov = $request->label_prov;
        $model_profil->label_kab = $request->label_kab;
        $model_profil->label_kec = $request->label_kec;
        $model_profil->label_desa = $request->label_desa;
        $model_profil->nama_kantor_pusat = $request->nama_kantor_pusat;
        $model_profil->alamat_kantor_pusat = $request->alamat_kantor_pusat;
        $model_profil->kode_pos_kantor_pusat = $request->kode_pos_kantor_pusat;
        $model_profil->telp_kantor_pusat = $request->telp_kantor_pusat;
        $model_profil->fax_kantor_pusat = $request->fax_kantor_pusat;
        $model_profil->kode_prov_kantor_pusat = $request->kode_prov_kantor_pusat;
        $model_profil->kode_kab_kantor_pusat = $request->kode_kab_kantor_pusat;
        $model_profil->label_prov_kantor_pusat = $request->label_prov_kantor_pusat;
        $model_profil->label_kab_kantor_pusat = $request->label_kab_kantor_pusat;
        $model_profil->updated_by = Auth::id();
        $model_profil->save();
        
        return redirect('user/edit')->with('success', 'Data berhasil diperbaharui');
    }
}
