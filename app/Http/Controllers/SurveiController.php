<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurveiKaret;
use App\Models\RincianKaret;

class SurveiController extends Controller
{
    public function sawit(){
        return view('survei.sawit');
    }
    
    public function sawit_store(Request $request){
        
    }
    
    public function karet(){
        return view('survei.karet');
    }
    
    public function karet_store(Request $request){
        $model = new SurveiKaret;
        
        if($request->id!=0){
            $temp_model = SurveiKaret::find($request->id);
            if($temp_model!=null){
                $model = $temp_model;
            }
            else{
                $model->created_by = Auth::id();
            }
        }

        $model->tahun = $request->tahun;
        $model->triwulan = $request->triwulan;
        
        $model->nama_perusahaan = $request->nama_perusahaan;
        $model->alamat = $request->alamat;
        $model->kode_pos = $request->kode_pos;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->fax = $request->fax;
        $model->kode_prov = $request->kode_prov;
        $model->kode_kab = $request->kode_kab;
        $model->kode_kec = $request->kode_kec;
        $model->kode_desa= $request->kode_desa;
        $model->label_prov = $request->label_prov;
        $model->label_kab = $request->label_kab;
        $model->label_kec = $request->label_kec;
        $model->label_desa = $request->label_desa;
        $model->nama_contact = $request->name_contact;
        $model->nomor_hp = $request->nomor_hp;
        $model->nama_kantor_pusat = $request->nama_kantor_pusat;
        $model->alamat_kantor_pusat = $request->alamat_kantor_pusat;
        $model->kode_pos_kantor_pusat = $request->kode_pos_kantor_pusat;
        $model->telp_kantor_pusat = $request->telp_kantor_pusat;
        $model->email_kantor_pusat = $request->email_kantor_pusat;
        $model->fax_kantor_pusat = $request->fax_kantor_pusat;
        $model->kode_prov_kantor_pusat = $request->kode_prov_kantor_pusat;
        $model->kode_kab_kantor_pusat = $request->kode_kab_kantor_pusat;
        $model->label_prov_kantor_pusat = $request->label_prov_kantor_pusat;
        $model->label_kab_kantor_pusat = $request->label_kab_kantor_pusat;
        $model->nama_grup = $request->nama_grup;
        $model->alamat_grup = $request->alamat_grup;
        $model->kode_pos_grup =$request->kode_pos_grup;
        $model->telepon_grup = $request->telepon_grup;
        $model->fax_grup= $request->fax_grup;
        $model->email_grup = $request->email_grup;
        $model->kode_prov_grup = $request->kode_prov_grup;
        $model->kode_kab_grup= $request->kode_kab_grup;
        $model->label_prov_grup = $request->label_prov_grup;
        $model->label_kab_grup = $request->label_kab_grup;
        $model->status_pemodalan_grup = $request->status_pemodalan_grup;
        $model->badan_hukum_grup = $request->hukum_grup;
        $model->apakah_pelaksana_kemitraan = $request->apakah_pelaksana_kemitraan;
        $model->punya_kebun_plasma = $request->punya_kebun_plasma;
        $model->punya_unit_pengolahan = $request->punya_unit_pengolahan;
        $model->tahun_berdiri = $request->tahun_berdiri;
        $model->nama_pencacah = $request->nama_pencacah;
        $model->tanggal_pencacah = date('Y-m-d', strtotime($request->tanggal_pencacah));
        $model->ttd_pencacah = $request->ttd_pencacah;
        $model->nama_pemeriksa = $request->nama_pemeriksa;
        $model->tanggal_pemeriksa = date('Y-m-d', strtotime($request->tanggal_pemeriksa));
        $model->ttd_pemeriksa = $request->ttd_pemeriksa;
        
        $model['301_a3_total_tbm_bulan1'] = $request->get("301_a3_total_tbm_bulan1");
        $model['301_a3_total_tsm_bulan1'] = $request->get("301_a3_total_tsm_bulan1");
        $model['301_a3_total_tstm_bulan1'] = $request->get("301_a3_total_tstm_bulan1");
        $model['301_a3_total_ttm_bulan1'] = $request->get("301_a3_total_ttm_bulan1");
        $model['301_a3_total_produksi_bulan1'] = $request->get("301_a3_total_produksi_bulan1");
        $model['301_a3_total_tbm_bulan2'] = $request->get("301_a3_total_tbm_bulan2");
        $model['301_a3_total_tsm_bulan2'] = $request->get("301_a3_total_tsm_bulan2");
        $model['301_a3_total_tstm_bulan2'] = $request->get("301_a3_total_tstm_bulan2");
        $model['301_a3_total_ttm_bulan2'] = $request->get("301_a3_total_ttm_bulan2");
        $model['301_a3_total_produksi_bulan2'] = $request->get("301_a3_total_produksi_bulan2");
        $model['301_a3_total_tbm_bulan3'] =$request->get("301_a3_total_tbm_bulan3");
        $model['301_a3_total_tsm_bulan3'] = $request->get("301_a3_total_tsm_bulan3");
        $model['301_a3_total_tstm_bulan3'] = $request->get("301_a3_total_tstm_bulan3");
        $model['301_a3_total_ttm_bulan3'] = $request->get("301_a3_total_ttm_bulan3");
        $model['301_a3_total_produksi_bulan3'] = $request->get("301_a3_total_produksi_bulan3");
        $model['301_b_bulan1'] = $request->get("301_b_bulan1");
        $model['301_b_bulan2'] = $request->get("301_b_bulan2");
        $model['301_b_bulan3'] = $request->get("301_b_bulan3");
        $model['301_c_bulan1'] = $request->get("301_c_bulan1");
        $model['301_c_bulan2'] = $request->get("301_c_bulan2");
        $model['301_c_bulan3'] = $request->get("301_c_bulan3");
        
        $model['302_2a'] = $request->get("302_2a");
        $model['302_3a'] = $request->get("302_3a");
        $model['302_4a'] = $request->get("302_4a");
        $model['302_2b'] = $request->get("302_2b");
        $model['302_3b'] = $request->get("302_3b");
        $model['302_4b'] = $request->get("302_4a");
        $model['302_2c'] = $request->get("302_2c");
        $model['302_3c'] = $request->get("302_3c");
        $model['302_4c'] = $request->get("302_4c");
        
        $model->catatan =$request->catatan;
        $model->diisi_di=$request->diisi_di;
        $model->diisi_tanggal= date('Y-m-d', strtotime($request->diisi_tanggal));
        $model->status_dokumen= 1;

        $model->updated_by = Auth::id();

        if($model->save()){
            $all_rincian = $request->rincian;
            foreach($all_rincian as $key=>$value){
                $model_rincian = new RincianKaret;
        
                if($value->id!=0){
                    $temp_model_rincian = RincianKaret::find($value->id);
                    if($temp_model_rincian!=null){
                        $model_rincian = $temp_model_rincian;
                    }
                }

                $model_rincian->survei_id = $model->id;
                $model_rincian->jenis = $value->jenis;
                $model_rincian->rincian = $value->rincian;
                $model_rincian->tbm1 = $value->tbm1;
                $model_rincian->tsm1 = $value->tsm1;
                $model_rincian->tstm1 = $value->tstm1;
                $model_rincian->ttm1 = $value->ttm1;
                $model_rincian->produksi1 = $value->produksi1;
                $model_rincian->tbm2 = $value->tbm2;
                $model_rincian->tsm2 = $value->tsm2;
                $model_rincian->tstm2 = $value->tstm2;
                $model_rincian->ttm2 = $value->ttm2;
                $model_rincian->produksi2 = $value->produksi2;
                $model_rincian->tbm3 = $value->tbm3;
                $model_rincian->tsm3 = $value->tsm3;
                $model_rincian->tstm3 = $value->tstm3;
                $model_rincian->ttm3 = $value->ttm3;
                $model_rincian->produksi3 = $value->produksi3;
                $model_rincian->save();
            }
        }
    }

    public function show_karet($user_id, $tahun, $triwulan){
        $model = SurveiKaret::where('user_id', '=', $user_id)
                ->where('tahun', '=', $tahun)
                ->where('triwulan', '=', $triwulan)
                ->first();

        if($model==null){
            return response()->json(['data'=>null, 'rincian'=> []]);
        }
        else{
            $rincian = RincianKaret::where('survei_id', '=', $model->id)->get();
            return response()->json(['data'=>$model, 'rincian'=> $rincian]);
        }
    }
    
    public function tahunan(){
        return view('survei.tahunan');
    }
    
    public function tahunan_store(Request $request){
        
    }
}
