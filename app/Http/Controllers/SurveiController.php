<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SurveiKaret;
use App\Models\RincianKaret;
use App\Models\SurveiSawit;
use App\Models\RincianSawit;
use App\Models\Kab;
use App\Models\Kec;
use App\Models\Desa;
use App\Models\ProfilPerusahaan;
use App\Models\SurveiTahunan;
use App\Models\KebunTahunanSemusim;
use App\Models\KebunTahunanTahun;
use App\Models\RincianTahunanSemusim;
use App\Models\RincianTahunanTahun;
use App\Http\Resources\RincianTahunanSemusimResource;
use App\Http\Resources\RincianTahunanTahunResource;
use Illuminate\Support\Facades\Auth;
use PDF;

class SurveiController extends Controller
{
    public function getKab(Request $request){
        $prov = '16';
        if(strlen($request->kode_prov)>0) $prov = $request->kode_prov;

        $result = Kab::where('idProv', '=', $prov)->get();
        return response()->json(['result'=>$result]);
    }
    
    public function getKec(Request $request){
        $prov = '16';
        $kab = '';
        
        if(strlen($request->kode_prov)>0) $prov = $request->kode_prov;
        if(strlen($request->kode_kab)>0) $kab = $request->kode_kab;

        $result = Kec::where('idProv', '=', $prov)->where('idKab', '=', $kab)->get();
        return response()->json(['result'=>$result]);
    }
    
    public function getDesa(Request $request){
        $prov = '16';
        $kab = '';
        $kec = '';
        
        if(strlen($request->kode_prov)>0) $prov = $request->kode_prov;
        if(strlen($request->kode_kab)>0) $kab = $request->kode_kab;
        if(strlen($request->kode_kec)>0) $kec = $request->kode_kec;

        $result = Desa::where('idProv', '=', $prov)
                    ->where('idKab', '=', $kab)
                    ->where('idKec', '=', $kec)
                    ->get();
        return response()->json(['result'=>$result]);
    }

    public function index_sawit(Request $request){
        $datas = SurveiSawit::where('user_id', '=', Auth::user()->company_id)->paginate();
        $datas->withPath('survei/index_sawit');
        $datas->appends($request->all());    
        
        return view('survei.index_sawit', compact('datas'));
    }

    public function detail_sawit($id){
        $model = SurveiSawit::find($id);
        $rincian1 = [];
        $rincian2 = [];

        // print_r($model);die();
        if($model!=null){
            $rincian1 = RincianSawit::where('survei_id', '=', $model->id)->where('jenis', '=', 1)->get();
            $rincian2 = RincianSawit::where('survei_id', '=', $model->id)->where('jenis', '=', 2)->get();
        }

        return view('survei.detail_sawit', compact('model', 'rincian1', 'rincian2'));
    }

    public function sawit(){
        $model = User::find(Auth::id());
        $user_profile = ProfilPerusahaan::find($model->company_id);
        return view('survei.sawit', compact('user_profile'));
    }

    public function sawit_print($id){
        // $datas=array();
        // $month = date('m');
        // $year = date('Y');
        // $type = 1;

        // if(strlen($request->get('p_month'))>0)
        //     $month = $request->get('p_month');

        // if(strlen($request->get('p_year'))>0)
        //     $year = $request->get('p_year');
            
        // // if(strlen($request->get('p_type'))>0)
        // $type = $_POST['action'];
            
        // if(strlen($request->get('p_user'))>0){
        //     $user_id = $request->get('p_user');
        //     $user = \App\User::where('email', '=', $user_id)->first();
        // }

        // $model = new \App\Ckp;
        // $datas = $model->CkpBulanan(1, $month, $year, $user_id);

        // $monthLabel = config('app.months')[$month];
        // $monthName = date("F", mktime(0, 0, 0, $month, 10));
        // $last_day_month  = date('t', mktime(0, 0, 0, $month, 10)); //date("t");
        // $first_working_day = date('d F Y', strtotime("+0 weekday $monthName $year"));
        // $last_working_day = date('d F Y', strtotime('last weekday '.date("F Y", strtotime('next month '.$monthName.' '.$year))));

        // $pdf = PDF::loadView('ckp.print', compact('month', 
        //     'year', 'type', 'model', 'datas', 'user', 
        //     'monthName', 'monthLabel', 'last_day_month',
        //     'first_working_day', 'last_working_day'))
        //     ->setPaper('a4', 'landscape');
        
        // $nama_file = $user_id.'_CKP_';
        // if($type==1)
        //     $nama_file .= 'T_';
        // else
        //     $nama_file .= 'R_';

        // $nama_file .= $month .'_'.$year.'.pdf';

        // return $pdf->download($nama_file);
    }
    
    public function sawit_store(Request $request){
        $model = new SurveiSawit;
        
        if($request->id!=0){
            $temp_model = SurveiSawit::find($request->id);
            if($temp_model!=null){
                $model = $temp_model;
            }
            else{
                $model->created_by = Auth::id();
            }
        }
        else{
            $model->created_by = Auth::id();
        }

        $model->tahun = $request->tahun;
        $model->triwulan = $request->triwulan;
        $model->user_id = Auth::user()->company_id;
        
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
        $model->badan_hukum_grup = $request->badan_hukum_grup;
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
        $model['302_4b'] = $request->get("302_4b");
        $model['302_2c'] = $request->get("302_2c");
        $model['302_3c'] = $request->get("302_3c");
        $model['302_4c'] = $request->get("302_4c");
        
        $model->catatan =$request->catatan;
        $model->diisi_di=$request->diisi_di;
        $model->diisi_tanggal= date('Y-m-d', strtotime($request->diisi_tanggal));
        $model->status_dokumen= 1;

        $model->updated_by = Auth::id();

        if($model->save()){
            $all_rincian1 = $request->rincian1;
            foreach($all_rincian1 as $key=>$value){
                if($value['rincian']!=''){
                    $model_rincian = new RincianSawit;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianSawit::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }
    
                    $model_rincian->survei_id = $model->id;
                    $model_rincian->jenis = 1;
                    $model_rincian->rincian = $value['rincian'];
                    $model_rincian->tbm1 = $value['tbm1'];
                    $model_rincian->tsm1 = $value['tsm1'];
                    $model_rincian->tstm1 = $value['tstm1'];
                    $model_rincian->ttm1 = $value['ttm1'];
                    $model_rincian->produksi1 = $value['produksi1'];
                    $model_rincian->tbm2 = $value['tbm2'];
                    $model_rincian->tsm2 = $value['tsm2'];
                    $model_rincian->tstm2 = $value['tstm2'];
                    $model_rincian->ttm2 = $value['ttm2'];
                    $model_rincian->produksi2 = $value['produksi2'];
                    $model_rincian->tbm3 = $value['tbm3'];
                    $model_rincian->tsm3 = $value['tsm3'];
                    $model_rincian->tstm3 = $value['tstm3'];
                    $model_rincian->ttm3 = $value['ttm3'];
                    $model_rincian->produksi3 = $value['produksi3'];
                    $model_rincian->save();
                } 
            }

            $all_rincian2 = $request->rincian2;
            foreach($all_rincian2 as $key=>$value){
                if($value['rincian']!=''){
                    $model_rincian = new RincianSawit;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianSawit::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }

                    $model_rincian->survei_id = $model->id;
                    $model_rincian->jenis = 2;
                    $model_rincian->rincian = $value['rincian'];
                    $model_rincian->tbm1 = $value['tbm1'];
                    $model_rincian->tsm1 = $value['tsm1'];
                    $model_rincian->tstm1 = $value['tstm1'];
                    $model_rincian->ttm1 = $value['ttm1'];
                    $model_rincian->produksi1 = $value['produksi1'];
                    $model_rincian->tbm2 = $value['tbm2'];
                    $model_rincian->tsm2 = $value['tsm2'];
                    $model_rincian->tstm2 = $value['tstm2'];
                    $model_rincian->ttm2 = $value['ttm2'];
                    $model_rincian->produksi2 = $value['produksi2'];
                    $model_rincian->tbm3 = $value['tbm3'];
                    $model_rincian->tsm3 = $value['tsm3'];
                    $model_rincian->tstm3 = $value['tstm3'];
                    $model_rincian->ttm3 = $value['ttm3'];
                    $model_rincian->produksi3 = $value['produksi3'];
                    $model_rincian->save();
                }
            }
        }
    }
    
    public function sawit_send_store(Request $request, $id){
        $model = SurveiSawit::find($id);
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
        $model['302_4b'] = $request->get("302_4b");
        $model['302_2c'] = $request->get("302_2c");
        $model['302_3c'] = $request->get("302_3c");
        $model['302_4c'] = $request->get("302_4c");
        
        $model->catatan =$request->catatan;
        $model->diisi_di=$request->diisi_di;
        $model->diisi_tanggal= date('Y-m-d', strtotime($request->diisi_tanggal));
        $model->status_dokumen= 3;

        if($model->save()){
            $all_rincian1 = [];
            if($request->has('rincian1'))
                $all_rincian1 = $request->rincian1;
            foreach($all_rincian1 as $key=>$value){
                if($value['rincian']!=''){
                    $model_rincian = new RincianSawit;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianSawit::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }
    
                    $model_rincian->survei_id = $model->id;
                    $model_rincian->jenis = 1;
                    $model_rincian->rincian = $value['rincian'];
                    $model_rincian->tbm1 = $value['tbm1'];
                    $model_rincian->tsm1 = $value['tsm1'];
                    $model_rincian->tstm1 = $value['tstm1'];
                    $model_rincian->ttm1 = $value['ttm1'];
                    $model_rincian->produksi1 = $value['produksi1'];
                    $model_rincian->tbm2 = $value['tbm2'];
                    $model_rincian->tsm2 = $value['tsm2'];
                    $model_rincian->tstm2 = $value['tstm2'];
                    $model_rincian->ttm2 = $value['ttm2'];
                    $model_rincian->produksi2 = $value['produksi2'];
                    $model_rincian->tbm3 = $value['tbm3'];
                    $model_rincian->tsm3 = $value['tsm3'];
                    $model_rincian->tstm3 = $value['tstm3'];
                    $model_rincian->ttm3 = $value['ttm3'];
                    $model_rincian->produksi3 = $value['produksi3'];
                    $model_rincian->save();
                } 
            }

            $all_rincian2 = [];
            if($request->has('rincian2'))
                $all_rincian2 = $request->rincian2;
            foreach($all_rincian2 as $key=>$value){
                if($value['rincian']!=''){
                    $model_rincian = new RincianSawit;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianSawit::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }

                    $model_rincian->survei_id = $model->id;
                    $model_rincian->jenis = 2;
                    $model_rincian->rincian = $value['rincian'];
                    $model_rincian->tbm1 = $value['tbm1'];
                    $model_rincian->tsm1 = $value['tsm1'];
                    $model_rincian->tstm1 = $value['tstm1'];
                    $model_rincian->ttm1 = $value['ttm1'];
                    $model_rincian->produksi1 = $value['produksi1'];
                    $model_rincian->tbm2 = $value['tbm2'];
                    $model_rincian->tsm2 = $value['tsm2'];
                    $model_rincian->tstm2 = $value['tstm2'];
                    $model_rincian->ttm2 = $value['ttm2'];
                    $model_rincian->produksi2 = $value['produksi2'];
                    $model_rincian->tbm3 = $value['tbm3'];
                    $model_rincian->tsm3 = $value['tsm3'];
                    $model_rincian->tstm3 = $value['tstm3'];
                    $model_rincian->ttm3 = $value['ttm3'];
                    $model_rincian->produksi3 = $value['produksi3'];
                    $model_rincian->save();
                }
            }
            return response()->json(['result'=>1]);
        }
        else{
            return response()->json(['result'=>2]);
        }
    }
    
    public function karet_send_store(Request $request, $id){
        $model = SurveiKaret::find($id);

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
        $model['302_4b'] = $request->get("302_4b");
        $model['302_2c'] = $request->get("302_2c");
        $model['302_3c'] = $request->get("302_3c");
        $model['302_4c'] = $request->get("302_4c");
        
        $model->catatan =$request->catatan;
        $model->diisi_di=$request->diisi_di;
        $model->diisi_tanggal= date('Y-m-d', strtotime($request->diisi_tanggal));
        $model->status_dokumen= 3;

        if($model->save()){
            $all_rincian1 = [];
            if($request->has('rincian1'))
                $all_rincian1 = $request->rincian1;
            foreach($all_rincian1 as $key=>$value){
                if($value['rincian']!=''){
                    $model_rincian = new RincianSawit;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianSawit::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }
    
                    $model_rincian->survei_id = $model->id;
                    $model_rincian->jenis = 1;
                    $model_rincian->rincian = $value['rincian'];
                    $model_rincian->tbm1 = $value['tbm1'];
                    $model_rincian->tsm1 = $value['tsm1'];
                    $model_rincian->tstm1 = $value['tstm1'];
                    $model_rincian->ttm1 = $value['ttm1'];
                    $model_rincian->produksi1 = $value['produksi1'];
                    $model_rincian->tbm2 = $value['tbm2'];
                    $model_rincian->tsm2 = $value['tsm2'];
                    $model_rincian->tstm2 = $value['tstm2'];
                    $model_rincian->ttm2 = $value['ttm2'];
                    $model_rincian->produksi2 = $value['produksi2'];
                    $model_rincian->tbm3 = $value['tbm3'];
                    $model_rincian->tsm3 = $value['tsm3'];
                    $model_rincian->tstm3 = $value['tstm3'];
                    $model_rincian->ttm3 = $value['ttm3'];
                    $model_rincian->produksi3 = $value['produksi3'];
                    $model_rincian->save();
                } 
            }
            
            $all_rincian2 = [];
            if($request->has('rincian2'))
                $all_rincian2 = $request->rincian2;
            foreach($all_rincian2 as $key=>$value){
                if($value['rincian']!=''){
                    $model_rincian = new RincianSawit;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianSawit::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }

                    $model_rincian->survei_id = $model->id;
                    $model_rincian->jenis = 2;
                    $model_rincian->rincian = $value['rincian'];
                    $model_rincian->tbm1 = $value['tbm1'];
                    $model_rincian->tsm1 = $value['tsm1'];
                    $model_rincian->tstm1 = $value['tstm1'];
                    $model_rincian->ttm1 = $value['ttm1'];
                    $model_rincian->produksi1 = $value['produksi1'];
                    $model_rincian->tbm2 = $value['tbm2'];
                    $model_rincian->tsm2 = $value['tsm2'];
                    $model_rincian->tstm2 = $value['tstm2'];
                    $model_rincian->ttm2 = $value['ttm2'];
                    $model_rincian->produksi2 = $value['produksi2'];
                    $model_rincian->tbm3 = $value['tbm3'];
                    $model_rincian->tsm3 = $value['tsm3'];
                    $model_rincian->tstm3 = $value['tstm3'];
                    $model_rincian->ttm3 = $value['ttm3'];
                    $model_rincian->produksi3 = $value['produksi3'];
                    $model_rincian->save();
                }
            }

            return response()->json(['result'=>1]);
        }
        else{
            return response()->json(['result'=>2]);
        }
    }

    public function sawit_clean_store(Request $request){
        $model = new SurveiSawit;
        
        if($request->id!=0){
            $temp_model = SurveiSawit::find($request->id);
            if($temp_model!=null){
                $model = $temp_model;
            }
            else{
                $model->created_by = Auth::id();
            }
        }
        else{
            $model->created_by = Auth::id();
        }

        $model->tahun = $request->tahun;
        $model->triwulan = $request->triwulan;
        $model->user_id = Auth::user()->company_id;
        
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
        $model['302_4b'] = $request->get("302_4b");
        $model['302_2c'] = $request->get("302_2c");
        $model['302_3c'] = $request->get("302_3c");
        $model['302_4c'] = $request->get("302_4c");
        
        $model->catatan =$request->catatan;
        $model->diisi_di=$request->diisi_di;
        $model->diisi_tanggal= date('Y-m-d', strtotime($request->diisi_tanggal));
        $model->status_dokumen= 2;

        $model->updated_by = Auth::id();

        if($model->save()){
            $all_rincian1 = $request->rincian1;
            foreach($all_rincian1 as $key=>$value){
                if($value['rincian']!=''){
                    $model_rincian = new RincianSawit;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianSawit::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }
    
                    $model_rincian->survei_id = $model->id;
                    $model_rincian->jenis = 1;
                    $model_rincian->rincian = $value['rincian'];
                    $model_rincian->tbm1 = $value['tbm1'];
                    $model_rincian->tsm1 = $value['tsm1'];
                    $model_rincian->tstm1 = $value['tstm1'];
                    $model_rincian->ttm1 = $value['ttm1'];
                    $model_rincian->produksi1 = $value['produksi1'];
                    $model_rincian->tbm2 = $value['tbm2'];
                    $model_rincian->tsm2 = $value['tsm2'];
                    $model_rincian->tstm2 = $value['tstm2'];
                    $model_rincian->ttm2 = $value['ttm2'];
                    $model_rincian->produksi2 = $value['produksi2'];
                    $model_rincian->tbm3 = $value['tbm3'];
                    $model_rincian->tsm3 = $value['tsm3'];
                    $model_rincian->tstm3 = $value['tstm3'];
                    $model_rincian->ttm3 = $value['ttm3'];
                    $model_rincian->produksi3 = $value['produksi3'];
                    $model_rincian->save();
                } 
            }

            $all_rincian2 = $request->rincian2;
            foreach($all_rincian2 as $key=>$value){
                if($value['rincian']!=''){
                    $model_rincian = new RincianSawit;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianSawit::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }

                    $model_rincian->survei_id = $model->id;
                    $model_rincian->jenis = 2;
                    $model_rincian->rincian = $value['rincian'];
                    $model_rincian->tbm1 = $value['tbm1'];
                    $model_rincian->tsm1 = $value['tsm1'];
                    $model_rincian->tstm1 = $value['tstm1'];
                    $model_rincian->ttm1 = $value['ttm1'];
                    $model_rincian->produksi1 = $value['produksi1'];
                    $model_rincian->tbm2 = $value['tbm2'];
                    $model_rincian->tsm2 = $value['tsm2'];
                    $model_rincian->tstm2 = $value['tstm2'];
                    $model_rincian->ttm2 = $value['ttm2'];
                    $model_rincian->produksi2 = $value['produksi2'];
                    $model_rincian->tbm3 = $value['tbm3'];
                    $model_rincian->tsm3 = $value['tsm3'];
                    $model_rincian->tstm3 = $value['tstm3'];
                    $model_rincian->ttm3 = $value['ttm3'];
                    $model_rincian->produksi3 = $value['produksi3'];
                    $model_rincian->save();
                }
            }
        }
    }

    public function show_sawit($tahun, $triwulan){
        $model = SurveiSawit::where('user_id', '=', Auth::user()->company_id)
                ->where('tahun', '=', $tahun)
                ->where('triwulan', '=', $triwulan)
                ->first();

        if($model==null){
            return response()->json(['data'=>null, 'rincian1'=> [], 'rincian2'=> []]);
        }
        else{
            $rincian1 = RincianSawit::where('survei_id', '=', $model->id)
                    ->where('jenis', '=', 1)->get();
                    
            $rincian2 = RincianSawit::where('survei_id', '=', $model->id)
                    ->where('jenis', '=', 2)->get();

            return response()->json(['data'=>$model, 'rincian1'=> $rincian1, 'rincian2'=> $rincian2]);
        }
    }

    public function index_karet(Request $request){
        $datas = SurveiKaret::where('user_id', '=', Auth::user()->company_id)->paginate();
        $datas->withPath('survei/index_karet');
        $datas->appends($request->all());    
        
        return view('survei.index_karet', compact('datas'));
    }

    public function detail_karet($id){
        $model = SurveiKaret::find($id);
        $rincian1 = [];
        $rincian2 = [];

        if($model!=null){
            $rincian1 = RincianKaret::where('survei_id', '=', $model->id)->where('jenis', '=', 1)->get();
            $rincian2 = RincianKaret::where('survei_id', '=', $model->id)->where('jenis', '=', 2)->get();
        }

        return view('survei.detail_karet', compact('model', 'rincian1', 'rincian2'));
    }

    public function index_tahunan(Request $request){
        $datas = SurveiTahunan::where('user_id', '=', Auth::user()->company_id)->paginate();
        $datas->withPath('survei/index_tahunan');
        $datas->appends($request->all());    
        
        return view('survei.index_tahunan', compact('datas'));
    }
    
    public function karet_print($id){
    }
    
    public function karet(){
        $model = User::find(Auth::id());
        $user_profile = ProfilPerusahaan::find($model->company_id);
        // $user_profile = ProfilPerusahaan::where('user_id', '=', Auth::id())->first();
        return view('survei.karet', compact('user_profile'));
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
        else{
            $model->created_by = Auth::id();
        }

        $model->tahun = $request->tahun;
        $model->triwulan = $request->triwulan;
        $model->user_id = Auth::user()->company_id;
        
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
        $model->badan_hukum_grup = $request->badan_hukum_grup;
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
        $model['302_4b'] = $request->get("302_4b");
        $model['302_2c'] = $request->get("302_2c");
        $model['302_3c'] = $request->get("302_3c");
        $model['302_4c'] = $request->get("302_4c");
        
        $model->catatan =$request->catatan;
        $model->diisi_di=$request->diisi_di;
        $model->diisi_tanggal= date('Y-m-d', strtotime($request->diisi_tanggal));
        $model->status_dokumen= 1;

        $model->updated_by = Auth::id();

        if($model->save()){
            $all_rincian1 = $request->rincian1;
            foreach($all_rincian1 as $key=>$value){
                if($value['rincian']!=''){
                    $model_rincian = new RincianKaret;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianKaret::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }
    
                    $model_rincian->survei_id = $model->id;
                    $model_rincian->jenis = 1;
                    $model_rincian->rincian = $value['rincian'];
                    $model_rincian->tbm1 = $value['tbm1'];
                    $model_rincian->tsm1 = $value['tsm1'];
                    $model_rincian->tstm1 = $value['tstm1'];
                    $model_rincian->ttm1 = $value['ttm1'];
                    $model_rincian->produksi1 = $value['produksi1'];
                    $model_rincian->tbm2 = $value['tbm2'];
                    $model_rincian->tsm2 = $value['tsm2'];
                    $model_rincian->tstm2 = $value['tstm2'];
                    $model_rincian->ttm2 = $value['ttm2'];
                    $model_rincian->produksi2 = $value['produksi2'];
                    $model_rincian->tbm3 = $value['tbm3'];
                    $model_rincian->tsm3 = $value['tsm3'];
                    $model_rincian->tstm3 = $value['tstm3'];
                    $model_rincian->ttm3 = $value['ttm3'];
                    $model_rincian->produksi3 = $value['produksi3'];
                    $model_rincian->save();
                } 
            }

            $all_rincian2 = $request->rincian2;
            foreach($all_rincian2 as $key=>$value){
                if($value['rincian']!=''){
                    $model_rincian = new RincianKaret;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianKaret::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }

                    $model_rincian->survei_id = $model->id;
                    $model_rincian->jenis = 2;
                    $model_rincian->rincian = $value['rincian'];
                    $model_rincian->tbm1 = $value['tbm1'];
                    $model_rincian->tsm1 = $value['tsm1'];
                    $model_rincian->tstm1 = $value['tstm1'];
                    $model_rincian->ttm1 = $value['ttm1'];
                    $model_rincian->produksi1 = $value['produksi1'];
                    $model_rincian->tbm2 = $value['tbm2'];
                    $model_rincian->tsm2 = $value['tsm2'];
                    $model_rincian->tstm2 = $value['tstm2'];
                    $model_rincian->ttm2 = $value['ttm2'];
                    $model_rincian->produksi2 = $value['produksi2'];
                    $model_rincian->tbm3 = $value['tbm3'];
                    $model_rincian->tsm3 = $value['tsm3'];
                    $model_rincian->tstm3 = $value['tstm3'];
                    $model_rincian->ttm3 = $value['ttm3'];
                    $model_rincian->produksi3 = $value['produksi3'];
                    $model_rincian->save();
                }
            }
        }
    }

    public function karet_clean_store(Request $request){
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
        else{
            $model->created_by = Auth::id();
        }

        $model->tahun = $request->tahun;
        $model->triwulan = $request->triwulan;
        $model->user_id = Auth::user()->company_id;
        
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
        $model['302_4b'] = $request->get("302_4b");
        $model['302_2c'] = $request->get("302_2c");
        $model['302_3c'] = $request->get("302_3c");
        $model['302_4c'] = $request->get("302_4c");
        
        $model->catatan =$request->catatan;
        $model->diisi_di=$request->diisi_di;
        $model->diisi_tanggal= date('Y-m-d', strtotime($request->diisi_tanggal));
        $model->status_dokumen= 2;

        $model->updated_by = Auth::id();

        if($model->save()){
            $all_rincian1 = $request->rincian1;
            foreach($all_rincian1 as $key=>$value){
                if($value['rincian']!=''){
                    $model_rincian = new RincianKaret;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianKaret::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }
    
                    $model_rincian->survei_id = $model->id;
                    $model_rincian->jenis = 1;
                    $model_rincian->rincian = $value['rincian'];
                    $model_rincian->tbm1 = $value['tbm1'];
                    $model_rincian->tsm1 = $value['tsm1'];
                    $model_rincian->tstm1 = $value['tstm1'];
                    $model_rincian->ttm1 = $value['ttm1'];
                    $model_rincian->produksi1 = $value['produksi1'];
                    $model_rincian->tbm2 = $value['tbm2'];
                    $model_rincian->tsm2 = $value['tsm2'];
                    $model_rincian->tstm2 = $value['tstm2'];
                    $model_rincian->ttm2 = $value['ttm2'];
                    $model_rincian->produksi2 = $value['produksi2'];
                    $model_rincian->tbm3 = $value['tbm3'];
                    $model_rincian->tsm3 = $value['tsm3'];
                    $model_rincian->tstm3 = $value['tstm3'];
                    $model_rincian->ttm3 = $value['ttm3'];
                    $model_rincian->produksi3 = $value['produksi3'];
                    $model_rincian->save();
                } 
            }

            $all_rincian2 = $request->rincian2;
            foreach($all_rincian2 as $key=>$value){
                if($value['rincian']!=''){
                    $model_rincian = new RincianKaret;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianKaret::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }

                    $model_rincian->survei_id = $model->id;
                    $model_rincian->jenis = 2;
                    $model_rincian->rincian = $value['rincian'];
                    $model_rincian->tbm1 = $value['tbm1'];
                    $model_rincian->tsm1 = $value['tsm1'];
                    $model_rincian->tstm1 = $value['tstm1'];
                    $model_rincian->ttm1 = $value['ttm1'];
                    $model_rincian->produksi1 = $value['produksi1'];
                    $model_rincian->tbm2 = $value['tbm2'];
                    $model_rincian->tsm2 = $value['tsm2'];
                    $model_rincian->tstm2 = $value['tstm2'];
                    $model_rincian->ttm2 = $value['ttm2'];
                    $model_rincian->produksi2 = $value['produksi2'];
                    $model_rincian->tbm3 = $value['tbm3'];
                    $model_rincian->tsm3 = $value['tsm3'];
                    $model_rincian->tstm3 = $value['tstm3'];
                    $model_rincian->ttm3 = $value['ttm3'];
                    $model_rincian->produksi3 = $value['produksi3'];
                    $model_rincian->save();
                }
            }
        }
    }

    public function show_karet($tahun, $triwulan){
        $model = SurveiKaret::where('user_id', '=', Auth::user()->company_id)
                ->where('tahun', '=', $tahun)
                ->where('triwulan', '=', $triwulan)
                ->first();

        if($model==null){
            return response()->json(['data'=>null, 'rincian1'=> [], 'rincian2'=> []]);
        }
        else{
            $rincian1 = RincianKaret::where('survei_id', '=', $model->id)
                    ->where('jenis', '=', 1)->get();
                    
            $rincian2 = RincianKaret::where('survei_id', '=', $model->id)
                    ->where('jenis', '=', 2)->get();

            return response()->json(['data'=>$model, 'rincian1'=> $rincian1, 'rincian2'=> $rincian2]);
        }
    }

    public function tahunan(){
        $model = User::find(Auth::id());
        $user_profile = ProfilPerusahaan::find($model->company_id);
        // $user_profile = ProfilPerusahaan::where('user_id', '=', Auth::id())->first();
        return view('survei.tahunan', compact('user_profile'));
    }
    
    public function show_tahunan($tahun){
        $model = SurveiTahunan::where('user_id', '=', Auth::user()->company_id)
                ->where('tahun', '=', $tahun)
                ->first();

        if($model==null){
            return response()->json(['data'=>null, 'rincian1'=> [], 'rincian2'=> []]);
        }
        else{
            $data_rincian_tahunan = RincianTahunanTahun::where('survei_id', '=', $model->id)->get();
            $data_rincian_semusim = RincianTahunanSemusim::where('survei_id', '=', $model->id)->get();

            $rincian_tahunan = RincianTahunanTahunResource::collection($data_rincian_tahunan);
            $rincian_semusim = RincianTahunanSemusimResource::collection($data_rincian_semusim);

            return response()->json([
                'data'=>$model, 
                'rincian_tahunan'=> $rincian_tahunan, 
                'rincian_semusim'=> $rincian_semusim
            ]);
        }
    }
    
    public function tahunan_store(Request $request){
        $model = new SurveiTahunan;
        
        if($request->id!=0){
            $temp_model = SurveiTahunan::find($request->id);
            if($temp_model!=null){
                $model = $temp_model;
            }
            else{
                $model->created_by = Auth::id();
            }
        }
        else{
            $model->created_by = Auth::id();
        }

        $model->tahun = $request->tahun;
        $model->user_id = Auth::user()->company_id;
        
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

        $model->status_pemodalan = $request->status_pemodalan;
        $model->badan_hukum = $request->badan_hukum;
        $model->apakah_pelaksana_kemitraan = $request->apakah_pelaksana_kemitraan;
        $model->punya_unit_pengolahan = $request->punya_unit_pengolahan;
        $model->kondisi_perusahaan = $request->kondisi_perusahaan;
        $model->masa_berlaku_hgu_dari = $request->masa_berlaku_hgu_dari;
        $model->masa_berlaku_hgu_sampai = $request->masa_berlaku_hgu_sampai;
        $model->jenis_kemitraan = $request->jenis_kemitraan;
        $model->jenis_kemitraan_lainnya = $request->jenis_kemitraan_lainnya;

        $model->bpt_admin_laki = $request->bpt_admin_laki;
        $model->bpt_kebun_laki = $request->bpt_kebun_laki;
        $model->upt_admin_laki = $request->upt_admin_laki;
        $model->upt_kebun_laki = $request->upt_kebun_laki;
        $model->bptt_admin_laki = $request->bptt_admin_laki;
        $model->bptt_kebun_laki = $request->bptt_kebun_laki;
        $model->uptt_admin_laki = $request->uptt_admin_laki;
        $model->uptt_kebun_laki = $request->uptt_kebun_laki;
        
        $model->bpt_admin_perempuan = $request->bpt_admin_perempuan;
        $model->bpt_kebun_perempuan = $request->bpt_kebun_perempuan;
        $model->upt_admin_perempuan = $request->upt_admin_perempuan;
        $model->upt_kebun_perempuan = $request->upt_kebun_perempuan;
        $model->bptt_admin_perempuan = $request->bptt_admin_perempuan;
        $model->bptt_kebun_perempuan = $request->bptt_kebun_perempuan;
        $model->uptt_admin_perempuan = $request->uptt_admin_perempuan;
        $model->uptt_kebun_perempuan = $request->uptt_kebun_perempuan;
        
        $model->pendapatan_bersih_kebun = $request->pendapatan_bersih_kebun;
        $model->pendapatan_bersih_tani_lain = $request->pendapatan_bersih_tani_lain;
        $model->pendapatan_hasil_kemitraan = $request->pendapatan_hasil_kemitraan;
        $model->pendapatan_dari_sewa = $request->pendapatan_dari_sewa;
        $model->pendapatan_jual_bibit = $request->pendapatan_jual_bibit;
        $model->pendapatan_bersih_lain = $request->pendapatan_bersih_lain;
        
        $model->pupuk1 = $request->pupuk1;
        $model->pupuk2 = $request->pupuk2;
        $model->pestisida1 = $request->pestisida1;
        $model->pestisida2 = $request->pestisida2;
        
        $model->nama_pencacah = $request->nama_pencacah;
        $model->tanggal_pencacah = date('Y-m-d', strtotime($request->tanggal_pencacah));
        $model->ttd_pencacah = $request->ttd_pencacah;
        $model->nama_pemeriksa = $request->nama_pemeriksa;
        $model->tanggal_pemeriksa = date('Y-m-d', strtotime($request->tanggal_pemeriksa));
        $model->ttd_pemeriksa = $request->ttd_pemeriksa;
        
        $model->catatan =$request->catatan;
        $model->diisi_di=$request->diisi_di;
        $model->diisi_tanggal= date('Y-m-d', strtotime($request->diisi_tanggal));
        $model->diisi_administratur=$request->diisi_administratur;
        $model->status_dokumen= 1;

        $model->updated_by = Auth::id();

        if($model->save()){
            $rincian_tahunan = [];
            $rincian_semusim = [];
            if($request->has('rincian_tahunan'))
                $rincian_tahunan = $request->rincian_tahunan;
                
            if($request->has('rincian_semusim'))
                $rincian_semusim = $request->rincian_semusim;

            foreach($rincian_tahunan as $key=>$value){
                if($value['kode_tanaman']!=''){
                    $model_rincian = new RincianTahunanTahun;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianTahunanTahun::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }
    
                    $model_rincian->survei_id = $model->id;
                    $model_rincian->kode_tanaman = $value['kode_tanaman'];
                    $model_rincian->luas_sendiri_5 = $value['luas_sendiri_5'];
                    $model_rincian->luas_sendiri_5_10 = $value['luas_sendiri_5_10'];
                    $model_rincian->luas_sendiri_11_25 = $value['luas_sendiri_11_25'];
                    $model_rincian->luas_sendiri_25 = $value['luas_sendiri_25'];
                    $model_rincian->luas_plasma_5 = $value['luas_plasma_5'];
                    $model_rincian->luas_plasma_5_10 = $value['luas_plasma_5_10'];
                    $model_rincian->luas_plasma_11_25 = $value['luas_plasma_11_25'];
                    $model_rincian->luas_plasma_25 = $value['luas_plasma_25'];

                    $model_rincian->sendiri_bentuk_produksi = $value['sendiri_bentuk_produksi'];
                    $model_rincian->sendiri_rata_rendemen = $value['sendiri_rata_rendemen'];
                    $model_rincian->plasma_bentuk_produksi = $value['plasma_bentuk_produksi'];
                    $model_rincian->plasma_rata_rendemen = $value['plasma_rata_rendemen'];
                    $model_rincian->bibit_tanaman = $value['bibit_tanaman'];
                    $model_rincian->pupuk1 = $value['pupuk1'];
                    $model_rincian->pupuk2 = $value['pupuk2'];
                    $model_rincian->pestisida1 = $value['pestisida1'];
                    $model_rincian->pestisida2 = $value['pestisida2'];
                    $model_rincian->bahan_bakar_budidaya = $value['bahan_bakar_budidaya'];
                    $model_rincian->sewa_lahan = $value['sewa_lahan'];
                    $model_rincian->pengeluaran_lainnya = $value['pengeluaran_lainnya'];
                    $model_rincian->biaya_kemitraan = $value['biaya_kemitraan'];

                    if($model_rincian->save()){
                        if (array_key_exists('list_kebun_tahunan_sendiri', $value)) {
                            foreach($value['list_kebun_tahunan_sendiri'] as $key2=>$value2){
                                $rincian_kebun_tahun = new KebunTahunanTahun;
                                if($value2['id']!=0){
                                    $temp_model_kebun = KebunTahunanTahun::find($value2['id']);
                                    if($temp_model_kebun!=null){
                                        $rincian_kebun_tahun = $temp_model_kebun;
                                    }
                                }
    
                                $rincian_kebun_tahun->survei_id = $model->id;
                                $rincian_kebun_tahun->rincian_id = $model_rincian->id;
                                $rincian_kebun_tahun->jenis = 1;
                                $rincian_kebun_tahun->nama_kebun = $value2['nama_kebun'];
                                $rincian_kebun_tahun->kode_prov = $value2['kode_prov'];
                                $rincian_kebun_tahun->kode_kab = $value2['kode_kab'];
                                $rincian_kebun_tahun->kode_kec = $value2['kode_kec'];
                                $rincian_kebun_tahun->kode_desa = $value2['kode_desa'];
                                
                                $rincian_kebun_tahun->real1_tbm = $value2['real1_tbm'];
                                $rincian_kebun_tahun->real1_tsm = $value2['real1_tsm'];
                                $rincian_kebun_tahun->real1_tstm = $value2['real1_tstm'];
                                $rincian_kebun_tahun->real1_ttm = $value2['real1_ttm'];
                                $rincian_kebun_tahun->real1_produksi = $value2['real1_produksi'];
                                $rincian_kebun_tahun->real1_nilai = $value2['real1_nilai'];
                                
                                $rincian_kebun_tahun->real2_tbm = $value2['real2_tbm'];
                                $rincian_kebun_tahun->real2_tsm = $value2['real2_tsm'];
                                $rincian_kebun_tahun->real2_tstm = $value2['real2_tstm'];
                                $rincian_kebun_tahun->real2_ttm = $value2['real2_ttm'];
                                $rincian_kebun_tahun->real2_produksi = $value2['real2_produksi'];
                                $rincian_kebun_tahun->real2_nilai = $value2['real2_nilai'];
                                
                                $rincian_kebun_tahun->real3_tbm = $value2['real3_tbm'];
                                $rincian_kebun_tahun->real3_tsm = $value2['real3_tsm'];
                                $rincian_kebun_tahun->real3_tstm = $value2['real3_tstm'];
                                $rincian_kebun_tahun->real3_ttm = $value2['real3_ttm'];
                                $rincian_kebun_tahun->real3_produksi = $value2['real3_produksi'];
                                $rincian_kebun_tahun->real3_nilai = $value2['real3_nilai'];
                                
                                $rincian_kebun_tahun->real4_tbm = $value2['real4_tbm'];
                                $rincian_kebun_tahun->real4_tsm = $value2['real4_tsm'];
                                $rincian_kebun_tahun->real4_tstm = $value2['real4_tstm'];
                                $rincian_kebun_tahun->real4_ttm = $value2['real4_ttm'];
                                $rincian_kebun_tahun->real4_produksi = $value2['real4_produksi'];
                                $rincian_kebun_tahun->real4_nilai = $value2['real4_nilai'];
                                
                                $rincian_kebun_tahun->target1_tbm = $value2['target1_tbm'];
                                $rincian_kebun_tahun->target1_tsm = $value2['target1_tsm'];
                                $rincian_kebun_tahun->target1_tstm = $value2['target1_tstm'];
                                $rincian_kebun_tahun->target1_ttm = $value2['target1_ttm'];
                                $rincian_kebun_tahun->target1_produksi = $value2['target1_produksi'];
                                $rincian_kebun_tahun->target1_nilai = $value2['target1_nilai'];
                                
                                $rincian_kebun_tahun->target2_tbm = $value2['target2_tbm'];
                                $rincian_kebun_tahun->target2_tsm = $value2['target2_tsm'];
                                $rincian_kebun_tahun->target2_tstm = $value2['target2_tstm'];
                                $rincian_kebun_tahun->target2_ttm = $value2['target2_ttm'];
                                $rincian_kebun_tahun->target2_produksi = $value2['target2_produksi'];
                                $rincian_kebun_tahun->target2_nilai = $value2['target2_nilai'];
                                
                                $rincian_kebun_tahun->target3_tbm = $value2['target3_tbm'];
                                $rincian_kebun_tahun->target3_tsm = $value2['target3_tsm'];
                                $rincian_kebun_tahun->target3_tstm = $value2['target3_tstm'];
                                $rincian_kebun_tahun->target3_ttm = $value2['target3_ttm'];
                                $rincian_kebun_tahun->target3_produksi = $value2['target3_produksi'];
                                $rincian_kebun_tahun->target3_nilai = $value2['target3_nilai'];
                                
                                $rincian_kebun_tahun->target4_tbm = $value2['target4_tbm'];
                                $rincian_kebun_tahun->target4_tsm = $value2['target4_tsm'];
                                $rincian_kebun_tahun->target4_tstm = $value2['target4_tstm'];
                                $rincian_kebun_tahun->target4_ttm = $value2['target4_ttm'];
                                $rincian_kebun_tahun->target4_produksi = $value2['target4_produksi'];
                                $rincian_kebun_tahun->target4_nilai = $value2['target4_nilai'];
                                $rincian_kebun_tahun->save();
                            }
                        }
                        ///////////////
                        if (array_key_exists('list_kebun_tahunan_plasma', $value)) {
                            foreach($value['list_kebun_tahunan_plasma'] as $key2=>$value2){
                                $rincian_kebun_tahun = new KebunTahunanTahun;
                                if($value2['id']!=0){
                                    $temp_model_kebun = KebunTahunanTahun::find($value2['id']);
                                    if($temp_model_kebun!=null){
                                        $rincian_kebun_tahun = $temp_model_kebun;
                                    }
                                }
    
                                $rincian_kebun_tahun->survei_id = $model->id;
                                $rincian_kebun_tahun->rincian_id = $model_rincian->id;
                                $rincian_kebun_tahun->jenis = 2;
                                $rincian_kebun_tahun->nama_kebun = $value2['nama_kebun'];
                                $rincian_kebun_tahun->kode_prov = $value2['kode_prov'];
                                $rincian_kebun_tahun->kode_kab = $value2['kode_kab'];
                                $rincian_kebun_tahun->kode_kec = $value2['kode_kec'];
                                $rincian_kebun_tahun->kode_desa = $value2['kode_desa'];
                                
                                $rincian_kebun_tahun->real1_tbm = $value2['real1_tbm'];
                                $rincian_kebun_tahun->real1_tsm = $value2['real1_tsm'];
                                $rincian_kebun_tahun->real1_tstm = $value2['real1_tstm'];
                                $rincian_kebun_tahun->real1_ttm = $value2['real1_ttm'];
                                $rincian_kebun_tahun->real1_produksi = $value2['real1_produksi'];
                                $rincian_kebun_tahun->real1_nilai = $value2['real1_nilai'];
                                
                                $rincian_kebun_tahun->real2_tbm = $value2['real2_tbm'];
                                $rincian_kebun_tahun->real2_tsm = $value2['real2_tsm'];
                                $rincian_kebun_tahun->real2_tstm = $value2['real2_tstm'];
                                $rincian_kebun_tahun->real2_ttm = $value2['real2_ttm'];
                                $rincian_kebun_tahun->real2_produksi = $value2['real2_produksi'];
                                $rincian_kebun_tahun->real2_nilai = $value2['real2_nilai'];
                                
                                $rincian_kebun_tahun->real3_tbm = $value2['real3_tbm'];
                                $rincian_kebun_tahun->real3_tsm = $value2['real3_tsm'];
                                $rincian_kebun_tahun->real3_tstm = $value2['real3_tstm'];
                                $rincian_kebun_tahun->real3_ttm = $value2['real3_ttm'];
                                $rincian_kebun_tahun->real3_produksi = $value2['real3_produksi'];
                                $rincian_kebun_tahun->real3_nilai = $value2['real3_nilai'];
                                
                                $rincian_kebun_tahun->real4_tbm = $value2['real4_tbm'];
                                $rincian_kebun_tahun->real4_tsm = $value2['real4_tsm'];
                                $rincian_kebun_tahun->real4_tstm = $value2['real4_tstm'];
                                $rincian_kebun_tahun->real4_ttm = $value2['real4_ttm'];
                                $rincian_kebun_tahun->real4_produksi = $value2['real4_produksi'];
                                $rincian_kebun_tahun->real4_nilai = $value2['real4_nilai'];
                                
                                $rincian_kebun_tahun->target1_tbm = $value2['target1_tbm'];
                                $rincian_kebun_tahun->target1_tsm = $value2['target1_tsm'];
                                $rincian_kebun_tahun->target1_tstm = $value2['target1_tstm'];
                                $rincian_kebun_tahun->target1_ttm = $value2['target1_ttm'];
                                $rincian_kebun_tahun->target1_produksi = $value2['target1_produksi'];
                                $rincian_kebun_tahun->target1_nilai = $value2['target1_nilai'];
                                
                                $rincian_kebun_tahun->target2_tbm = $value2['target2_tbm'];
                                $rincian_kebun_tahun->target2_tsm = $value2['target2_tsm'];
                                $rincian_kebun_tahun->target2_tstm = $value2['target2_tstm'];
                                $rincian_kebun_tahun->target2_ttm = $value2['target2_ttm'];
                                $rincian_kebun_tahun->target2_produksi = $value2['target2_produksi'];
                                $rincian_kebun_tahun->target2_nilai = $value2['target2_nilai'];
                                
                                $rincian_kebun_tahun->target3_tbm = $value2['target3_tbm'];
                                $rincian_kebun_tahun->target3_tsm = $value2['target3_tsm'];
                                $rincian_kebun_tahun->target3_tstm = $value2['target3_tstm'];
                                $rincian_kebun_tahun->target3_ttm = $value2['target3_ttm'];
                                $rincian_kebun_tahun->target3_produksi = $value2['target3_produksi'];
                                $rincian_kebun_tahun->target3_nilai = $value2['target3_nilai'];
                                
                                $rincian_kebun_tahun->target4_tbm = $value2['target4_tbm'];
                                $rincian_kebun_tahun->target4_tsm = $value2['target4_tsm'];
                                $rincian_kebun_tahun->target4_tstm = $value2['target4_tstm'];
                                $rincian_kebun_tahun->target4_ttm = $value2['target4_ttm'];
                                $rincian_kebun_tahun->target4_produksi = $value2['target4_produksi'];
                                $rincian_kebun_tahun->target4_nilai = $value2['target4_nilai'];
                                $rincian_kebun_tahun->save();
                            }
                        }
                    }
                } 
            }

            ////////////////////
            
            foreach($rincian_semusim as $key=>$value){
                if($value['kode_tanaman']!=''){
                    $model_rincian = new RincianTahunanSemusim;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianTahunanSemusim::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }
    
                    $model_rincian->survei_id = $model->id;
                    $model_rincian->kode_tanaman = $value['kode_tanaman'];

                    $model_rincian->sendiri_bentuk_produksi = $value['sendiri_bentuk_produksi'];
                    $model_rincian->sendiri_rata_rendemen = $value['sendiri_rata_rendemen'];
                    $model_rincian->plasma_bentuk_produksi = $value['plasma_bentuk_produksi'];
                    $model_rincian->plasma_rata_rendemen = $value['plasma_rata_rendemen'];
                    $model_rincian->bibit_tanaman = $value['bibit_tanaman'];
                    $model_rincian->pupuk1 = $value['pupuk1'];
                    $model_rincian->pupuk2 = $value['pupuk2'];
                    $model_rincian->pestisida1 = $value['pestisida1'];
                    $model_rincian->pestisida2 = $value['pestisida2'];
                    $model_rincian->bahan_bakar_budidaya = $value['bahan_bakar_budidaya'];
                    $model_rincian->sewa_lahan = $value['sewa_lahan'];
                    $model_rincian->sewa_alat = $value['sewa_alat'];
                    $model_rincian->pengeluaran_lainnya = $value['pengeluaran_lainnya'];
                    $model_rincian->biaya_kemitraan = $value['biaya_kemitraan'];

                    if($model_rincian->save()){
                        if (array_key_exists('list_kebun_semusim_sendiri', $value)) {
                            foreach($value['list_kebun_semusim_sendiri'] as $key2=>$value2){
                                $rincian_kebun_semusim = new KebunTahunanSemusim;
                                if($value2['id']!=0){
                                    $temp_model_kebun = KebunTahunanSemusim::find($value2['id']);
                                    if($temp_model_kebun!=null){
                                        $rincian_kebun_semusim = $temp_model_kebun;
                                    }
                                }
    
                                $rincian_kebun_semusim->survei_id = $model->id;
                                $rincian_kebun_semusim->rincian_id = $model_rincian->id;
                                $rincian_kebun_semusim->jenis = 1;
                                $rincian_kebun_semusim->nama_kebun = $value2['nama_kebun'];
                                $rincian_kebun_semusim->kode_prov = $value2['kode_prov'];
                                $rincian_kebun_semusim->kode_kab = $value2['kode_kab'];
                                $rincian_kebun_semusim->kode_kec = $value2['kode_kec'];
                                $rincian_kebun_semusim->kode_desa = $value2['kode_desa'];
                                
                                $rincian_kebun_semusim->real1_luas_tanam = $value2['real1_luas_tanam'];
                                $rincian_kebun_semusim->real1_luas_panen = $value2['real1_luas_panen'];
                                $rincian_kebun_semusim->real1_produksi = $value2['real1_produksi'];
                                $rincian_kebun_semusim->real1_nilai = $value2['real1_nilai'];
                                
                                $rincian_kebun_semusim->real2_luas_tanam = $value2['real2_luas_tanam'];
                                $rincian_kebun_semusim->real2_luas_panen = $value2['real2_luas_panen'];
                                $rincian_kebun_semusim->real2_produksi = $value2['real2_produksi'];
                                $rincian_kebun_semusim->real2_nilai = $value2['real2_nilai'];
                                
                                $rincian_kebun_semusim->real3_luas_tanam = $value2['real3_luas_tanam'];
                                $rincian_kebun_semusim->real3_luas_panen = $value2['real3_luas_panen'];
                                $rincian_kebun_semusim->real3_produksi = $value2['real3_produksi'];
                                $rincian_kebun_semusim->real3_nilai = $value2['real3_nilai'];
                                
                                $rincian_kebun_semusim->real4_luas_tanam = $value2['real4_luas_tanam'];
                                $rincian_kebun_semusim->real4_luas_panen = $value2['real4_luas_panen'];
                                $rincian_kebun_semusim->real4_produksi = $value2['real4_produksi'];
                                $rincian_kebun_semusim->real4_nilai = $value2['real4_nilai'];
    
                                $rincian_kebun_semusim->target1_luas_tanam = $value2['target1_luas_tanam'];
                                $rincian_kebun_semusim->target1_luas_panen = $value2['target1_luas_panen'];
                                $rincian_kebun_semusim->target1_produksi = $value2['target1_produksi'];
                                $rincian_kebun_semusim->target1_nilai = $value2['target1_nilai'];
                                
                                $rincian_kebun_semusim->target2_luas_tanam = $value2['target2_luas_tanam'];
                                $rincian_kebun_semusim->target2_luas_panen = $value2['target2_luas_panen'];
                                $rincian_kebun_semusim->target2_produksi = $value2['target2_produksi'];
                                $rincian_kebun_semusim->target2_nilai = $value2['target2_nilai'];
                                
                                $rincian_kebun_semusim->target3_luas_tanam = $value2['target3_luas_tanam'];
                                $rincian_kebun_semusim->target3_luas_panen = $value2['target3_luas_panen'];
                                $rincian_kebun_semusim->target3_produksi = $value2['target3_produksi'];
                                $rincian_kebun_semusim->target3_nilai = $value2['target3_nilai'];
                                
                                $rincian_kebun_semusim->target4_luas_tanam = $value2['target4_luas_tanam'];
                                $rincian_kebun_semusim->target4_luas_panen = $value2['target4_luas_panen'];
                                $rincian_kebun_semusim->target4_produksi = $value2['target4_produksi'];
                                $rincian_kebun_semusim->target4_nilai = $value2['target4_nilai'];
                                $rincian_kebun_semusim->save();
                            }
                        }
                        ///////////////
                        
                        if (array_key_exists('list_kebun_semusim_plasma', $value)) {
                            foreach($value['list_kebun_semusim_plasma'] as $key2=>$value2){
                                $rincian_kebun_semusim = new KebunTahunanSemusim;
                                if($value2['id']!=0){
                                    $temp_model_kebun = KebunTahunanSemusim::find($value2['id']);
                                    if($temp_model_kebun!=null){
                                        $rincian_kebun_semusim = $temp_model_kebun;
                                    }
                                }
    
                                $rincian_kebun_semusim->survei_id = $model->id;
                                $rincian_kebun_semusim->rincian_id = $model_rincian->id;
                                $rincian_kebun_semusim->jenis = 2;
                                $rincian_kebun_semusim->nama_kebun = $value2['nama_kebun'];
                                $rincian_kebun_semusim->kode_prov = $value2['kode_prov'];
                                $rincian_kebun_semusim->kode_kab = $value2['kode_kab'];
                                $rincian_kebun_semusim->kode_kec = $value2['kode_kec'];
                                $rincian_kebun_semusim->kode_desa = $value2['kode_desa'];
                                
                                $rincian_kebun_semusim->real1_luas_tanam = $value2['real1_luas_tanam'];
                                $rincian_kebun_semusim->real1_luas_panen = $value2['real1_luas_panen'];
                                $rincian_kebun_semusim->real1_produksi = $value2['real1_produksi'];
                                $rincian_kebun_semusim->real1_nilai = $value2['real1_nilai'];
                                
                                $rincian_kebun_semusim->real2_luas_tanam = $value2['real2_luas_tanam'];
                                $rincian_kebun_semusim->real2_luas_panen = $value2['real2_luas_panen'];
                                $rincian_kebun_semusim->real2_produksi = $value2['real2_produksi'];
                                $rincian_kebun_semusim->real2_nilai = $value2['real2_nilai'];
                                
                                $rincian_kebun_semusim->real3_luas_tanam = $value2['real3_luas_tanam'];
                                $rincian_kebun_semusim->real3_luas_panen = $value2['real3_luas_panen'];
                                $rincian_kebun_semusim->real3_produksi = $value2['real3_produksi'];
                                $rincian_kebun_semusim->real3_nilai = $value2['real3_nilai'];
                                
                                $rincian_kebun_semusim->real4_luas_tanam = $value2['real4_luas_tanam'];
                                $rincian_kebun_semusim->real4_luas_panen = $value2['real4_luas_panen'];
                                $rincian_kebun_semusim->real4_produksi = $value2['real4_produksi'];
                                $rincian_kebun_semusim->real4_nilai = $value2['real4_nilai'];
    
                                $rincian_kebun_semusim->target1_luas_tanam = $value2['target1_luas_tanam'];
                                $rincian_kebun_semusim->target1_luas_panen = $value2['target1_luas_panen'];
                                $rincian_kebun_semusim->target1_produksi = $value2['target1_produksi'];
                                $rincian_kebun_semusim->target1_nilai = $value2['target1_nilai'];
                                
                                $rincian_kebun_semusim->target2_luas_tanam = $value2['target2_luas_tanam'];
                                $rincian_kebun_semusim->target2_luas_panen = $value2['target2_luas_panen'];
                                $rincian_kebun_semusim->target2_produksi = $value2['target2_produksi'];
                                $rincian_kebun_semusim->target2_nilai = $value2['target2_nilai'];
                                
                                $rincian_kebun_semusim->target3_luas_tanam = $value2['target3_luas_tanam'];
                                $rincian_kebun_semusim->target3_luas_panen = $value2['target3_luas_panen'];
                                $rincian_kebun_semusim->target3_produksi = $value2['target3_produksi'];
                                $rincian_kebun_semusim->target3_nilai = $value2['target3_nilai'];
                                
                                $rincian_kebun_semusim->target4_luas_tanam = $value2['target4_luas_tanam'];
                                $rincian_kebun_semusim->target4_luas_panen = $value2['target4_luas_panen'];
                                $rincian_kebun_semusim->target4_produksi = $value2['target4_produksi'];
                                $rincian_kebun_semusim->target4_nilai = $value2['target4_nilai'];
                                $rincian_kebun_semusim->save();
                            }
                        }
                    }
                } 
            }
        }
    }

    public function tahunan_clean_store(Request $request){
        $model = new SurveiTahunan;
        
        if($request->id!=0){
            $temp_model = SurveiTahunan::find($request->id);
            if($temp_model!=null){
                $model = $temp_model;
            }
            else{
                $model->created_by = Auth::id();
            }
        }
        else{
            $model->created_by = Auth::id();
        }

        $model->tahun = $request->tahun;
        $model->user_id = Auth::user()->company_id;
        
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

        $model->status_pemodalan = $request->status_pemodalan;
        $model->badan_hukum = $request->badan_hukum;
        $model->apakah_pelaksana_kemitraan = $request->apakah_pelaksana_kemitraan;
        $model->punya_unit_pengolahan = $request->punya_unit_pengolahan;
        $model->kondisi_perusahaan = $request->kondisi_perusahaan;
        $model->masa_berlaku_hgu_dari = $request->masa_berlaku_hgu_dari;
        $model->masa_berlaku_hgu_sampai = $request->masa_berlaku_hgu_sampai;
        $model->jenis_kemitraan = $request->jenis_kemitraan;
        $model->jenis_kemitraan_lainnya = $request->jenis_kemitraan_lainnya;

        $model->bpt_admin_laki = $request->bpt_admin_laki;
        $model->bpt_kebun_laki = $request->bpt_kebun_laki;
        $model->upt_admin_laki = $request->upt_admin_laki;
        $model->upt_kebun_laki = $request->upt_kebun_laki;
        $model->bptt_admin_laki = $request->bptt_admin_laki;
        $model->bptt_kebun_laki = $request->bptt_kebun_laki;
        $model->uptt_admin_laki = $request->uptt_admin_laki;
        $model->uptt_kebun_laki = $request->uptt_kebun_laki;
        
        $model->bpt_admin_perempuan = $request->bpt_admin_perempuan;
        $model->bpt_kebun_perempuan = $request->bpt_kebun_perempuan;
        $model->upt_admin_perempuan = $request->upt_admin_perempuan;
        $model->upt_kebun_perempuan = $request->upt_kebun_perempuan;
        $model->bptt_admin_perempuan = $request->bptt_admin_perempuan;
        $model->bptt_kebun_perempuan = $request->bptt_kebun_perempuan;
        $model->uptt_admin_perempuan = $request->uptt_admin_perempuan;
        $model->uptt_kebun_perempuan = $request->uptt_kebun_perempuan;
        
        $model->pendapatan_bersih_kebun = $request->pendapatan_bersih_kebun;
        $model->pendapatan_bersih_tani_lain = $request->pendapatan_bersih_tani_lain;
        $model->pendapatan_hasil_kemitraan = $request->pendapatan_hasil_kemitraan;
        $model->pendapatan_dari_sewa = $request->pendapatan_dari_sewa;
        $model->pendapatan_jual_bibit = $request->pendapatan_jual_bibit;
        $model->pendapatan_bersih_lain = $request->pendapatan_bersih_lain;
        
        $model->pupuk1 = $request->pupuk1;
        $model->pupuk2 = $request->pupuk2;
        $model->pestisida1 = $request->pestisida1;
        $model->pestisida2 = $request->pestisida2;
        
        $model->nama_pencacah = $request->nama_pencacah;
        $model->tanggal_pencacah = date('Y-m-d', strtotime($request->tanggal_pencacah));
        $model->ttd_pencacah = $request->ttd_pencacah;
        $model->nama_pemeriksa = $request->nama_pemeriksa;
        $model->tanggal_pemeriksa = date('Y-m-d', strtotime($request->tanggal_pemeriksa));
        $model->ttd_pemeriksa = $request->ttd_pemeriksa;
        
        $model->catatan =$request->catatan;
        $model->diisi_di=$request->diisi_di;
        $model->diisi_tanggal= date('Y-m-d', strtotime($request->diisi_tanggal));
        $model->diisi_administratur=$request->diisi_administratur;
        $model->status_dokumen= 2;

        $model->updated_by = Auth::id();

        if($model->save()){
            $rincian_tahunan = [];
            $rincian_semusim = [];
            if($request->has('rincian_tahunan'))
                $rincian_tahunan = $request->rincian_tahunan;
                
            if($request->has('rincian_semusim'))
                $rincian_semusim = $request->rincian_semusim;

            foreach($rincian_tahunan as $key=>$value){
                if($value['kode_tanaman']!=''){
                    $model_rincian = new RincianTahunanTahun;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianTahunanTahun::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }
    
                    $model_rincian->survei_id = $model->id;
                    $model_rincian->kode_tanaman = $value['kode_tanaman'];
                    $model_rincian->luas_sendiri_5 = $value['luas_sendiri_5'];
                    $model_rincian->luas_sendiri_5_10 = $value['luas_sendiri_5_10'];
                    $model_rincian->luas_sendiri_11_25 = $value['luas_sendiri_11_25'];
                    $model_rincian->luas_sendiri_25 = $value['luas_sendiri_25'];
                    $model_rincian->luas_plasma_5 = $value['luas_plasma_5'];
                    $model_rincian->luas_plasma_5_10 = $value['luas_plasma_5_10'];
                    $model_rincian->luas_plasma_11_25 = $value['luas_plasma_11_25'];
                    $model_rincian->luas_plasma_25 = $value['luas_plasma_25'];

                    $model_rincian->sendiri_bentuk_produksi = $value['sendiri_bentuk_produksi'];
                    $model_rincian->sendiri_rata_rendemen = $value['sendiri_rata_rendemen'];
                    $model_rincian->plasma_bentuk_produksi = $value['plasma_bentuk_produksi'];
                    $model_rincian->plasma_rata_rendemen = $value['plasma_rata_rendemen'];
                    $model_rincian->bibit_tanaman = $value['bibit_tanaman'];
                    $model_rincian->pupuk1 = $value['pupuk1'];
                    $model_rincian->pupuk2 = $value['pupuk2'];
                    $model_rincian->pestisida1 = $value['pestisida1'];
                    $model_rincian->pestisida2 = $value['pestisida2'];
                    $model_rincian->bahan_bakar_budidaya = $value['bahan_bakar_budidaya'];
                    $model_rincian->sewa_lahan = $value['sewa_lahan'];
                    $model_rincian->pengeluaran_lainnya = $value['pengeluaran_lainnya'];
                    $model_rincian->biaya_kemitraan = $value['biaya_kemitraan'];

                    if($model_rincian->save()){
                        if (array_key_exists('list_kebun_tahunan_sendiri', $value)) {
                            foreach($value['list_kebun_tahunan_sendiri'] as $key2=>$value2){
                                $rincian_kebun_tahun = new KebunTahunanTahun;
                                if($value2['id']!=0){
                                    $temp_model_kebun = KebunTahunanTahun::find($value2['id']);
                                    if($temp_model_kebun!=null){
                                        $rincian_kebun_tahun = $temp_model_kebun;
                                    }
                                }
    
                                $rincian_kebun_tahun->survei_id = $model->id;
                                $rincian_kebun_tahun->rincian_id = $model_rincian->id;
                                $rincian_kebun_tahun->jenis = 1;
                                $rincian_kebun_tahun->nama_kebun = $value2['nama_kebun'];
                                $rincian_kebun_tahun->kode_prov = $value2['kode_prov'];
                                $rincian_kebun_tahun->kode_kab = $value2['kode_kab'];
                                $rincian_kebun_tahun->kode_kec = $value2['kode_kec'];
                                $rincian_kebun_tahun->kode_desa = $value2['kode_desa'];
                                
                                $rincian_kebun_tahun->real1_tbm = $value2['real1_tbm'];
                                $rincian_kebun_tahun->real1_tsm = $value2['real1_tsm'];
                                $rincian_kebun_tahun->real1_tstm = $value2['real1_tstm'];
                                $rincian_kebun_tahun->real1_ttm = $value2['real1_ttm'];
                                $rincian_kebun_tahun->real1_produksi = $value2['real1_produksi'];
                                $rincian_kebun_tahun->real1_nilai = $value2['real1_nilai'];
                                
                                $rincian_kebun_tahun->real2_tbm = $value2['real2_tbm'];
                                $rincian_kebun_tahun->real2_tsm = $value2['real2_tsm'];
                                $rincian_kebun_tahun->real2_tstm = $value2['real2_tstm'];
                                $rincian_kebun_tahun->real2_ttm = $value2['real2_ttm'];
                                $rincian_kebun_tahun->real2_produksi = $value2['real2_produksi'];
                                $rincian_kebun_tahun->real2_nilai = $value2['real2_nilai'];
                                
                                $rincian_kebun_tahun->real3_tbm = $value2['real3_tbm'];
                                $rincian_kebun_tahun->real3_tsm = $value2['real3_tsm'];
                                $rincian_kebun_tahun->real3_tstm = $value2['real3_tstm'];
                                $rincian_kebun_tahun->real3_ttm = $value2['real3_ttm'];
                                $rincian_kebun_tahun->real3_produksi = $value2['real3_produksi'];
                                $rincian_kebun_tahun->real3_nilai = $value2['real3_nilai'];
                                
                                $rincian_kebun_tahun->real4_tbm = $value2['real4_tbm'];
                                $rincian_kebun_tahun->real4_tsm = $value2['real4_tsm'];
                                $rincian_kebun_tahun->real4_tstm = $value2['real4_tstm'];
                                $rincian_kebun_tahun->real4_ttm = $value2['real4_ttm'];
                                $rincian_kebun_tahun->real4_produksi = $value2['real4_produksi'];
                                $rincian_kebun_tahun->real4_nilai = $value2['real4_nilai'];
                                
                                $rincian_kebun_tahun->target1_tbm = $value2['target1_tbm'];
                                $rincian_kebun_tahun->target1_tsm = $value2['target1_tsm'];
                                $rincian_kebun_tahun->target1_tstm = $value2['target1_tstm'];
                                $rincian_kebun_tahun->target1_ttm = $value2['target1_ttm'];
                                $rincian_kebun_tahun->target1_produksi = $value2['target1_produksi'];
                                $rincian_kebun_tahun->target1_nilai = $value2['target1_nilai'];
                                
                                $rincian_kebun_tahun->target2_tbm = $value2['target2_tbm'];
                                $rincian_kebun_tahun->target2_tsm = $value2['target2_tsm'];
                                $rincian_kebun_tahun->target2_tstm = $value2['target2_tstm'];
                                $rincian_kebun_tahun->target2_ttm = $value2['target2_ttm'];
                                $rincian_kebun_tahun->target2_produksi = $value2['target2_produksi'];
                                $rincian_kebun_tahun->target2_nilai = $value2['target2_nilai'];
                                
                                $rincian_kebun_tahun->target3_tbm = $value2['target3_tbm'];
                                $rincian_kebun_tahun->target3_tsm = $value2['target3_tsm'];
                                $rincian_kebun_tahun->target3_tstm = $value2['target3_tstm'];
                                $rincian_kebun_tahun->target3_ttm = $value2['target3_ttm'];
                                $rincian_kebun_tahun->target3_produksi = $value2['target3_produksi'];
                                $rincian_kebun_tahun->target3_nilai = $value2['target3_nilai'];
                                
                                $rincian_kebun_tahun->target4_tbm = $value2['target4_tbm'];
                                $rincian_kebun_tahun->target4_tsm = $value2['target4_tsm'];
                                $rincian_kebun_tahun->target4_tstm = $value2['target4_tstm'];
                                $rincian_kebun_tahun->target4_ttm = $value2['target4_ttm'];
                                $rincian_kebun_tahun->target4_produksi = $value2['target4_produksi'];
                                $rincian_kebun_tahun->target4_nilai = $value2['target4_nilai'];
                                $rincian_kebun_tahun->save();
                            }
                        }
                        ///////////////
                        if (array_key_exists('list_kebun_tahunan_plasma', $value)) {
                            foreach($value['list_kebun_tahunan_plasma'] as $key2=>$value2){
                                $rincian_kebun_tahun = new KebunTahunanTahun;
                                if($value2['id']!=0){
                                    $temp_model_kebun = KebunTahunanTahun::find($value2['id']);
                                    if($temp_model_kebun!=null){
                                        $rincian_kebun_tahun = $temp_model_kebun;
                                    }
                                }
    
                                $rincian_kebun_tahun->survei_id = $model->id;
                                $rincian_kebun_tahun->rincian_id = $model_rincian->id;
                                $rincian_kebun_tahun->jenis = 2;
                                $rincian_kebun_tahun->nama_kebun = $value2['nama_kebun'];
                                $rincian_kebun_tahun->kode_prov = $value2['kode_prov'];
                                $rincian_kebun_tahun->kode_kab = $value2['kode_kab'];
                                $rincian_kebun_tahun->kode_kec = $value2['kode_kec'];
                                $rincian_kebun_tahun->kode_desa = $value2['kode_desa'];
                                
                                $rincian_kebun_tahun->real1_tbm = $value2['real1_tbm'];
                                $rincian_kebun_tahun->real1_tsm = $value2['real1_tsm'];
                                $rincian_kebun_tahun->real1_tstm = $value2['real1_tstm'];
                                $rincian_kebun_tahun->real1_ttm = $value2['real1_ttm'];
                                $rincian_kebun_tahun->real1_produksi = $value2['real1_produksi'];
                                $rincian_kebun_tahun->real1_nilai = $value2['real1_nilai'];
                                
                                $rincian_kebun_tahun->real2_tbm = $value2['real2_tbm'];
                                $rincian_kebun_tahun->real2_tsm = $value2['real2_tsm'];
                                $rincian_kebun_tahun->real2_tstm = $value2['real2_tstm'];
                                $rincian_kebun_tahun->real2_ttm = $value2['real2_ttm'];
                                $rincian_kebun_tahun->real2_produksi = $value2['real2_produksi'];
                                $rincian_kebun_tahun->real2_nilai = $value2['real2_nilai'];
                                
                                $rincian_kebun_tahun->real3_tbm = $value2['real3_tbm'];
                                $rincian_kebun_tahun->real3_tsm = $value2['real3_tsm'];
                                $rincian_kebun_tahun->real3_tstm = $value2['real3_tstm'];
                                $rincian_kebun_tahun->real3_ttm = $value2['real3_ttm'];
                                $rincian_kebun_tahun->real3_produksi = $value2['real3_produksi'];
                                $rincian_kebun_tahun->real3_nilai = $value2['real3_nilai'];
                                
                                $rincian_kebun_tahun->real4_tbm = $value2['real4_tbm'];
                                $rincian_kebun_tahun->real4_tsm = $value2['real4_tsm'];
                                $rincian_kebun_tahun->real4_tstm = $value2['real4_tstm'];
                                $rincian_kebun_tahun->real4_ttm = $value2['real4_ttm'];
                                $rincian_kebun_tahun->real4_produksi = $value2['real4_produksi'];
                                $rincian_kebun_tahun->real4_nilai = $value2['real4_nilai'];
                                
                                $rincian_kebun_tahun->target1_tbm = $value2['target1_tbm'];
                                $rincian_kebun_tahun->target1_tsm = $value2['target1_tsm'];
                                $rincian_kebun_tahun->target1_tstm = $value2['target1_tstm'];
                                $rincian_kebun_tahun->target1_ttm = $value2['target1_ttm'];
                                $rincian_kebun_tahun->target1_produksi = $value2['target1_produksi'];
                                $rincian_kebun_tahun->target1_nilai = $value2['target1_nilai'];
                                
                                $rincian_kebun_tahun->target2_tbm = $value2['target2_tbm'];
                                $rincian_kebun_tahun->target2_tsm = $value2['target2_tsm'];
                                $rincian_kebun_tahun->target2_tstm = $value2['target2_tstm'];
                                $rincian_kebun_tahun->target2_ttm = $value2['target2_ttm'];
                                $rincian_kebun_tahun->target2_produksi = $value2['target2_produksi'];
                                $rincian_kebun_tahun->target2_nilai = $value2['target2_nilai'];
                                
                                $rincian_kebun_tahun->target3_tbm = $value2['target3_tbm'];
                                $rincian_kebun_tahun->target3_tsm = $value2['target3_tsm'];
                                $rincian_kebun_tahun->target3_tstm = $value2['target3_tstm'];
                                $rincian_kebun_tahun->target3_ttm = $value2['target3_ttm'];
                                $rincian_kebun_tahun->target3_produksi = $value2['target3_produksi'];
                                $rincian_kebun_tahun->target3_nilai = $value2['target3_nilai'];
                                
                                $rincian_kebun_tahun->target4_tbm = $value2['target4_tbm'];
                                $rincian_kebun_tahun->target4_tsm = $value2['target4_tsm'];
                                $rincian_kebun_tahun->target4_tstm = $value2['target4_tstm'];
                                $rincian_kebun_tahun->target4_ttm = $value2['target4_ttm'];
                                $rincian_kebun_tahun->target4_produksi = $value2['target4_produksi'];
                                $rincian_kebun_tahun->target4_nilai = $value2['target4_nilai'];
                                $rincian_kebun_tahun->save();
                            }
                        }
                    }
                } 
            }

            ////////////////////
            
            foreach($rincian_semusim as $key=>$value){
                if($value['kode_tanaman']!=''){
                    $model_rincian = new RincianTahunanSemusim;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianTahunanSemusim::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }
    
                    $model_rincian->survei_id = $model->id;
                    $model_rincian->kode_tanaman = $value['kode_tanaman'];

                    $model_rincian->sendiri_bentuk_produksi = $value['sendiri_bentuk_produksi'];
                    $model_rincian->sendiri_rata_rendemen = $value['sendiri_rata_rendemen'];
                    $model_rincian->plasma_bentuk_produksi = $value['plasma_bentuk_produksi'];
                    $model_rincian->plasma_rata_rendemen = $value['plasma_rata_rendemen'];
                    $model_rincian->bibit_tanaman = $value['bibit_tanaman'];
                    $model_rincian->pupuk1 = $value['pupuk1'];
                    $model_rincian->pupuk2 = $value['pupuk2'];
                    $model_rincian->pestisida1 = $value['pestisida1'];
                    $model_rincian->pestisida2 = $value['pestisida2'];
                    $model_rincian->bahan_bakar_budidaya = $value['bahan_bakar_budidaya'];
                    $model_rincian->sewa_lahan = $value['sewa_lahan'];
                    $model_rincian->sewa_alat = $value['sewa_alat'];
                    $model_rincian->pengeluaran_lainnya = $value['pengeluaran_lainnya'];
                    $model_rincian->biaya_kemitraan = $value['biaya_kemitraan'];

                    if($model_rincian->save()){
                        if (array_key_exists('list_kebun_semusim_sendiri', $value)) {
                            foreach($value['list_kebun_semusim_sendiri'] as $key2=>$value2){
                                $rincian_kebun_semusim = new KebunTahunanSemusim;
                                if($value2['id']!=0){
                                    $temp_model_kebun = KebunTahunanSemusim::find($value2['id']);
                                    if($temp_model_kebun!=null){
                                        $rincian_kebun_semusim = $temp_model_kebun;
                                    }
                                }
    
                                $rincian_kebun_semusim->survei_id = $model->id;
                                $rincian_kebun_semusim->rincian_id = $model_rincian->id;
                                $rincian_kebun_semusim->jenis = 1;
                                $rincian_kebun_semusim->nama_kebun = $value2['nama_kebun'];
                                $rincian_kebun_semusim->kode_prov = $value2['kode_prov'];
                                $rincian_kebun_semusim->kode_kab = $value2['kode_kab'];
                                $rincian_kebun_semusim->kode_kec = $value2['kode_kec'];
                                $rincian_kebun_semusim->kode_desa = $value2['kode_desa'];
                                
                                $rincian_kebun_semusim->real1_luas_tanam = $value2['real1_luas_tanam'];
                                $rincian_kebun_semusim->real1_luas_panen = $value2['real1_luas_panen'];
                                $rincian_kebun_semusim->real1_produksi = $value2['real1_produksi'];
                                $rincian_kebun_semusim->real1_nilai = $value2['real1_nilai'];
                                
                                $rincian_kebun_semusim->real2_luas_tanam = $value2['real2_luas_tanam'];
                                $rincian_kebun_semusim->real2_luas_panen = $value2['real2_luas_panen'];
                                $rincian_kebun_semusim->real2_produksi = $value2['real2_produksi'];
                                $rincian_kebun_semusim->real2_nilai = $value2['real2_nilai'];
                                
                                $rincian_kebun_semusim->real3_luas_tanam = $value2['real3_luas_tanam'];
                                $rincian_kebun_semusim->real3_luas_panen = $value2['real3_luas_panen'];
                                $rincian_kebun_semusim->real3_produksi = $value2['real3_produksi'];
                                $rincian_kebun_semusim->real3_nilai = $value2['real3_nilai'];
                                
                                $rincian_kebun_semusim->real4_luas_tanam = $value2['real4_luas_tanam'];
                                $rincian_kebun_semusim->real4_luas_panen = $value2['real4_luas_panen'];
                                $rincian_kebun_semusim->real4_produksi = $value2['real4_produksi'];
                                $rincian_kebun_semusim->real4_nilai = $value2['real4_nilai'];
    
                                $rincian_kebun_semusim->target1_luas_tanam = $value2['target1_luas_tanam'];
                                $rincian_kebun_semusim->target1_luas_panen = $value2['target1_luas_panen'];
                                $rincian_kebun_semusim->target1_produksi = $value2['target1_produksi'];
                                $rincian_kebun_semusim->target1_nilai = $value2['target1_nilai'];
                                
                                $rincian_kebun_semusim->target2_luas_tanam = $value2['target2_luas_tanam'];
                                $rincian_kebun_semusim->target2_luas_panen = $value2['target2_luas_panen'];
                                $rincian_kebun_semusim->target2_produksi = $value2['target2_produksi'];
                                $rincian_kebun_semusim->target2_nilai = $value2['target2_nilai'];
                                
                                $rincian_kebun_semusim->target3_luas_tanam = $value2['target3_luas_tanam'];
                                $rincian_kebun_semusim->target3_luas_panen = $value2['target3_luas_panen'];
                                $rincian_kebun_semusim->target3_produksi = $value2['target3_produksi'];
                                $rincian_kebun_semusim->target3_nilai = $value2['target3_nilai'];
                                
                                $rincian_kebun_semusim->target4_luas_tanam = $value2['target4_luas_tanam'];
                                $rincian_kebun_semusim->target4_luas_panen = $value2['target4_luas_panen'];
                                $rincian_kebun_semusim->target4_produksi = $value2['target4_produksi'];
                                $rincian_kebun_semusim->target4_nilai = $value2['target4_nilai'];
                                $rincian_kebun_semusim->save();
                            }
                        }
                        ///////////////
                        
                        if (array_key_exists('list_kebun_semusim_plasma', $value)) {
                            foreach($value['list_kebun_semusim_plasma'] as $key2=>$value2){
                                $rincian_kebun_semusim = new KebunTahunanSemusim;
                                if($value2['id']!=0){
                                    $temp_model_kebun = KebunTahunanSemusim::find($value2['id']);
                                    if($temp_model_kebun!=null){
                                        $rincian_kebun_semusim = $temp_model_kebun;
                                    }
                                }
    
                                $rincian_kebun_semusim->survei_id = $model->id;
                                $rincian_kebun_semusim->rincian_id = $model_rincian->id;
                                $rincian_kebun_semusim->jenis = 2;
                                $rincian_kebun_semusim->nama_kebun = $value2['nama_kebun'];
                                $rincian_kebun_semusim->kode_prov = $value2['kode_prov'];
                                $rincian_kebun_semusim->kode_kab = $value2['kode_kab'];
                                $rincian_kebun_semusim->kode_kec = $value2['kode_kec'];
                                $rincian_kebun_semusim->kode_desa = $value2['kode_desa'];
                                
                                $rincian_kebun_semusim->real1_luas_tanam = $value2['real1_luas_tanam'];
                                $rincian_kebun_semusim->real1_luas_panen = $value2['real1_luas_panen'];
                                $rincian_kebun_semusim->real1_produksi = $value2['real1_produksi'];
                                $rincian_kebun_semusim->real1_nilai = $value2['real1_nilai'];
                                
                                $rincian_kebun_semusim->real2_luas_tanam = $value2['real2_luas_tanam'];
                                $rincian_kebun_semusim->real2_luas_panen = $value2['real2_luas_panen'];
                                $rincian_kebun_semusim->real2_produksi = $value2['real2_produksi'];
                                $rincian_kebun_semusim->real2_nilai = $value2['real2_nilai'];
                                
                                $rincian_kebun_semusim->real3_luas_tanam = $value2['real3_luas_tanam'];
                                $rincian_kebun_semusim->real3_luas_panen = $value2['real3_luas_panen'];
                                $rincian_kebun_semusim->real3_produksi = $value2['real3_produksi'];
                                $rincian_kebun_semusim->real3_nilai = $value2['real3_nilai'];
                                
                                $rincian_kebun_semusim->real4_luas_tanam = $value2['real4_luas_tanam'];
                                $rincian_kebun_semusim->real4_luas_panen = $value2['real4_luas_panen'];
                                $rincian_kebun_semusim->real4_produksi = $value2['real4_produksi'];
                                $rincian_kebun_semusim->real4_nilai = $value2['real4_nilai'];
    
                                $rincian_kebun_semusim->target1_luas_tanam = $value2['target1_luas_tanam'];
                                $rincian_kebun_semusim->target1_luas_panen = $value2['target1_luas_panen'];
                                $rincian_kebun_semusim->target1_produksi = $value2['target1_produksi'];
                                $rincian_kebun_semusim->target1_nilai = $value2['target1_nilai'];
                                
                                $rincian_kebun_semusim->target2_luas_tanam = $value2['target2_luas_tanam'];
                                $rincian_kebun_semusim->target2_luas_panen = $value2['target2_luas_panen'];
                                $rincian_kebun_semusim->target2_produksi = $value2['target2_produksi'];
                                $rincian_kebun_semusim->target2_nilai = $value2['target2_nilai'];
                                
                                $rincian_kebun_semusim->target3_luas_tanam = $value2['target3_luas_tanam'];
                                $rincian_kebun_semusim->target3_luas_panen = $value2['target3_luas_panen'];
                                $rincian_kebun_semusim->target3_produksi = $value2['target3_produksi'];
                                $rincian_kebun_semusim->target3_nilai = $value2['target3_nilai'];
                                
                                $rincian_kebun_semusim->target4_luas_tanam = $value2['target4_luas_tanam'];
                                $rincian_kebun_semusim->target4_luas_panen = $value2['target4_luas_panen'];
                                $rincian_kebun_semusim->target4_produksi = $value2['target4_produksi'];
                                $rincian_kebun_semusim->target4_nilai = $value2['target4_nilai'];
                                $rincian_kebun_semusim->save();
                            }
                        }
                    }
                } 
            }
        }
    }

    public function tahunan_send_store(Request $request, $id){
        $model = SurveiTahunan::find($id);
        $model->user_id = Auth::user()->company_id;
        
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

        $model->status_pemodalan = $request->status_pemodalan;
        $model->badan_hukum = $request->badan_hukum;
        $model->apakah_pelaksana_kemitraan = $request->apakah_pelaksana_kemitraan;
        $model->punya_unit_pengolahan = $request->punya_unit_pengolahan;
        $model->kondisi_perusahaan = $request->kondisi_perusahaan;
        $model->masa_berlaku_hgu_dari = $request->masa_berlaku_hgu_dari;
        $model->masa_berlaku_hgu_sampai = $request->masa_berlaku_hgu_sampai;
        $model->jenis_kemitraan = $request->jenis_kemitraan;
        $model->jenis_kemitraan_lainnya = $request->jenis_kemitraan_lainnya;

        $model->bpt_admin_laki = $request->bpt_admin_laki;
        $model->bpt_kebun_laki = $request->bpt_kebun_laki;
        $model->upt_admin_laki = $request->upt_admin_laki;
        $model->upt_kebun_laki = $request->upt_kebun_laki;
        $model->bptt_admin_laki = $request->bptt_admin_laki;
        $model->bptt_kebun_laki = $request->bptt_kebun_laki;
        $model->uptt_admin_laki = $request->uptt_admin_laki;
        $model->uptt_kebun_laki = $request->uptt_kebun_laki;
        
        $model->bpt_admin_perempuan = $request->bpt_admin_perempuan;
        $model->bpt_kebun_perempuan = $request->bpt_kebun_perempuan;
        $model->upt_admin_perempuan = $request->upt_admin_perempuan;
        $model->upt_kebun_perempuan = $request->upt_kebun_perempuan;
        $model->bptt_admin_perempuan = $request->bptt_admin_perempuan;
        $model->bptt_kebun_perempuan = $request->bptt_kebun_perempuan;
        $model->uptt_admin_perempuan = $request->uptt_admin_perempuan;
        $model->uptt_kebun_perempuan = $request->uptt_kebun_perempuan;
        
        $model->pendapatan_bersih_kebun = $request->pendapatan_bersih_kebun;
        $model->pendapatan_bersih_tani_lain = $request->pendapatan_bersih_tani_lain;
        $model->pendapatan_hasil_kemitraan = $request->pendapatan_hasil_kemitraan;
        $model->pendapatan_dari_sewa = $request->pendapatan_dari_sewa;
        $model->pendapatan_jual_bibit = $request->pendapatan_jual_bibit;
        $model->pendapatan_bersih_lain = $request->pendapatan_bersih_lain;
        
        $model->pupuk1 = $request->pupuk1;
        $model->pupuk2 = $request->pupuk2;
        $model->pestisida1 = $request->pestisida1;
        $model->pestisida2 = $request->pestisida2;
        
        $model->nama_pencacah = $request->nama_pencacah;
        $model->tanggal_pencacah = date('Y-m-d', strtotime($request->tanggal_pencacah));
        $model->ttd_pencacah = $request->ttd_pencacah;
        $model->nama_pemeriksa = $request->nama_pemeriksa;
        $model->tanggal_pemeriksa = date('Y-m-d', strtotime($request->tanggal_pemeriksa));
        $model->ttd_pemeriksa = $request->ttd_pemeriksa;
        
        $model->catatan =$request->catatan;
        $model->diisi_di=$request->diisi_di;
        $model->diisi_tanggal= date('Y-m-d', strtotime($request->diisi_tanggal));
        $model->diisi_administratur=$request->diisi_administratur;
        $model->status_dokumen= 3;

        $model->updated_by = Auth::id();

        if($model->save()){
            $rincian_tahunan = [];
            $rincian_semusim = [];
            if($request->has('rincian_tahunan'))
                $rincian_tahunan = $request->rincian_tahunan;
                
            if($request->has('rincian_semusim'))
                $rincian_semusim = $request->rincian_semusim;

            foreach($rincian_tahunan as $key=>$value){
                if($value['kode_tanaman']!=''){
                    $model_rincian = new RincianTahunanTahun;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianTahunanTahun::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }
    
                    $model_rincian->survei_id = $model->id;
                    $model_rincian->kode_tanaman = $value['kode_tanaman'];
                    $model_rincian->luas_sendiri_5 = $value['luas_sendiri_5'];
                    $model_rincian->luas_sendiri_5_10 = $value['luas_sendiri_5_10'];
                    $model_rincian->luas_sendiri_11_25 = $value['luas_sendiri_11_25'];
                    $model_rincian->luas_sendiri_25 = $value['luas_sendiri_25'];
                    $model_rincian->luas_plasma_5 = $value['luas_plasma_5'];
                    $model_rincian->luas_plasma_5_10 = $value['luas_plasma_5_10'];
                    $model_rincian->luas_plasma_11_25 = $value['luas_plasma_11_25'];
                    $model_rincian->luas_plasma_25 = $value['luas_plasma_25'];

                    $model_rincian->sendiri_bentuk_produksi = $value['sendiri_bentuk_produksi'];
                    $model_rincian->sendiri_rata_rendemen = $value['sendiri_rata_rendemen'];
                    $model_rincian->plasma_bentuk_produksi = $value['plasma_bentuk_produksi'];
                    $model_rincian->plasma_rata_rendemen = $value['plasma_rata_rendemen'];
                    $model_rincian->bibit_tanaman = $value['bibit_tanaman'];
                    $model_rincian->pupuk1 = $value['pupuk1'];
                    $model_rincian->pupuk2 = $value['pupuk2'];
                    $model_rincian->pestisida1 = $value['pestisida1'];
                    $model_rincian->pestisida2 = $value['pestisida2'];
                    $model_rincian->bahan_bakar_budidaya = $value['bahan_bakar_budidaya'];
                    $model_rincian->sewa_lahan = $value['sewa_lahan'];
                    $model_rincian->pengeluaran_lainnya = $value['pengeluaran_lainnya'];
                    $model_rincian->biaya_kemitraan = $value['biaya_kemitraan'];

                    if($model_rincian->save()){
                        if (array_key_exists('list_kebun_tahunan_sendiri', $value)) {
                            foreach($value['list_kebun_tahunan_sendiri'] as $key2=>$value2){
                                $rincian_kebun_tahun = new KebunTahunanTahun;
                                if($value2['id']!=0){
                                    $temp_model_kebun = KebunTahunanTahun::find($value2['id']);
                                    if($temp_model_kebun!=null){
                                        $rincian_kebun_tahun = $temp_model_kebun;
                                    }
                                }
    
                                $rincian_kebun_tahun->survei_id = $model->id;
                                $rincian_kebun_tahun->rincian_id = $model_rincian->id;
                                $rincian_kebun_tahun->jenis = 1;
                                $rincian_kebun_tahun->nama_kebun = $value2['nama_kebun'];
                                $rincian_kebun_tahun->kode_prov = $value2['kode_prov'];
                                $rincian_kebun_tahun->kode_kab = $value2['kode_kab'];
                                $rincian_kebun_tahun->kode_kec = $value2['kode_kec'];
                                $rincian_kebun_tahun->kode_desa = $value2['kode_desa'];
                                
                                $rincian_kebun_tahun->real1_tbm = $value2['real1_tbm'];
                                $rincian_kebun_tahun->real1_tsm = $value2['real1_tsm'];
                                $rincian_kebun_tahun->real1_tstm = $value2['real1_tstm'];
                                $rincian_kebun_tahun->real1_ttm = $value2['real1_ttm'];
                                $rincian_kebun_tahun->real1_produksi = $value2['real1_produksi'];
                                $rincian_kebun_tahun->real1_nilai = $value2['real1_nilai'];
                                
                                $rincian_kebun_tahun->real2_tbm = $value2['real2_tbm'];
                                $rincian_kebun_tahun->real2_tsm = $value2['real2_tsm'];
                                $rincian_kebun_tahun->real2_tstm = $value2['real2_tstm'];
                                $rincian_kebun_tahun->real2_ttm = $value2['real2_ttm'];
                                $rincian_kebun_tahun->real2_produksi = $value2['real2_produksi'];
                                $rincian_kebun_tahun->real2_nilai = $value2['real2_nilai'];
                                
                                $rincian_kebun_tahun->real3_tbm = $value2['real3_tbm'];
                                $rincian_kebun_tahun->real3_tsm = $value2['real3_tsm'];
                                $rincian_kebun_tahun->real3_tstm = $value2['real3_tstm'];
                                $rincian_kebun_tahun->real3_ttm = $value2['real3_ttm'];
                                $rincian_kebun_tahun->real3_produksi = $value2['real3_produksi'];
                                $rincian_kebun_tahun->real3_nilai = $value2['real3_nilai'];
                                
                                $rincian_kebun_tahun->real4_tbm = $value2['real4_tbm'];
                                $rincian_kebun_tahun->real4_tsm = $value2['real4_tsm'];
                                $rincian_kebun_tahun->real4_tstm = $value2['real4_tstm'];
                                $rincian_kebun_tahun->real4_ttm = $value2['real4_ttm'];
                                $rincian_kebun_tahun->real4_produksi = $value2['real4_produksi'];
                                $rincian_kebun_tahun->real4_nilai = $value2['real4_nilai'];
                                
                                $rincian_kebun_tahun->target1_tbm = $value2['target1_tbm'];
                                $rincian_kebun_tahun->target1_tsm = $value2['target1_tsm'];
                                $rincian_kebun_tahun->target1_tstm = $value2['target1_tstm'];
                                $rincian_kebun_tahun->target1_ttm = $value2['target1_ttm'];
                                $rincian_kebun_tahun->target1_produksi = $value2['target1_produksi'];
                                $rincian_kebun_tahun->target1_nilai = $value2['target1_nilai'];
                                
                                $rincian_kebun_tahun->target2_tbm = $value2['target2_tbm'];
                                $rincian_kebun_tahun->target2_tsm = $value2['target2_tsm'];
                                $rincian_kebun_tahun->target2_tstm = $value2['target2_tstm'];
                                $rincian_kebun_tahun->target2_ttm = $value2['target2_ttm'];
                                $rincian_kebun_tahun->target2_produksi = $value2['target2_produksi'];
                                $rincian_kebun_tahun->target2_nilai = $value2['target2_nilai'];
                                
                                $rincian_kebun_tahun->target3_tbm = $value2['target3_tbm'];
                                $rincian_kebun_tahun->target3_tsm = $value2['target3_tsm'];
                                $rincian_kebun_tahun->target3_tstm = $value2['target3_tstm'];
                                $rincian_kebun_tahun->target3_ttm = $value2['target3_ttm'];
                                $rincian_kebun_tahun->target3_produksi = $value2['target3_produksi'];
                                $rincian_kebun_tahun->target3_nilai = $value2['target3_nilai'];
                                
                                $rincian_kebun_tahun->target4_tbm = $value2['target4_tbm'];
                                $rincian_kebun_tahun->target4_tsm = $value2['target4_tsm'];
                                $rincian_kebun_tahun->target4_tstm = $value2['target4_tstm'];
                                $rincian_kebun_tahun->target4_ttm = $value2['target4_ttm'];
                                $rincian_kebun_tahun->target4_produksi = $value2['target4_produksi'];
                                $rincian_kebun_tahun->target4_nilai = $value2['target4_nilai'];
                                $rincian_kebun_tahun->save();
                            }
                        }
                        ///////////////
                        if (array_key_exists('list_kebun_tahunan_plasma', $value)) {
                            foreach($value['list_kebun_tahunan_plasma'] as $key2=>$value2){
                                $rincian_kebun_tahun = new KebunTahunanTahun;
                                if($value2['id']!=0){
                                    $temp_model_kebun = KebunTahunanTahun::find($value2['id']);
                                    if($temp_model_kebun!=null){
                                        $rincian_kebun_tahun = $temp_model_kebun;
                                    }
                                }
    
                                $rincian_kebun_tahun->survei_id = $model->id;
                                $rincian_kebun_tahun->rincian_id = $model_rincian->id;
                                $rincian_kebun_tahun->jenis = 2;
                                $rincian_kebun_tahun->nama_kebun = $value2['nama_kebun'];
                                $rincian_kebun_tahun->kode_prov = $value2['kode_prov'];
                                $rincian_kebun_tahun->kode_kab = $value2['kode_kab'];
                                $rincian_kebun_tahun->kode_kec = $value2['kode_kec'];
                                $rincian_kebun_tahun->kode_desa = $value2['kode_desa'];
                                
                                $rincian_kebun_tahun->real1_tbm = $value2['real1_tbm'];
                                $rincian_kebun_tahun->real1_tsm = $value2['real1_tsm'];
                                $rincian_kebun_tahun->real1_tstm = $value2['real1_tstm'];
                                $rincian_kebun_tahun->real1_ttm = $value2['real1_ttm'];
                                $rincian_kebun_tahun->real1_produksi = $value2['real1_produksi'];
                                $rincian_kebun_tahun->real1_nilai = $value2['real1_nilai'];
                                
                                $rincian_kebun_tahun->real2_tbm = $value2['real2_tbm'];
                                $rincian_kebun_tahun->real2_tsm = $value2['real2_tsm'];
                                $rincian_kebun_tahun->real2_tstm = $value2['real2_tstm'];
                                $rincian_kebun_tahun->real2_ttm = $value2['real2_ttm'];
                                $rincian_kebun_tahun->real2_produksi = $value2['real2_produksi'];
                                $rincian_kebun_tahun->real2_nilai = $value2['real2_nilai'];
                                
                                $rincian_kebun_tahun->real3_tbm = $value2['real3_tbm'];
                                $rincian_kebun_tahun->real3_tsm = $value2['real3_tsm'];
                                $rincian_kebun_tahun->real3_tstm = $value2['real3_tstm'];
                                $rincian_kebun_tahun->real3_ttm = $value2['real3_ttm'];
                                $rincian_kebun_tahun->real3_produksi = $value2['real3_produksi'];
                                $rincian_kebun_tahun->real3_nilai = $value2['real3_nilai'];
                                
                                $rincian_kebun_tahun->real4_tbm = $value2['real4_tbm'];
                                $rincian_kebun_tahun->real4_tsm = $value2['real4_tsm'];
                                $rincian_kebun_tahun->real4_tstm = $value2['real4_tstm'];
                                $rincian_kebun_tahun->real4_ttm = $value2['real4_ttm'];
                                $rincian_kebun_tahun->real4_produksi = $value2['real4_produksi'];
                                $rincian_kebun_tahun->real4_nilai = $value2['real4_nilai'];
                                
                                $rincian_kebun_tahun->target1_tbm = $value2['target1_tbm'];
                                $rincian_kebun_tahun->target1_tsm = $value2['target1_tsm'];
                                $rincian_kebun_tahun->target1_tstm = $value2['target1_tstm'];
                                $rincian_kebun_tahun->target1_ttm = $value2['target1_ttm'];
                                $rincian_kebun_tahun->target1_produksi = $value2['target1_produksi'];
                                $rincian_kebun_tahun->target1_nilai = $value2['target1_nilai'];
                                
                                $rincian_kebun_tahun->target2_tbm = $value2['target2_tbm'];
                                $rincian_kebun_tahun->target2_tsm = $value2['target2_tsm'];
                                $rincian_kebun_tahun->target2_tstm = $value2['target2_tstm'];
                                $rincian_kebun_tahun->target2_ttm = $value2['target2_ttm'];
                                $rincian_kebun_tahun->target2_produksi = $value2['target2_produksi'];
                                $rincian_kebun_tahun->target2_nilai = $value2['target2_nilai'];
                                
                                $rincian_kebun_tahun->target3_tbm = $value2['target3_tbm'];
                                $rincian_kebun_tahun->target3_tsm = $value2['target3_tsm'];
                                $rincian_kebun_tahun->target3_tstm = $value2['target3_tstm'];
                                $rincian_kebun_tahun->target3_ttm = $value2['target3_ttm'];
                                $rincian_kebun_tahun->target3_produksi = $value2['target3_produksi'];
                                $rincian_kebun_tahun->target3_nilai = $value2['target3_nilai'];
                                
                                $rincian_kebun_tahun->target4_tbm = $value2['target4_tbm'];
                                $rincian_kebun_tahun->target4_tsm = $value2['target4_tsm'];
                                $rincian_kebun_tahun->target4_tstm = $value2['target4_tstm'];
                                $rincian_kebun_tahun->target4_ttm = $value2['target4_ttm'];
                                $rincian_kebun_tahun->target4_produksi = $value2['target4_produksi'];
                                $rincian_kebun_tahun->target4_nilai = $value2['target4_nilai'];
                                $rincian_kebun_tahun->save();
                            }
                        }
                    }
                } 
            }

            ////////////////////
            
            foreach($rincian_semusim as $key=>$value){
                if($value['kode_tanaman']!=''){
                    $model_rincian = new RincianTahunanSemusim;
        
                    if($value['id']!=0){
                        $temp_model_rincian = RincianTahunanSemusim::find($value['id']);
                        if($temp_model_rincian!=null){
                            $model_rincian = $temp_model_rincian;
                        }
                    }
    
                    $model_rincian->survei_id = $model->id;
                    $model_rincian->kode_tanaman = $value['kode_tanaman'];

                    $model_rincian->sendiri_bentuk_produksi = $value['sendiri_bentuk_produksi'];
                    $model_rincian->sendiri_rata_rendemen = $value['sendiri_rata_rendemen'];
                    $model_rincian->plasma_bentuk_produksi = $value['plasma_bentuk_produksi'];
                    $model_rincian->plasma_rata_rendemen = $value['plasma_rata_rendemen'];
                    $model_rincian->bibit_tanaman = $value['bibit_tanaman'];
                    $model_rincian->pupuk1 = $value['pupuk1'];
                    $model_rincian->pupuk2 = $value['pupuk2'];
                    $model_rincian->pestisida1 = $value['pestisida1'];
                    $model_rincian->pestisida2 = $value['pestisida2'];
                    $model_rincian->bahan_bakar_budidaya = $value['bahan_bakar_budidaya'];
                    $model_rincian->sewa_lahan = $value['sewa_lahan'];
                    $model_rincian->sewa_alat = $value['sewa_alat'];
                    $model_rincian->pengeluaran_lainnya = $value['pengeluaran_lainnya'];
                    $model_rincian->biaya_kemitraan = $value['biaya_kemitraan'];

                    if($model_rincian->save()){
                        if (array_key_exists('list_kebun_semusim_sendiri', $value)) {
                            foreach($value['list_kebun_semusim_sendiri'] as $key2=>$value2){
                                $rincian_kebun_semusim = new KebunTahunanSemusim;
                                if($value2['id']!=0){
                                    $temp_model_kebun = KebunTahunanSemusim::find($value2['id']);
                                    if($temp_model_kebun!=null){
                                        $rincian_kebun_semusim = $temp_model_kebun;
                                    }
                                }
    
                                $rincian_kebun_semusim->survei_id = $model->id;
                                $rincian_kebun_semusim->rincian_id = $model_rincian->id;
                                $rincian_kebun_semusim->jenis = 1;
                                $rincian_kebun_semusim->nama_kebun = $value2['nama_kebun'];
                                $rincian_kebun_semusim->kode_prov = $value2['kode_prov'];
                                $rincian_kebun_semusim->kode_kab = $value2['kode_kab'];
                                $rincian_kebun_semusim->kode_kec = $value2['kode_kec'];
                                $rincian_kebun_semusim->kode_desa = $value2['kode_desa'];
                                
                                $rincian_kebun_semusim->real1_luas_tanam = $value2['real1_luas_tanam'];
                                $rincian_kebun_semusim->real1_luas_panen = $value2['real1_luas_panen'];
                                $rincian_kebun_semusim->real1_produksi = $value2['real1_produksi'];
                                $rincian_kebun_semusim->real1_nilai = $value2['real1_nilai'];
                                
                                $rincian_kebun_semusim->real2_luas_tanam = $value2['real2_luas_tanam'];
                                $rincian_kebun_semusim->real2_luas_panen = $value2['real2_luas_panen'];
                                $rincian_kebun_semusim->real2_produksi = $value2['real2_produksi'];
                                $rincian_kebun_semusim->real2_nilai = $value2['real2_nilai'];
                                
                                $rincian_kebun_semusim->real3_luas_tanam = $value2['real3_luas_tanam'];
                                $rincian_kebun_semusim->real3_luas_panen = $value2['real3_luas_panen'];
                                $rincian_kebun_semusim->real3_produksi = $value2['real3_produksi'];
                                $rincian_kebun_semusim->real3_nilai = $value2['real3_nilai'];
                                
                                $rincian_kebun_semusim->real4_luas_tanam = $value2['real4_luas_tanam'];
                                $rincian_kebun_semusim->real4_luas_panen = $value2['real4_luas_panen'];
                                $rincian_kebun_semusim->real4_produksi = $value2['real4_produksi'];
                                $rincian_kebun_semusim->real4_nilai = $value2['real4_nilai'];
    
                                $rincian_kebun_semusim->target1_luas_tanam = $value2['target1_luas_tanam'];
                                $rincian_kebun_semusim->target1_luas_panen = $value2['target1_luas_panen'];
                                $rincian_kebun_semusim->target1_produksi = $value2['target1_produksi'];
                                $rincian_kebun_semusim->target1_nilai = $value2['target1_nilai'];
                                
                                $rincian_kebun_semusim->target2_luas_tanam = $value2['target2_luas_tanam'];
                                $rincian_kebun_semusim->target2_luas_panen = $value2['target2_luas_panen'];
                                $rincian_kebun_semusim->target2_produksi = $value2['target2_produksi'];
                                $rincian_kebun_semusim->target2_nilai = $value2['target2_nilai'];
                                
                                $rincian_kebun_semusim->target3_luas_tanam = $value2['target3_luas_tanam'];
                                $rincian_kebun_semusim->target3_luas_panen = $value2['target3_luas_panen'];
                                $rincian_kebun_semusim->target3_produksi = $value2['target3_produksi'];
                                $rincian_kebun_semusim->target3_nilai = $value2['target3_nilai'];
                                
                                $rincian_kebun_semusim->target4_luas_tanam = $value2['target4_luas_tanam'];
                                $rincian_kebun_semusim->target4_luas_panen = $value2['target4_luas_panen'];
                                $rincian_kebun_semusim->target4_produksi = $value2['target4_produksi'];
                                $rincian_kebun_semusim->target4_nilai = $value2['target4_nilai'];
                                $rincian_kebun_semusim->save();
                            }
                        }
                        ///////////////
                        
                        if (array_key_exists('list_kebun_semusim_plasma', $value)) {
                            foreach($value['list_kebun_semusim_plasma'] as $key2=>$value2){
                                $rincian_kebun_semusim = new KebunTahunanSemusim;
                                if($value2['id']!=0){
                                    $temp_model_kebun = KebunTahunanSemusim::find($value2['id']);
                                    if($temp_model_kebun!=null){
                                        $rincian_kebun_semusim = $temp_model_kebun;
                                    }
                                }
    
                                $rincian_kebun_semusim->survei_id = $model->id;
                                $rincian_kebun_semusim->rincian_id = $model_rincian->id;
                                $rincian_kebun_semusim->jenis = 2;
                                $rincian_kebun_semusim->nama_kebun = $value2['nama_kebun'];
                                $rincian_kebun_semusim->kode_prov = $value2['kode_prov'];
                                $rincian_kebun_semusim->kode_kab = $value2['kode_kab'];
                                $rincian_kebun_semusim->kode_kec = $value2['kode_kec'];
                                $rincian_kebun_semusim->kode_desa = $value2['kode_desa'];
                                
                                $rincian_kebun_semusim->real1_luas_tanam = $value2['real1_luas_tanam'];
                                $rincian_kebun_semusim->real1_luas_panen = $value2['real1_luas_panen'];
                                $rincian_kebun_semusim->real1_produksi = $value2['real1_produksi'];
                                $rincian_kebun_semusim->real1_nilai = $value2['real1_nilai'];
                                
                                $rincian_kebun_semusim->real2_luas_tanam = $value2['real2_luas_tanam'];
                                $rincian_kebun_semusim->real2_luas_panen = $value2['real2_luas_panen'];
                                $rincian_kebun_semusim->real2_produksi = $value2['real2_produksi'];
                                $rincian_kebun_semusim->real2_nilai = $value2['real2_nilai'];
                                
                                $rincian_kebun_semusim->real3_luas_tanam = $value2['real3_luas_tanam'];
                                $rincian_kebun_semusim->real3_luas_panen = $value2['real3_luas_panen'];
                                $rincian_kebun_semusim->real3_produksi = $value2['real3_produksi'];
                                $rincian_kebun_semusim->real3_nilai = $value2['real3_nilai'];
                                
                                $rincian_kebun_semusim->real4_luas_tanam = $value2['real4_luas_tanam'];
                                $rincian_kebun_semusim->real4_luas_panen = $value2['real4_luas_panen'];
                                $rincian_kebun_semusim->real4_produksi = $value2['real4_produksi'];
                                $rincian_kebun_semusim->real4_nilai = $value2['real4_nilai'];
    
                                $rincian_kebun_semusim->target1_luas_tanam = $value2['target1_luas_tanam'];
                                $rincian_kebun_semusim->target1_luas_panen = $value2['target1_luas_panen'];
                                $rincian_kebun_semusim->target1_produksi = $value2['target1_produksi'];
                                $rincian_kebun_semusim->target1_nilai = $value2['target1_nilai'];
                                
                                $rincian_kebun_semusim->target2_luas_tanam = $value2['target2_luas_tanam'];
                                $rincian_kebun_semusim->target2_luas_panen = $value2['target2_luas_panen'];
                                $rincian_kebun_semusim->target2_produksi = $value2['target2_produksi'];
                                $rincian_kebun_semusim->target2_nilai = $value2['target2_nilai'];
                                
                                $rincian_kebun_semusim->target3_luas_tanam = $value2['target3_luas_tanam'];
                                $rincian_kebun_semusim->target3_luas_panen = $value2['target3_luas_panen'];
                                $rincian_kebun_semusim->target3_produksi = $value2['target3_produksi'];
                                $rincian_kebun_semusim->target3_nilai = $value2['target3_nilai'];
                                
                                $rincian_kebun_semusim->target4_luas_tanam = $value2['target4_luas_tanam'];
                                $rincian_kebun_semusim->target4_luas_panen = $value2['target4_luas_panen'];
                                $rincian_kebun_semusim->target4_produksi = $value2['target4_produksi'];
                                $rincian_kebun_semusim->target4_nilai = $value2['target4_nilai'];
                                $rincian_kebun_semusim->save();
                            }
                        }
                    }
                } 
            }
        }
    }

    public function detail_tahunan($tahun){
        $model = User::find(Auth::id());
        $user_profile = ProfilPerusahaan::find($model->company_id);
        return view('survei.detail_tahunan', compact('user_profile', 'tahun'));
    }
}
