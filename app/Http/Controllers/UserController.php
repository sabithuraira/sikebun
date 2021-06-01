<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prov;
use App\Models\Kab;
use App\Models\Kec;
use App\Models\Desa;
use App\Models\ProfilPerusahaan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller
{
    use PasswordValidationRules;
    public function index(Request $request){
        $datas = User::paginate();   
        $datas->withPath('user');
        $datas->appends($request->all());     
        return view('user.index', compact('datas'));
    }

    public function create(){
        $model = new User;
        $list_perusahaan = ProfilPerusahaan::all();
        return view('user.create', compact('model', 'list_perusahaan'));
    }

    public function store(Request $request){
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect('user');
    }

    public function change_password(){
        $model = new User;
        return view('user.change_password', compact('model'));
    }

    public function change_password_store(Request $request){
        $user = User::find(Auth::id());

        Validator::make($request->all(), [
            'current_password' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ])->after(function ($validator) use ($user, $request) {
            if (! isset($request->current_password) || ! Hash::check($request->current_password, $user->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        })->validate();

        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();
        /////////
        // Validator::make($input, [
        //     'current_password' => ['required', 'string'],
        //     'password' => $this->passwordRules(),
        // ])->after(function ($validator) use ($user, $input) {
        //     if (! isset($input['current_password']) || ! Hash::check($input['current_password'], $user->password)) {
        //         $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
        //     }
        // })->validateWithBag('updatePassword');

        // $user->forceFill([
        //     'password' => Hash::make($input['password']),
        // ])->save();

        return redirect('dashboard');
    }
    
    public function edit(){
        $model = User::find(Auth::id());
        $perusahaan = ProfilPerusahaan::find($model->company_id);
        $list_kab16 = Kab::where('idProv', '=', 16)->get();
        $list_prov = Prov::get();
        return view('user.edit', compact(
            'model', 'perusahaan', 'list_kab16', 
            'list_prov'
        ));
    }

    public function update(Request $request){
        $model = User::find(Auth::id());
        $model_profil = ProfilPerusahaan::find($model->company_id);

        $model_profil->alamat_perusahaan = $request->alamat_perusahaan;
        $model_profil->kode_pos_perusahaan = $request->kode_pos_perusahaan;
        $model_profil->telp_perusahaan = $request->telp_perusahaan;
        $model_profil->fax_perusahaan = $request->fax_perusahaan;
        $model_profil->kode_prov = 16;
        $model_profil->kode_kab = $request->kode_kab;
        $model_profil->kode_kec = $request->kode_kec;
        $model_profil->kode_desa = $request->kode_desa;
        $model_profil->label_prov = 'SUMATERA SELATAN';

        $kab = Kab::where('idProv', '=', 16)->where('idKab', '=', $request->kode_kab)->first();
        if($kab!=null){
            $model_profil->label_kab = $kab->nmKab;
            
            $kec = Kec::where('idProv', '=', 16)
                ->where('idKab', '=', $request->kode_kab)
                ->where('idKec', '=', $request->kode_kec)->first();

            if($kec!=null){
                $model_profil->label_kec = $kec->nmKec;

                $desa = Desa::where('idProv', '=', 16)
                    ->where('idKab', '=', $request->kode_kab)
                    ->where('idKec', '=', $request->kode_kec)
                    ->where('idDesa','=', $request->kode_desa)->first();

                if($desa!=null) $model_profil->label_desa = $desa->nmDesa;
            }
        }

        $model_profil->nama_kantor_pusat = $request->nama_kantor_pusat;
        $model_profil->alamat_kantor_pusat = $request->alamat_kantor_pusat;
        $model_profil->kode_pos_kantor_pusat = $request->kode_pos_kantor_pusat;
        $model_profil->telp_kantor_pusat = $request->telp_kantor_pusat;
        $model_profil->fax_kantor_pusat = $request->fax_kantor_pusat;
        $model_profil->kode_prov_kantor_pusat = $request->kode_prov_kantor_pusat;
        $model_profil->kode_kab_kantor_pusat = $request->kode_kab_kantor_pusat;
        
        $prov_pusat = Prov::where('idProv', '=', $request->kode_prov_kantor_pusat)->first();
        if($prov_pusat!=null){
            $model_profil->label_prov_kantor_pusat = $prov_pusat->namaProv;
            
            $kab_pusat = Kab::where('idProv', '=', $request->kode_prov_kantor_pusat)
                            ->where('idKab', '=', $request->kode_kab_kantor_pusat)
                            ->first();
            if($kab_pusat!=null){
                $model_profil->label_kab_kantor_pusat = $kab_pusat->nmKab;
            }
        }
        $model_profil->updated_by = Auth::id();
        $model_profil->save();
        
        return redirect('user/edit')->with('success', 'Data berhasil diperbaharui');
    }
}
