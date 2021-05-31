@extends('layouts.admin')

@section('content')
<div id="app_vue" class="container-fluid">

    <form method="post" action="{{ url('user/update') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Perbaharui Profil Perusahaan</h4>
                <p class="card-category">Lengkapi profil anda untuk kemudahan pengisian survei</p>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Perusahaan/Kantor Administratur</label>
                                <input type="text" disabled class="form-control" value="{{ $perusahaan->nama_perusahaan }}">
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
                                <label class="bmd-label-floating">Alamat Lengkap Administratur</label>
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
                                <input type="text" disabled class="form form-control" name="kode_prov" :value="form.kode_prov + ' - SUMATERA SELATAN'">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Pilih Kabupaten/Kota</label>
                            <select class="form form-control" id="kode_kab" name="kode_kab" v-model="form.kode_kab" @change="setKec()">
                                <option v-for="v in list_kab" :key="v.idKab" :value="v.idKab">
                                    @{{ v.idKab }} - @{{ v.nmKab }}
                                </option>
                            </select>
                        </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Pilih Kecamatan</label>
                                <select class="form-control" name="kode_kec" v-model="form.kode_kec" @change="setDesa()">
                                    <option v-for="v in list_kec" :key="v.idKec" :value="v.idKec">
                                        @{{ v.idKec }} - @{{ v.nmKec }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Pilih Desa/Kelurahan</label>
                            <select class="form-control" name="kode_desa" v-model="form.kode_desa">
                                <option v-for="v in list_desa" :key="v.idDesa" :value="v.idDesa">
                                    @{{ v.idDesa }} - @{{ v.nmDesa }}
                                </option>
                            </select>
                        </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header card-header-primary">
                <p class="card-category">Lengkapi profil Kantor Pusat</p>
            </div>
            <div class="card-body">
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
                
            </div>
        </div>
    </form>
    
    <div class="modal hide" id="wait_progres" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center"><img src="{!! asset('img/loading.gif') !!}" width="200" height="200" alt="Loading..."></div>
                    <h4 class="text-center">Please wait...</h4>
                </div>
            </div>
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
        company_id: {!! json_encode($perusahaan->id) !!},
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
        list_kab: {!! json_encode($list_kab16) !!}, 
        list_pusat_prov: [],list_pusat_kab: [],
        list_kec: [], list_desa: [],
    },
    methods: {
        setDatas: function(){
            var self = this;
            if(self.company_id.toString().length>0){
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
                        if(self.form.kode_kab!='' || self.form.kode_kab!=null){
                            self.setKec();
                        }

                        if(self.form.kode_kec!='' || self.form.kode_kec!=null){
                            self.setDesa();
                        }
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
        setKec: function(){
            $('#wait_progres').modal('show');
            var self = this;

            $.ajax({
                url :  self.pathname+"/survei/get_kec",
                method : 'post',
                dataType: 'json',
                data:{
                    kode_prov: self.form.kode_prov,
                    kode_kab: self.form.kode_kab,
                },
            }).done(function (data) {
                self.list_kec = data.result 
                $('#wait_progres').modal('hide');
            }).fail(function (msg) {
                console.log(JSON.stringify(msg));
                $('#wait_progres').modal('hide');
            });
        },
        setDesa: function(){
            $('#wait_progres').modal('show');
            var self = this;

            $.ajax({
                url :  self.pathname+"/survei/get_desa",
                method : 'post',
                dataType: 'json',
                data:{
                    kode_prov: self.form.kode_prov,
                    kode_kab: self.form.kode_kab,
                    kode_kec: self.form.kode_kec,
                },
            }).done(function (data) {
                self.list_desa = data.result 
                $('#wait_progres').modal('hide');
            }).fail(function (msg) {
                console.log(JSON.stringify(msg));
                $('#wait_progres').modal('hide');
            });
        },
    }
});

$(document).ready(function() {
    vm.setDatas();
});
</script>
@endsection
