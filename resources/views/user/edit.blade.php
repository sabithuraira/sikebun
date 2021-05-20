@extends('layouts.admin')

@section('content')
<div id="app_vue" class="container-fluid">
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
                            <label class="bmd-label-floating">Pilih Perusahaan</label>
                            <select required class="form form-control" name="company_id" v-model="company_id" @change="setDatas()">
                                <option value="">- PILIH PERUSAHAAN -</option>
                                @foreach($list_perusahaan as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->nama_perusahaan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos_perusahaan" v-model="form.kode_pos_perusahaan">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Alamat</label>
                            <input type="text" class="form-control" name="alamat_perusahaan"  v-model="form.alamat_perusahaan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Telepon</label>
                            <input type="text" class="form-control" name="telp_perusahaan" v-model="form.telp_perusahaan">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Fax</label>
                        <input type="text" class="form-control" name="fax_perusahaan" v-model="form.fax_perusahaan">
                    </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Provinsi</label>
                            <input type="text" class="form-control" name="kode_prov" v-model="form.kode_prov">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Kabupaten/Kota</label>
                        <input type="text" class="form-control" name="kode_kab" v-model="form.kode_kab">
                    </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Kecamatan</label>
                            <input type="text" class="form-control" name="kode_kec" v-model="form.kode_kec">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Desa/Kelurahan</label>
                        <input type="text" class="form-control" name="kode_desa"  v-model="form.kode_desa">
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama Kantor Pusat</label>
                            <input type="text" class="form-control" name="nama_kantor_pusat" v-model="form.nama_kantor_pusat">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Kode Pos Kantor Pusat</label>
                        <input type="text" class="form-control" name="kode_pos_kantor_pusat" v-model="form.kode_pos_kantor_pusat">
                    </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Alamat Kantor Pusat</label>
                            <input type="text" class="form-control" name="alamat_kantor_pusat" v-model="form.alamat_kantor_pusat">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Telepon Kantor Pusat</label>
                            <input type="text" class="form-control" name="telp_kantor_pusat" v-model="form.telp_kantor_pusat">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Fax Kantor Pusat</label>
                            <input type="text" class="form-control" name="fax_kantor_pusat" v-model="form.fax_kantor_pusat">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Provinsi Kantor Pusat</label>
                            <input type="text" class="form-control" name="kode_prov_kantor_pusat" v-model="form.kode_prov_kantor_pusat">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Kab/Kota Kantor Pusat</label>
                            <input type="text" class="form-control" name="kode_kab_kantor_pusat" v-model="form.kode_kab_kantor_pusat">
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


@section('css')
    <link href="{{ asset('css') }}/simple_table.css" rel="stylesheet" />
    <meta name="_token" content="{{csrf_token()}}" />
    <meta name="csrf-token" content="@csrf">
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script>
    
var vm = new Vue({  
    el: "#app_vue",
    data:  {
        pathname : window.location.pathname.replace("/user/edit", ""),
        company_id: '',
        form: {
            nama_perusahaan: '', 
            alamat_perusahaan: '', kode_pos_perusahaan: '',telp_perusahaan: '', fax_perusahaan: '',
            kode_prov: '16', kode_kab: '', kode_kec: '', kode_desa: '', 
            label_prov: 'SUMATERA SELATAN',label_kab: '', label_kec: '', label_desa: '',
            nama_kantor_pusat: '',
            alamat_kantor_pusat: '',
            kode_pos_kantor_pusat: '',
            telp_kantor_pusat: '',
            email_kantor_pusat: '',
            fax_kantor_pusat: '',
            kode_prov_kantor_pusat: '',
            kode_kab_kantor_pusat: '',
            label_prov_kantor_pusat: '',
            label_kab_kantor_pusat: '',
            created_by: '', updated_by: '',
            created_at: '', updated_at: '',
            
        },
    },
    methods: {
        setDatas: function(){
            var self = this;
            if(self.company_id.length>0){
                $('#wait_progres').modal('show');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })
                $.ajax({
                    url : self.pathname+"/perusahaan/"+self.company_id ,
                    method : 'get',
                    dataType: 'json',
                }).done(function (data) {
                    if(data.data!=null){
                        self.form = data.data;
                    }
                    else{
                        self.form = {
                            nama_perusahaan: '', 
                            alamat_perusahaan: '', kode_pos_perusahaan: '',telp_perusahaan: '', fax_perusahaan: '',
                            kode_prov: '16', kode_kab: '', kode_kec: '', kode_desa: '', 
                            label_prov: 'SUMATERA SELATAN',label_kab: '', label_kec: '', label_desa: '',
                            nama_kantor_pusat: '',
                            alamat_kantor_pusat: '', kode_pos_kantor_pusat: '',
                            telp_kantor_pusat: '', email_kantor_pusat: '',
                            fax_kantor_pusat: '',
                            kode_prov_kantor_pusat: '',
                            kode_kab_kantor_pusat: '',
                            label_prov_kantor_pusat: '',
                            label_kab_kantor_pusat: '',
                            created_by: '', updated_by: '',
                            created_at: '', updated_at: ''
                        }
                    }

                    $('#wait_progres').modal('hide');
                }).fail(function (msg) {
                    console.log(JSON.stringify(msg));
                    $('#wait_progres').modal('hide');
                });
            }
            else{
                
                self.form = {
                            nama_perusahaan: '', 
                            alamat_perusahaan: '', kode_pos_perusahaan: '',telp_perusahaan: '', fax_perusahaan: '',
                            kode_prov: '16', kode_kab: '', kode_kec: '', kode_desa: '', 
                            label_prov: 'SUMATERA SELATAN',label_kab: '', label_kec: '', label_desa: '',
                            nama_kantor_pusat: '',
                            alamat_kantor_pusat: '', kode_pos_kantor_pusat: '',
                            telp_kantor_pusat: '', email_kantor_pusat: '',
                            fax_kantor_pusat: '',
                            kode_prov_kantor_pusat: '',
                            kode_kab_kantor_pusat: '',
                            label_prov_kantor_pusat: '',
                            label_kab_kantor_pusat: '',
                            created_by: '', updated_by: '',
                            created_at: '', updated_at: ''
                        }
            }
        },
    }
});

$(document).ready(function() {
    vm.setDatas();
});
</script>
@endsection
