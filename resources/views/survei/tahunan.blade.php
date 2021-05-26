@extends('layouts.admin')

@section('content')
<div class="card" id="app_vue">
    <table style="min-width:100%">
        <tr>
            <td colspan="2"></td>
            <td class="text-center">
                <u><b>SKP20-TAHUNAN</b></u><br/>
                <br>ADMINISTRATUR KEBUN</br>
            </td>
        </tr>
        <tr class="text-center">
            <td width="25%">
                <img src="{{ asset('img') }}/logobps.png" width="130" />
            </td>
            <td width="50%">
                <img src="{{ asset('img') }}/garuda.png" width="55" />
                <p>REPUBLIK INDONESIA</p>
            </td>
            <td></td>
        </tr>
        
        <tr class="text-center">
            <td colspan="3">
                <h4>SURVEI PERUSAHAAN PERKEBUNAN TAHUNAN</h4>
                <h4>TAHUN 2020</h4>
            </td>
        </tr>
        
        <tr>
            <td>RAHASIA</td>
            <td colspan="2" class="text-right">
                TAHUN
                <select name="tahun" v-model="form.tahun">
                    <option>- Pilih Tahun -</option>
                    @for($i = 2020 ;$i <= date('Y'); $i++))
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </td>
        </tr>
    </table>

    <table class="table-border" style="min-width:100%">
        <tr class="bg-success text-center"><td colspan="4"><b>I. PENGENALAN TEMPAT</b></td></tr>
        <tr><td colspan="4">1. Nama Perusahaan/Kantor Administratur</td></tr>
        <tr>
            <td></td>
            <td colspan="3">a. Alamat Lengkap Administratur Kebun :</td>
        </tr>

        <tr>
            <td></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp; 
                Kode Post: <input type="text">
            </td>
            <td>Telepon: <input type="text"></td>
        </tr>
        
        <tr>
            <td></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp; 
                Email: <input type="text">
            </td>
            <td>Fax: <input type="text"></td>
        </tr>
        
        <tr>
            <td></td>
            <td>b. Provinsi</td>
            <td colspan="2" class="text-right"><input type="text"></td>
        </tr>
        
        <tr>
            <td></td>
            <td>c. Kabupaten/Kota *)</td>
            <td colspan="2" class="text-right"><input type="text"></td>
        </tr>
        
        <tr>
            <td></td>
            <td>d. Kecamatan</td>
            <td colspan="2" class="text-right"><input type="text"></td>
        </tr>
        
        <tr>
            <td></td>
            <td>e. Desa/Kelurahan *)</td>
            <td colspan="2" class="text-right"><input type="text"></td>
        </tr>
        
        <tr>
            <td></td>
            <td>f. Nama Contact Person</td>
            <td colspan="2" class="text-right"><input type="text"></td>
        </tr>
        
        <tr>
            <td></td>
            <td>g. Nomor HP/Telp</td>
            <td colspan="2" class="text-right"><input type="text"></td>
        </tr>

        <tr><td colspan="4">2. Nama Kantor Pusat</td></tr>
        <tr>
            <td></td><td colspan="3">a. Alamat Lengkap Kantor Pusat :</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp; 
                Kode Post: <input type="text">
            </td>
            <td>Telepon: <input type="text"></td>
        </tr>
        
        <tr>
            <td></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp; 
                Email: <input type="text">
            </td>
            <td>Fax: <input type="text"></td>
        </tr>
        <tr>
            <td></td>
            <td>b. Provinsi</td>
            <td colspan="2" class="text-right"><input type="text"></td>
        </tr>
        
        <tr>
            <td></td>
            <td>c. Kabupaten/Kota *)</td>
            <td colspan="2" class="text-right"><input type="text"></td>
        </tr>

        <tr><td colspan="4">3. Nama Group Perusahaan</td></tr>
        <tr><td></td><td colspan="3">a. Alamat Lengkap Group Perusahaan :</td></tr>
        <tr>
            <td></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp; 
                Kode Post: <input type="text">
            </td>
            <td>Telepon: <input type="text"></td>
        </tr>
        
        <tr>
            <td></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp; 
                Email: <input type="text">
            </td>
            <td>Fax: <input type="text"></td>
        </tr>
        
        <tr>
            <td></td>
            <td>b. Provinsi</td>
            <td colspan="2" class="text-right"><input type="text"></td>
        </tr>
        
        <tr>
            <td></td>
            <td>c. Kabupaten/Kota *)</td>
            <td colspan="2" class="text-right"><input type="text"></td>
        </tr>

        <tr><td colspan="4"><i>*) Coret yang tidak sesuai</i></td></tr>
        
        <tr><td colspan="4">
            <span class="text-center">PERHATIAN</span><br/>
            •	Tujuan Survei 
                Memperoleh data statistik perkebunan yang dapat dipercaya dan tepat waktu untuk perencanaan pembangunan sektor perkebunan.
            •	Kewenangan pengumpulan data, kerahasiaan data yang diberikan dan kewajiban memberikan jawaban
            	Pelaksanaan survei ini berdasarkan Undang-Undang No. 16 Tahun 1997 tentang Statistik Pasal 11.
            	Kerahasiaan data yang diberikan dijamin oleh Undang-Undang No. 16 Tahun 1997 tentang Statistik Pasal 21.
            	Setiap responden wajib memberikan keterangan yang diperlukan dalam penyelenggaraan statistik dasar oleh Badan Pusat Statistik sesuai dengan Undang-Undang No. 16 Tahun 1997 tentang Statistik Pasal 27.
        </td></tr>

    </table>

    <table style="min-width:100%">
        <tr><td colspan="4">II. KETERANGAN UMUM PERUSHAAN</td></tr>
        <tr><td colspan="4">1. Kondisi Perusahaan Berdasarkan Hasil Kunjungan ? (Lingkari salah satu kode yang sesuai)</td></tr>
        <tr>
            <td colspan="4" class="text-right">
                <select>
                    <option value="1">Aktif</option>
                    <option value="2">Belum berproduksi</option>
                    <option value="3">Tutup Sementara/Tidak ada Kegiatan</option>
                    <option value="4">Tidak ditemukan</option>
                    <option value="5">Tutup</option>
                </select>
            </td>
        </tr>
        <tr><td colspan="4">2. Bentuk Badan Hukum Perusahaan</td></tr>
        <tr>
            <td colspan="4" class="text-right">
                <select>
                    <option value="1">PTP Nusantara</option>
                    <option value="2">Perusahaan Daerah</option>
                    <option value="3">Persero</option>
                    <option value="4">Perum</option>
                    <option value="5">PT</option>
                    <option value="6">CV</option>
                    <option value="7">Koperasi/KUD</option>
                    <option value="8">Yayasan</option>
                </select>
            </td>
        </tr>
        <tr><td colspan="4">3. Status Permodalan (Lingkari salah satu kode yang sesuai)</td></tr>
        <tr>
            <td colspan="4" class="text-right">
                <select>
                    <option value="1">PMDN</option>
                    <option value="2">PMA</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td colspan="2">4. Masa Berlaku SK HGU Terakhir</td>
            <td colspan="2" class="text-right">
                <input type="text"> s/d <input type="text">
            </td>
        </tr>
        <tr>
            <td colspan="4">Tulis Jenis Tanamapn Perkebunan Tahunan dan atau Tanaman Perkebunan Semusim yang diusahakan</td>
        </tr>
        
        <tr>
            <td colspan="4">
                <select>
                    <option v-for="item in list_jenis_tanaman" :key="item.kode">
                        @{{ item.kode }} @{{ item.label }} 
                    </option>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="3">6. Apakah Perusahaan Perkebunan ini sebagai pelaksana KEMITRAAN?</td>
            <td class="text-right">
                <select>
                    <option value="1">Ya</option>
                    <option value="2">Tidak</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td colspan="3">7. Apabila rincian 6 berkode 1, kemitraannya dalam bentuk bantuan:</td>
            <td class="text-right">
                <select>
                    <option value="1">1. Penyuluhan</option>
                    <option value="2">2. Bibit/benih</option>
                    <option value="3">3. Pemasaran</option>
                    <option value="4">4. Lainnya</option>
                </select>

                <input type="text" placeholder="keterangan jika lainnya">
            </td>
        </tr>
        
        <tr>
            <td colspan="3">8.a. Apakah mempunyai unit pengolahan produksi?</td>
            <td class="text-right">
                <select>
                    <option value="1">Ya</option>
                    <option value="2">Tidak</option>
                </select>

                <input type="text" placeholder="keterangan jika lainnya">
            </td>
        </tr>

        
        <tr>
            <td colspan="4">8.b. Jika mempunyai unit pengolahan produksi (Rincian 8a. berkode 1), sebutkan jenis tanaman yang diolah:</td>
        </tr>

        
        <tr>
            <td></td>
            <td>Kode diisi BPS</td>
            <td></td>
            <td>Kode diisi BPS</td>
        </tr>
        
        <tr>
            <td>1. <input type="text"></td>
            <td><input type="text" placeholder="kode" disabled></td>
            <td>3. <input type="text"></td>
            <td><input type="text" placeholder="kode" disabled></td>
        </tr>
        
        <tr>
            <td>2. <input type="text"></td>
            <td><input type="text" placeholder="kode" disabled></td>
            <td>4. <input type="text"></td>
            <td><input type="text" placeholder="kode" disabled></td>
        </tr>
        



        <tr>
            <td>
                Aktif  -1<br/>Belum berporduksi -2<br/>
            </td>
            <td>
                Tutup Sementara/Tidak Ada Kegiatan<br/>
                Tidak ditemukan<br/>
                Tutup
            </td>
            <td>-3<br/>-4<br/>-5</td>
            <td><input type="text"></td>
        </tr>
    </table>

    <br/><br/>

    <button class="btn btn-info" @click="saveData()">SIMPAN</button>

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
        list_tanaman_tahunan: [],
        list_tanaman_musiman: [],
        list_jenis_tanaman:[
            {'kode': 3101, 'label': Aren/Enau, 'jenis': 1},
            {'kode': 3102, 'label': Asam Jawa, 'jenis': 1},
            {'kode': 3103, 'label': Cengkeh, 'jenis': 1},
            {'kode': 3104, 'label': Gambir, 'jenis': 1},
            {'kode': 3105, 'label': Jambu Mete, 'jenis': 1},
            {'kode': 3106, 'label': Jarak Pagar, 'jenis': 1},
            {'kode': 3107, 'label': Kakao, 'jenis': 1},
            {'kode': 3108, 'label': Kapok, 'jenis': 1},
            {'kode': 3109, 'label': Karet, 'jenis': 1},
            {'kode': 3110, 'label': Kayu Manis, 'jenis': 1},
            {'kode': 3111, 'label': Kelapa Sawit, 'jenis': 1},
            {'kode': 3112, 'label': Kelapa, 'jenis': 1},
            {'kode': 3113, 'label': Kemenyan, 'jenis': 1},
            {'kode': 3114, 'label': Kemiri, 'jenis': 1},
            {'kode': 3115, 'label': Kemiri Sunan, 'jenis': 1},
            {'kode': 3116, 'label': Kenanga, 'jenis': 1},
            {'kode': 3117, 'label': Kina, 'jenis': 1},
            {'kode': 3118, 'label': Klerek, 'jenis': 1},
            {'kode': 3119, 'label': Kopi, 'jenis': 1},
            {'kode': 3120, 'label': Lada, 'jenis': 1},
            {'kode': 3121, 'label': Lontar, 'jenis': 1},
            {'kode': 3122, 'label': Murbai, 'jenis': 1},
            {'kode': 3123, 'label': Panili/Vanili, 'jenis': 1},
            {'kode': 3124, 'label': Pala, 'jenis': 1},
            {'kode': 3125, 'label': Pandan Anyaman, 'jenis': 1},
            {'kode': 3126, 'label': Pinang/Jambe, 'jenis': 1},
            {'kode': 3127, 'label': Sagu, 'jenis': 1},
            {'kode': 3128, 'label': Soga, 'jenis': 1},
            {'kode': 3129, 'label': Teh, 'jenis': 1},
            {'kode': 3199, 'label': Lainnya, 'jenis': 1},

            {'kode': 3201, 'label': Abaca/Manila, 'jenis': 2},
            {'kode': 3202, 'label': Akar Wangi, 'jenis': 2},
            {'kode': 3203, 'label': Jute, 'jenis': 2},
            {'kode': 3204, 'label': Kapas, 'jenis': 2},
            {'kode': 3205, 'label': Kenaf, 'jenis': 2},
            {'kode': 3206, 'label': Nilam, 'jenis': 2},
            {'kode': 3207, 'label': Rami/Haramay, 'jenis': 2},
            {'kode': 3208, 'label': Rosela, 'jenis': 2},
            {'kode': 3209, 'label': Sereh Wangi, 'jenis': 2},
            {'kode': 3210, 'label': Tebu, 'jenis': 2},
            {'kode': 3211, 'label': Tembakau, 'jenis': 2},
            {'kode': 3299, 'label': Lainnya, 'jenis': 2}
        ],
        list_wujud_tahunan: [
            {id: 1, jenis: 'Cengkeh Ambon', wujud: "Bunga Basah"},
            {id: 2, jenis: 'Cengkeh Zanibar', wujud: "Bunga Basah"},
            {id: 3, jenis: 'Jambu Mete', wujud: "Biji Basah"},
            {id: 4, jenis: 'Kakao', wujud: "Buah masa/glondong"},
            {id: 5, jenis: 'Kapok', wujud: "Buah kapok kering"},
            {id: 6, jenis: 'Karet', wujud: "Lateks"},
            {id: 7, jenis: 'Kayu Manis', wujud: "Kulit Batang Basah"},
            {id: 8, jenis: 'Kelapa Sawit', wujud: "Tandan Buah Segar (TSS)"},
            {id: 9, jenis: 'Kelapa Dalam', wujud: "Buah Kelapa"},
            {id: 10, jenis: 'Kelapa Hibrida', wujud: "Buah Kelapa"},
            {id: 11, jenis: 'Kemiri', wujud: "Bunga Basah"},
            {id: 12, jenis: 'Kina', wujud: "Kulit kina basah"},
            {id: 13, jenis: 'Kopi Arabika', wujud: "Buah masak/glondong"},
            {id: 14, jenis: 'Kopi Robusta', wujud: "Buah masak/glondong"},
            {id: 15, jenis: 'Lada', wujud: "Buah masak/glondong"},
            {id: 16, jenis: 'Panili/Vanili', wujud: "Buah Segar/biji panili"},
            {id: 17, jenis: 'Teh', wujud: "Daun Basah"},
            {id: 18, jenis: 'Pala', wujud: "Biji pala basah"},
            {id: 19, jenis: 'Sagu', wujud: "Pohon sagu"},
        ],
        list_wujud_musiman: [
            {id: 1, jenis: 'Abaca/Manila', wujud: "Serat Basah"},
            {id: 2, jenis: 'Akar Wangi', wujud: "Akar Basah"},
            {id: 3, jenis: 'Kapas', wujud: "Buah Masak"},
            {id: 4, jenis: 'Kenaf', wujud: "Batang basah"},
            {id: 5, jenis: 'Rami/Rosela', wujud: "Batang basah"},
            {id: 6, jenis: 'Sereh Wangi', wujud: "Daun basah"},
            {id: 7, jenis: 'Tebu', wujud: "Batang  Basah"},
            {id: 8, jenis: 'Tembakau', wujud: "Tandan Buah Segar (TSS)"},
            {id: 9, jenis: 'Yute', wujud: "Buah Kelapa"},
            {id: 10, jenis: 'Nilam', wujud: "Buah Kelapa"},
        ],
        form: {
            id: 0, tahun: '', triwulan: '', nama_perusahaan: '', user_id: {!! json_encode(Auth::id()) !!},
            alamat: '', kode_pos: '',telp: '', email: '', fax: '',
            kode_prov: '16', kode_kab: '', kode_kec: '', kode_desa: '', 
            label_prov: 'SUMATERA SELATAN',label_kab: '', label_kec: '', label_desa: '',
            nama_contact: '',
            nomor_hp: '',
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
            nama_grup: '',
            alamat_grup: '',
            kode_pos_grup: '',
            telepon_grup: '',
            fax_grup: '',
            email_grup: '',
            kode_prov_grup: '',
            kode_kab_grup: '',
            label_prov_grup: '',
            label_kab_grup: '',
            status_pemodalan_grup: '',
            badan_hukum_grup: '',
            apakah_pelaksana_kemitraan: '',
            punya_kebun_plasma: '',
            punya_unit_pengolahan: '',
            tahun_berdiri: '',
            nama_pencacah: '',
            tanggal_pencacah: '',
            ttd_pencacah: '',
            nama_pemeriksa: '',
            tanggal_pemeriksa: '',
            ttd_pemeriksa: '',
            
            catatan: '',
            diisi_di: '',
            diisi_tanggal: '',
            status_dokumen: '',

            created_by: '',
            updated_by: '',
            
            '301_a3_total_tbm_bulan1': '',
            '301_a3_total_tsm_bulan1': '',
            '301_a3_total_tstm_bulan1': '',
            '301_a3_total_ttm_bulan1': '',
            '301_a3_total_produksi_bulan1': '',
            '301_a3_total_tbm_bulan2': '',
            '301_a3_total_tsm_bulan2': '',
            '301_a3_total_tstm_bulan2': '',
            '301_a3_total_ttm_bulan2': '',
            '301_a3_total_produksi_bulan2': '',
            '301_a3_total_tbm_bulan3': '',
            '301_a3_total_tsm_bulan3': '',
            '301_a3_total_tstm_bulan3': '',
            '301_a3_total_ttm_bulan3': '',
            '301_a3_total_produksi_bulan3': '',
            '301_b_bulan1': '',
            '301_b_bulan2': '',
            '301_b_bulan3': '',
            '301_c_bulan1': '',
            '301_c_bulan2': '',
            '301_c_bulan3': '',
            
            '302_2a': '',
            '302_3a': '',
            '302_4a': '',
            '302_2b': '',
            '302_3b': '',
            '302_4b': '',
            '302_2c': '',
            '302_3c': '',
            '302_4c': '',
        },
        rincian1: [], rincian2: [],
        pathname : window.location.pathname.replace("/sawit", ""),
        list_kab: [], list_pusat_kab: [], list_grup_kab: [],
        list_kec: [], list_desa: [],
        user_profile: {!! json_encode($user_profile) !!},
    },
    computed: {
        triwulan() { return this.form.triwulan },
        tahun() { return this.form.tahun },
    },
    watch: {
        triwulan() { this.setDatas(); },
        tahun(){ this.setDatas(); }
    },
    methods: {
        addRincian: function (jenis_rincian) {
            if(jenis_rincian==1){
                this.rincian1.push({
                    id: 0, survei_id: '', jenis: '1', rincian: '',
                    tbm1: '', tsm1: '', tstm1: '', ttm1: '', produksi1: '',
                    tbm2: '', tsm2: '', tstm2: '', ttm2: '', produksi2: '',
                    tbm3: '', tsm3: '', tstm3: '', ttm3: '', produksi3: ''
                })
            }
            else{
                this.rincian2.push({
                    id: 0, survei_id: '', jenis: '2', rincian: '',
                    tbm1: '', tsm1: '', tstm1: '', ttm1: '', produksi1: '',
                    tbm2: '', tsm2: '', tstm2: '', ttm2: '', produksi2: '',
                    tbm3: '', tsm3: '', tstm3: '', ttm3: '', produksi3: ''
                }) 
            }
        },
        saveData: function () {
            var self = this;
            $('#wait_progres').modal('show');
            
            if(self.form.tahun!='' && self.form.triwulan!='' && self.form.nama_perusahaan!='' && 
                self.form.alamat!=''){
                    var data_post = self.form
                    var rincian = { rincian1: self.rincian1, rincian2: self.rincian2 }
                    data_post = { ...data_post, ...rincian }

                    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')} })
                    $.ajax({
                        url :  self.pathname+"/sawit",
                        method : 'post',
                        dataType: 'json',
                        data: data_post,
                    }).done(function (data) {
                        $('#wait_progres').modal('hide');
                        window.location.href = pathname + "/sawit"
                    }).fail(function (msg) {
                        console.log(JSON.stringify(msg));
                        $('#wait_progres').modal('hide');
                    });

            }
        },
        setDataKosong: function(){
            var self = this;
            var temp_tahun = self.form.tahun
            var temp_triwulan = self.form.triwulan
            self.form = {
                id: 0, tahun: temp_tahun, triwulan: temp_triwulan, 
                nama_perusahaan: self.user_profile.nama_perusahaan, 
                user_id: {!! json_encode(Auth::id()) !!},
                alamat: self.user_profile.alamat_perusahaan, 
                kode_pos: self.user_profile.kode_pos_perusahaan,
                telp: self.user_profile.telp_perusahaan, 
                email: '', 
                fax: self.user_profile.fax_perusahaan,
                kode_prov: self.user_profile.kode_prov, 
                kode_kab: self.user_profile.kode_kab, 
                kode_kec: self.user_profile.kode_kec, 
                kode_desa: self.user_profile.kode_desa, 
                label_prov: self.user_profile.label_prov,
                label_kab: self.user_profile.label_kab, 
                label_kec: self.user_profile.label_kec, 
                label_desa: self.user_profile.label_desa,
                nama_contact: '',
                nomor_hp: '',
                nama_kantor_pusat: self.user_profile.nama_kantor_pusat,
                alamat_kantor_pusat: self.user_profile.alamat_kantor_pusat,
                kode_pos_kantor_pusat: self.user_profile.kode_pos_kantor_pusat,
                telp_kantor_pusat: self.user_profile.telp_kantor_pusat,
                email_kantor_pusat: '',
                fax_kantor_pusat: self.user_profile.fax_kantor_pusat,
                kode_prov_kantor_pusat: self.user_profile.kode_prov_kantor_pusat,
                kode_kab_kantor_pusat: self.user_profile.kode_kab_kantor_pusat,
                label_prov_kantor_pusat: self.user_profile.label_prov_kantor_pusat,
                label_kab_kantor_pusat: self.user_profile.label_kab_kantor_pusat,
                nama_grup: '',
                alamat_grup: '',
                kode_pos_grup: '',
                telepon_grup: '',
                fax_grup: '',
                email_grup: '',
                kode_prov_grup: '',
                kode_kab_grup: '',
                label_prov_grup: '',
                label_kab_grup: '',
                status_pemodalan_grup: '',
                badan_hukum_grup: '',
                apakah_pelaksana_kemitraan: '',
                punya_kebun_plasma: '',
                punya_unit_pengolahan: '',
                tahun_berdiri: '',
                nama_pencacah: '',
                tanggal_pencacah: '',
                ttd_pencacah: '',
                nama_pemeriksa: '',
                tanggal_pemeriksa: '',
                ttd_pemeriksa: '',
                
                catatan: '',
                diisi_di: '',
                diisi_tanggal: '',
                status_dokumen: '',

                created_by: '',
                updated_by: '',
                
                '301_a3_total_tbm_bulan1': '',
                '301_a3_total_tsm_bulan1': '',
                '301_a3_total_tstm_bulan1': '',
                '301_a3_total_ttm_bulan1': '',
                '301_a3_total_produksi_bulan1': '',
                '301_a3_total_tbm_bulan2': '',
                '301_a3_total_tsm_bulan2': '',
                '301_a3_total_tstm_bulan2': '',
                '301_a3_total_ttm_bulan2': '',
                '301_a3_total_produksi_bulan2': '',
                '301_a3_total_tbm_bulan3': '',
                '301_a3_total_tsm_bulan3': '',
                '301_a3_total_tstm_bulan3': '',
                '301_a3_total_ttm_bulan3': '',
                '301_a3_total_produksi_bulan3': '',
                '301_b_bulan1': '',
                '301_b_bulan2': '',
                '301_b_bulan3': '',
                '301_c_bulan1': '',
                '301_c_bulan2': '',
                '301_c_bulan3': '',
                
                '302_2a': '', '302_3a': '', '302_4a': '', '302_2b': '',
                '302_3b': '', '302_4b': '', '302_2c': '', '302_3c': '', '302_4c': '',
            };
            self.rincian1 = [] 
            self.rincian2 = []
        },
        setDatas: function(){
            var self = this;
            if(self.form.tahun.toString().length>0 && self.form.triwulan.toString().length>0){
                $('#wait_progres').modal('show');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })
                $.ajax({
                    url : self.pathname+"/sawit/"+self.form.tahun+"/"+ self.form.triwulan + "/show" ,
                    method : 'get',
                    dataType: 'json',
                }).done(function (data) {
                    if(data.data!=null){
                        self.form = data.data;
                        self.rincian1 = data.rincian1;
                        self.rincian2 = data.rincian2;
                    }
                    else{
                        self.setDataKosong()
                    }
                    
                    for(var i=self.rincian1.length;i<3;i++)
                            self.addRincian(1)   
                    for(var i=self.rincian2.length;i<3;i++)
                        self.addRincian(2)

                    $('#wait_progres').modal('hide');
                }).fail(function (msg) {
                    console.log(JSON.stringify(msg));
                    $('#wait_progres').modal('hide');
                });
            }
            else{
                self.setDataKosong()
                for(var i=self.rincian1.length;i<3;i++)
                        self.addRincian(1)   
                for(var i=self.rincian2.length;i<3;i++)
                    self.addRincian(2)
            }
        },
        setKab: function(kab_mana){
            $('#wait_progres').modal('show');
            var self = this;
            var kd_prov = ''
            if(kab_mana==1) kd_prov = self.form.kode_prov 
            else if(kab_mana==2)  kd_prov = self.form.kode_prov_kantor_pusat
            else if(kab_mana==3)  kd_prov = self.form.kode_prov_grup
            
            $.ajax({
                url :  self.pathname+"/get_kab",
                method : 'post',
                dataType: 'json',
                data:{
                    kode_prov: kd_prov,
                },
            }).done(function (data) {
                    
                if(kab_mana==1) self.list_kab = data.result 
                else if(kab_mana==2) self.list_pusat_kab = data.result 
                else if(kab_mana==3) self.list_grup_kab = data.result 

                $('#wait_progres').modal('hide');
            }).fail(function (msg) {
                console.log(JSON.stringify(msg));
                $('#wait_progres').modal('hide');
            });
        },
        setKec: function(){
            $('#wait_progres').modal('show');
            var self = this;

            var index_kab = $("#kode_kab")[0].selectedIndex;
            self.form.label_kab = self.list_kab[index_kab-1].nmKab

            $.ajax({
                url :  self.pathname+"/get_kec",
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
            
            var index_kec = $("#kode_kec")[0].selectedIndex;
            self.form.label_kec = self.list_kec[index_kec-1].nmKec

            $.ajax({
                url :  self.pathname+"/get_desa",
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
        namaDesa: function(){
            var self = this;
            var index_desa = $("#kode_desa")[0].selectedIndex;
            if(index_desa>0) self.form.label_desa = self.list_desa[index_desa-1].nmDesa
        },
        namaKab: function(kab_mana){
            var self = this;
            
            if(kab_mana==2){
                var index_kab = $("#kode_kab_grup")[0].selectedIndex;
                self.form.label_kab_grup = self.list_grup_kab[index_kab-1].nmKab
            }
            else if(kab_mana==3){
                var index_kab = $("#kode_kab_kantor_pusat")[0].selectedIndex;
                self.form.label_kab_kantor_pusat = self.list_pusat_kab[index_kab-1].nmKab
            }
        }
    }
});

$(document).ready(function() {
    vm.setDatas();
    vm.setKab(1);
    vm.setKab(2);
    vm.setKab(3);
});
</script>
@endsection