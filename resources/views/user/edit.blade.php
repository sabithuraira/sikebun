@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Perbaharui Profil Perusahaan</h4>
            <p class="card-category">Lengkapi profil anda untuk kemudahan pengisian survei</p>
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('user/update') }}" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="nama_perusahaan" value="{{ old('nama_perusahaan', $model_profil->nama_perusahaan) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos_perusahaan" value="{{ old('kode_pos_perusahaan', $model_profil->kode_pos_perusahaan) }}">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Alamat</label>
                            <input type="text" class="form-control" name="alamat_perusahaan" value="{{ old('alamat_perusahaan', $model_profil->alamat_perusahaan) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Telepon</label>
                            <input type="text" class="form-control" name="telp_perusahaan" value="{{ old('telp_perusahaan', $model_profil->telp_perusahaan) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Fax</label>
                        <input type="text" class="form-control" name="fax_perusahaan" value="{{ old('fax_perusahaan', $model_profil->fax_perusahaan) }}">
                    </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Provinsi</label>
                            <input type="text" class="form-control" name="kode_prov" value="{{ old('kode_prov', $model_profil->kode_prov) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Kabupaten/Kota</label>
                        <input type="text" class="form-control" name="kode_kab" value="{{ old('kode_kab', $model_profil->kode_kab) }}">
                    </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Kecamatan</label>
                            <input type="text" class="form-control" name="kode_kec" value="{{ old('kode_kec', $model_profil->kode_kec) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Desa/Kelurahan</label>
                        <input type="text" class="form-control" name="kode_desa" value="{{ old('kode_desa', $model_profil->kode_desa) }}">
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama Kantor Pusat</label>
                            <input type="text" class="form-control" name="nama_kantor_pusat" value="{{ old('nama_kantor_pusat', $model_profil->nama_kantor_pusat) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Kode Pos Kantor Pusat</label>
                        <input type="text" class="form-control" name="kode_pos_kantor_pusat" value="{{ old('kode_pos_kantor_pusat', $model_profil->kode_pos_kantor_pusat) }}">
                    </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Alamat Kantor Pusat</label>
                            <input type="text" class="form-control" name="alamat_kantor_pusat" value="{{ old('alamat_kantor_pusat', $model_profil->alamat_kantor_pusat) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Telepon Kantor Pusat</label>
                            <input type="text" class="form-control" name="telp_kantor_pusat" value="{{ old('telp_kantor_pusat', $model_profil->telp_kantor_pusat) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Fax Kantor Pusat</label>
                            <input type="text" class="form-control" name="fax_kantor_pusat" value="{{ old('fax_kantor_pusat', $model_profil->fax_kantor_pusat) }}">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Provinsi Kantor Pusat</label>
                            <input type="text" class="form-control" name="kode_prov_kantor_pusat" value="{{ old('kode_prov_kantor_pusat', $model_profil->kode_prov_kantor_pusat) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Kab/Kota Kantor Pusat</label>
                            <input type="text" class="form-control" name="kode_kab_kantor_pusat" value="{{ old('kode_kab_kantor_pusat', $model_profil->kode_kab_kantor_pusat) }}">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Update Profil Perusahaan</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection
