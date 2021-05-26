<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilPerusahaan;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = ProfilPerusahaan::paginate();   
        $datas->withPath('perusahaan');
        $datas->appends($request->all());     
        return view('perusahaan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new ProfilPerusahaan;
        return view('perusahaan.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new ProfilPerusahaan;
        $model->nama_perusahaan = $request->get('nama_perusahaan');
        $model->alamat_perusahaan = '-';
        $model->is_karet = ($request->get('is_karet')=='1') ? 1 : 0;
        $model->is_sawit = ($request->get('is_sawit')=='1') ? 1 : 0;
        $model->created_by =  Auth::id();
        $model->updated_by =  Auth::id();
        $model->save();

        return redirect(url('perusahaan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProfilPerusahaan::find($id);
        if($data!=null){
            $respon = [
                'status' => 'success',
                'data' => $data,
            ];
        }
        else{
            $respon = [
                'status' => 'error',
                'data' => null,
            ];
        }

        return response()->json($respon, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = ProfilPerusahaan::find($id);
        return view('perusahaan.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = ProfilPerusahaan::find($id);
        $model->nama_perusahaan = $request->get('nama_perusahaan');
        $model->is_karet = ($request->get('is_karet')=='1') ? 1 : 0;
        $model->is_sawit = ($request->get('is_sawit')=='1') ? 1 : 0;
        $model->updated_by =  Auth::id();
        $model->save();

        return redirect(url('perusahaan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $model = ProfilPerusahaan::find($id);
        $model->delete();
        return redirect("perusahaan");
    }
}
