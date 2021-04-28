@extends('layouts.admin')

@section('css')
    <link href="{{ asset('css') }}/simple_table.css" rel="stylesheet" />
@endsection

@section('content')
<div class="card" id="app_vue">
    <ul id="example-1">
    <li v-for="item in isi" :key="item">
        @{{ item }}
    </li>
    </ul>

    <table style="min-width:100%">
        <tr class="text-center">
            <td width="25%">
                <img src="{{ asset('img') }}/logobps.png" width="130" />
            </td>
            <td  width="50%">
                <img src="{{ asset('img') }}/garuda.png" width="55" />
                <p>REPUBLIK INDONESIA</p>
                
                <b>SURVEI PERUSAHAAN PERKEBUNAN KARET TRIWULANAN</b> <br/>
                <b>TAHUN 2021</b>
            </td>
            <td width="25%">
                <p>SKP21 - KARET</p>
            </td>
        </tr>
        
        <tr class="text-center">
            <td colspan="3">
                <small class="border border-dark">
                    Laporan Harap Dikirim Sebelum Tanggal 10 Pada: Bulan April 2021 (Triwulan I), Juli 2021 (Triwulan II), Oktober 2021 (Triwulan III), Januari 2022 (Triwulan IV)
                </small>
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
                TRIWULAN
                <select name="triwulan" v-model="form.triwulan">
                    <option>- Pilih TW -</option>
                    @for($i = 1;$i < 5; $i++))
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </td>
        </tr>
    </table>

    <table class="table-border" style="min-width:100%">
        <tr class="bg-danger text-center"><td colspan="4"><b>I. PENGENALAN TEMPAT</b></td></tr>
        <tr>
            <td>101. Nama Perusahaan/Kantor Administratur</td>
            <td><input type="text" name="nama_perusahaan" v-model="form.nama_perusahaan"></td>
            <td>103. Nama Group Perusahaan</td>
            <td><input type="text" name="nama_grup" v-model="form.nama_grup"></td>
        </tr>
        
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;a. Alamat Lengkap Administratur Kebun:<input type="text" name="alamat" v-model="form.alamat"></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;a. Alamat Lengkap Group Perusahaan:<input type="text" name="alamat_grup" v-model="form.alamat_grup"></td>
        </tr>
        
        <tr>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Kode Pos: <input type="text" name="kode_pos" v-model="form.kode_pos">
                &nbsp;&nbsp;&nbsp; Telepon: <input type="text" name="telp" v-model="form.telp">
            </td>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Kode Pos: <input type="text" name="kode_pos_grup"  v-model="form.kode_pos_grup">
                &nbsp;&nbsp;&nbsp; Telepon: <input type="text" name="telepon_grup"  v-model="form.telepon_grup">
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Email: <input type="text" name="email" v-model="form.email">
                &nbsp;&nbsp;&nbsp; Fax: <input type="text" name="fax" v-model="form.fax">
            </td>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Email: <input type="text" name="email_grup"  v-model="form.email_grup">
                &nbsp;&nbsp;&nbsp; Fax: <input type="text" name="fax_grup"  v-model="form.fax_grup">
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; b. Provinsi</td>
            <td>
                <input type="text" name="kode_prov" v-model="form.kode_prov">
                <input type="hidden" name="label_prov" v-model="form.label_prov">
            </td>
            <td>&nbsp;&nbsp;&nbsp; b. Provinsi</td>
            <td>
                <input type="text" name="kode_prov_grup" v-model="form.kode_prov_grup">
                <input type="hidden" name="label_prov_grup" v-model="form.label_prov_grup">
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
            <td>
                <input type="text" name="kode_kab" v-model="form.kode_kab">
                <input type="hidden" name="label_kab" v-model="form.label_kab">
            </td>
            <td>&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
            <td>
                <input type="text" name="kode_kab_grup" v-model="form.kode_kab_grup">
                <input type="hidden" name="label_kab_grup" v-model="form.label_kab_grup">
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; d. Kecamatan</td>
            <td>
                <input type="text" name="kode_kec" v-model="form.kode_kec">
                <input type="hidden" name="label_kec" v-model="form.label_kec">
            </td>
            <td>104. Status permodalan/pemilikan *)</td>
            <td><input type="text" name="status_pemodalan_grup" v-model="form.status_pemodalan_grup"></td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; e. Desa/Kelurahan *)</td>
            <td>
                <input type="text" name="kode_desa" v-model="form.kode_desa">
                <input type="hidden" name="label_desa" v-model="form.label_desa">
            </td>
            <td>105. Bentuk Badan Hukum</td>
            <td><input type="text" name="badan_hukum_grup" v-model="form.badan_hukum_grup"></td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; f. Nama Contact Person</td>
            <td><input type="text" name="nama_contact" v-model="form.nama_contact"></td>
            <td>106. Apakah Sebagai Pelaksana Kemitraan</td>
            <td><input type="text" name="apakah_pelaksana_kemitraan" v-model="form.apakah_pelaksana_kemitraan"></td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; g. Nomor HP/Telp.</td>
            <td><input type="text" name="nomor_hp" v-model="form.nomor_hp"></td>
            <td>107. Apakah mempunyai Kebun Plasma yang belum dikonversi</td>
            <td><input type="text" name="punya_kebun_plasma" v-model="form.punya_kebun_plasma"></td>
        </tr>
        
        <tr>
            <td colspan="2"><b>Kondisi Perusahaan: Aktif/Tutup Sementara/Non Respon/Tidak Ditemukan *)</b></td>
            <td>108. Apakah mempunyai unit pengolahan produksi</td>
            <td><input type="text" name="punya_unit_pengolahan" v-model="form.punya_unit_pengolahan"></td>
        </tr>
        
        <tr>
            <td>102. Nama Kantor Pusat</td>
            <td><input type="text" name="nama_kantor_pusat" v-model="form.nama_kantor_pusat"></td>
            <td>109. Tahun Berdiri/Operasional Perusahaan</td>
            <td><input type="text" name="tahun_berdiri" v-model="form.tahun_berdiri"></td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; a. Alamat Lengkap Pusat</td>
            <td><input type="text" name="alamat_kantor_pusat" v-model="form.alamat_kantor_pusat"></td>
            <td colspan="2" class="text-center bg-danger"><b>II. KETERANGAN PETUGAS</b></td>
        </tr>
        
        <tr>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Kode Pos: <input type="text" name="kode_pos_kantor_pusat" v-model="form.kode_pos_kantor_pusat">
                Telepon: <input type="text" name="telp_kantor_pusat" v-model="form.telp_kantor_pusat">
            </td>
            <td colspan="3" rowspan="4">
                <table style="min-width:100%">
                    <tr>
                        <td>Uraian</td><td>Pencacah</td><td>Pemeriksa</td>
                    </tr>
                    <tr>
                        <td>201. Nama</td>
                        <td><input type="text" name="nama_pencacah" v-model="form.nama_pencacah" /></td>
                        <td><input type="text" name="nama_pemeriksa" v-model="form.nama_pemeriksa" /></td>
                    </tr>
                    <tr>
                        <td>202. Tanggal</td>
                        <td><input type="text" name="tanggal_pencacah" v-model="form.tanggal_pencacah" /></td>
                        <td><input type="text" name="tanggal_pemeriksa" v-model="form.tanggal_pemeriksa" /></td>
                    </tr>
                    <tr>
                        <td>203. Tanda Tangan</td>
                        <td><input type="text" name="ttd_pencacah" v-model="form.ttd_pencacah" /></td>
                        <td><input type="text" name="ttd_pemeriksa" v-model="form.ttd_pemeriksa" /></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Email: <input type="text" name="email_kantor_pusat" v-model="form.email_kantor_pusat">
                Fax: <input type="text" name="fax_kantor_pusat" v-model="form.fax_kantor_pusat">
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; b. Provinsi</td>
            <td>
                <input type="text" name="kode_prov_kantor_pusat" v-model="form.kode_prov_kantor_pusat">
                <input type="hidden" name="label_prov_kantor_pusat" v-model="form.label_prov_kantor_pusat">
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
            <td>
                <input type="text" name="kode_kab_kantor_pusat" v-model="form.kode_kab_kantor_pusat">
                <input type="text" name="label_kab_kantor_pusat" v-model="form.label_kab_kantor_pusat">
            </td>
        </tr>
    </table>

    <small><i>*) Coret yang tidak sesuai</i></small>
    <table style="min-width:100%">
        <tr>
            <td width="70%">
                <div class="border border-dark">
                    <small>
                        <b class="text-center">PERHATIAN</b><br/>
                        <b>- Tujuan Survei</b><br/> 
                        Memperoleh data statistik perkebunan yang dapat dipercaya dan tepat waktu untuk perencanaan pembangunan sektor perkebunan.<br/>
                        <b>-Kewenangan pengumpulan data, kerahasiaan data yang diberikan dan kewajiban memberikan jawaban</b>
                        <ul>
                            <li>Pelaksanaan survei ini berdasarkan Undang-Undang No. 16 Tahun 1997 tentang Statistik Pasal 11.</li>
                            <li>Kerahasiaan data yang diberikan dijamin oleh Undang-Undang No. 16 Tahun 1997 tentang Statistik Pasal 21.</li>
                            <li>Setiap responden wajib memberikan keterangan yang diperlukan dalam penyelenggaraan statistik dasar oleh Badan Pusat Statistik sesuai dengan Undang-Undang No. 16 Tahun 1997 tentang Statistik Pasal 27.</li>
                        </ul>
                    </small>
                </div>
            </td>
            <td>
                <small>
                Perlu bantuan atau penjelasan :<br/>
                Bila perlu bantuan atau penjelasan lebih lanjut tentang survei ini, silahkan hubungi <br/> Subdit. Statistik Perkebunan<br/>
                Jl. Dr Sutomo No. 6-8, Jakarta 10710. Telp : (021) 3810291 – 5, 3841195
                ext. 5130-5133, Fax : (021) 3857048, Email : kebun@bps.go.id
                </small>
            </td>
        </tr>
    </table>

    <br/><br/>

    <table class="table-border" style="min-width:100%">
        <tr><td colspan="16" class="text-center bg-danger"><b>III. LUAS TANAMAN, PRODUKSI DAN DISTRIBUSI PRODUKSI</b></td></tr>
        <tr><td colspan="16">301. Luas Tanaman dan Produksi</td></tr>
        <tr><td colspan="16">A. Nama Kebun, Luas Tanaman dan Produksi</td></tr>
        <tr class="text-center">
            <td rowspan="4">Nama Kebun</td>
            <td colspan="5">Bulan</td>
            <td colspan="5">Bulan</td>
            <td colspan="5">Bulan</td>
        </tr>
        <tr class="text-center">
            <td colspan="4">Luas Tanaman</td>
            <td rowspan="3">Produksi</td>
            <td colspan="4">Luas Tanaman</td>
            <td rowspan="3">Produksi</td>
            <td colspan="4">Luas Tanaman</td>
            <td rowspan="3">Produksi</td>
        </tr>
        
        <tr class="text-center">
            <td rowspan="2">TBM</td>
            <td colspan="2">TM</td>
            <td rowspan="2">TTM</td>
            <td rowspan="2">TBM</td>
            <td colspan="2">TM</td>
            <td rowspan="2">TTM</td>
            <td rowspan="2">TBM</td>
            <td colspan="2">TM</td>
            <td rowspan="2">TTM</td>
        </tr>
        
        <tr class="text-center">
            <td>TSM</td><td>TSTM</td>
            <td>TSM</td><td>TSTM</td>
            <td>TSM</td><td>TSTM</td>
        </tr>
        
        <tr class="text-center">
            <td>(1)</td><td>(2)</td><td>(3)</td><td>(4)</td><td>(5)</td><td>(6)</td><td>(7)</td><td>(8)</td>
            <td>(9)</td><td>(10)</td><td>(11)</td><td>(12)</td><td>(13)</td><td>(14)</td><td>(15)</td><td>(16)</td>
        </tr>
        
        <tr><td colspan="16">1. Kebun Sendiri/Inti</td></tr>
        @for ($i = 0; $i < 3; $i++)
            <tr>
                <td>a. ......</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endfor

        
        <tr><td colspan="16">2. Kebun Plasma yang Belum Dikonversi/Kemitraan</td></tr>
        @for ($i = 0; $i < 3; $i++)
            <tr>
                <td>a. ......</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endfor
        <tr>
            <td>3. Total</td>
            <td><input type="text" name="301_a3_total_tbm_bulan1" v-model="form['301_a3_total_tbm_bulan1']" size="3"></td>
            <td><input type="text" name="301_a3_total_tsm_bulan1" v-model="form['301_a3_total_tsm_bulan1']" size="3"></td>
            <td><input type="text" name="301_a3_total_tstm_bulan1" v-model="form['301_a3_total_tstm_bulan1']" size="3"></td>
            <td><input type="text" name="301_a3_total_ttm_bulan1" v-model="form['301_a3_total_ttm_bulan1']" size="3"></td>
            <td><input type="text" name="301_a3_total_produksi_bulan1" v-model="form['301_a3_total_produksi_bulan1']" size="3"></td>
            
            <td><input type="text" name="301_a3_total_tbm_bulan2" v-model="form['301_a3_total_tbm_bulan2']" size="3"></td>
            <td><input type="text" name="301_a3_total_tsm_bulan2" v-model="form['301_a3_total_tsm_bulan2']" size="3"></td>
            <td><input type="text" name="301_a3_total_tstm_bulan2" v-model="form['301_a3_total_tstm_bulan2']" size="3"></td>
            <td><input type="text" name="301_a3_total_ttm_bulan2" v-model="form['301_a3_total_ttm_bulan2']" size="3"></td>
            <td><input type="text" name="301_a3_total_produksi_bulan2" v-model="form['301_a3_total_produksi_bulan2']" size="3"></td>
            
            <td><input type="text" name="301_a3_total_tbm_bulan3" v-model="form['301_a3_total_tbm_bulan3']" size="3"></td>
            <td><input type="text" name="301_a3_total_tsm_bulan3" v-model="form['301_a3_total_tsm_bulan3']" size="3"></td>
            <td><input type="text" name="301_a3_total_tstm_bulan3" v-model="form['301_a3_total_tstm_bulan3']" size="3"></td>
            <td><input type="text" name="301_a3_total_ttm_bulan3" v-model="form['301_a3_total_ttm_bulan3']" size="3"></td>
            <td><input type="text" name="301_a3_total_produksi_bulan3" v-model="form['301_a3_total_produksi_bulan3']" size="3"></td>
        </tr>
        <tr>
            <td>B. Kode Bentuk Produksi</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="text" name="301_b_bulan1" v-model="form['301_b_bulan1']" size="3"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="text" name="301_b_bulan2" v-model="form['301_b_bulan2']" size="3"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="text" name="301_b_bulan3" v-model="form['301_b_bulan3']" size="3"></td>
        </tr>
        <tr>
            <td colspan="5">    C. Rendemen dari LATEKS menjadi bentuk produksi pada Rincian B kolom (6), (11), (16)</td>
            <td><input type="text" name="301_c_bulan1" v-model="form['301_c_bulan1']" size="3"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="text" name="301_c_bulan2" v-model="form['301_c_bulan2']" size="3"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="text" name="301_c_bulan3" v-model="form['301_c_bulan3']" size="3"></td>
        </tr>
        <tr>
            <td colspan="16">**) Kode Produksi (pilih salah satu) :  1. Lateks &nbsp;&nbsp;&nbsp; 2. Lateks Kering &nbsp;&nbsp;&nbsp; 3. Lump &nbsp;&nbsp;&nbsp; 4. Slab &nbsp;&nbsp;&nbsp; 5. Sit Angin</td>
        </tr>
        
        <tr>
            <td colspan="16">302. Distribusi Produksi Primer</td>
        </tr>
        
        <tr>
            <td>Uraian</td>
            <td colspan="5">Persentase Produksi Rincian 301.A.3 Kolom (6)</td>
            <td colspan="5">Persentase Produksi Rincian 301.A.3 Kolom (11)</td>
            <td colspan="5">Persentase Produksi Rincian 301.A.3 Kolom (16)</td>
        </tr>
        
        <tr>
            <td>(1)</td>
            <td colspan="5">(2)</td>
            <td colspan="5">(3)</td>
            <td colspan="5">(4)</td>
        </tr>
        
        <tr>
            <td>a.	Diolah sendiri (jika Blok I, Rincian 108 berkode 1)</td>
            <td colspan="5"><input type="text" name="302_2a" v-model="form['302_2a']" size="3"></td>
            <td colspan="5"><input type="text" name="302_3a" v-model="form['302_3a']" size="3"></td>
            <td colspan="5"><input type="text" name="302_4a" v-model="form['302_4a']" size="3"></td>
        </tr>
        
        <tr>
            <td>b. 	Dijual ke pihak lain</td>
            <td colspan="5"><input type="text" name="302_2a" v-model="form['302_2b']" size="3"></td>
            <td colspan="5"><input type="text" name="302_3a" v-model="form['302_3b']" size="3"></td>
            <td colspan="5"><input type="text" name="302_4a" v-model="form['302_4b']" size="3"></td>
        </tr>
        
        <tr>
            <td>c. 	Rusak/susut/hilang</td>
            <td colspan="5"><input type="text" name="302_2a" v-model="form['302_2c']" size="3"></td>
            <td colspan="5"><input type="text" name="302_3a" v-model="form['302_3c']" size="3"></td>
            <td colspan="5"><input type="text" name="302_4a" v-model="form['302_4c']" size="3"></td>
        </tr>
        
        <tr>
            <td>d. Jumlah</td>
            <td colspan="5">100.00</td>
            <td colspan="5">100.00</td>
            <td colspan="5">100.00</td>
        </tr>
        
        <tr>
            <td colspan="16">IV. CATATAN DAN PENGESAHAN</td>
        </tr>

        <tr>
            <td colspan="9">
                Catatan
                <textarea class="form-control" v-model="form.catatan" name="catatan" row="4"></textarea>
            </td>
            <td colspan="7">
                Diisi Dengan Sebenarnya<br/>
                <input type="text" name="diisi_di" v-model="form.diisi_di">, <input type="text" name="diisi_tanggal" v-model="form.diisi_tanggal"> <br/>
                Administratur/Pengurus <br/><br/><br/><br/>
                .........................<br/>
                (Nama jelas, tanda tangan dan stempel perusahaan)
            </td>
        </tr>
    </table>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script>
    
var vm = new Vue({  
    el: "#app_vue",
    data:  {
        form: {
            id: '', tahun: '', triwulan: '', nama_perusahaan: '', user_id: {!! json_encode(Auth::id()) !!},
            alamat: '', kode_pos: '',telp: '', email: '', fax: '',
            kode_prov: '', kode_kab: '', kode_kec: '', kode_desa: '', label_prov: '',label_kab: '',
            label_kec: '',
            label_desa: '',
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
        rincian: [],
        isi: ['satu', 'dua'],
        pathname : window.location.pathname,
    },
    computed: {
        triwulan() {
            this.setDatas();
        },
        tahun() {
            this.setDatas();
        },
    },
    watch: {
        triwulan() {
            console.log('Foo Changed!');
        },
        tahun(){
            console.log('ini tahun')
        }
    },
    methods: {
        addLogBook: function (event) {
            // var self = this;
            // if (event) {
            //     self.form_id = 0;
            //     self.form_tanggal = '';
            //     $('#form_tanggal').val(self.form_tanggal);
            //     self.form_waktu_mulai = '';
            //     self.form_waktu_selesai = '';
            //     self.form_isi = '';
            //     self.form_hasil = '';
            //     self.form_volume = '';
            //     self.form_satuan = '';
            // }
        },
        updateLogBook: function (event) {
            // var self = this;
            // if (event) {
            //     self.form_id = event.currentTarget.getAttribute('data-id');
            //     self.form_tanggal = event.currentTarget.getAttribute('data-tanggal');
            //     $('#form_tanggal').val(self.form_tanggal);
            //     self.form_waktu_mulai = event.currentTarget.getAttribute('data-waktu_mulai');
            //     self.form_waktu_selesai = event.currentTarget.getAttribute('data-waktu_selesai');
            //     self.form_isi = event.currentTarget.getAttribute('data-isi');
            //     self.form_hasil = event.currentTarget.getAttribute('data-hasil');
            //     self.form_volume = event.currentTarget.getAttribute('data-volume');
            //     self.form_satuan = event.currentTarget.getAttribute('data-satuan');
            //     self.form_pemberi_tugas = event.currentTarget.getAttribute('data-pemberi_tugas');
            // }
        },
        saveLogBook: function () {
            // var self = this;

            // if(self.form_tanggal.length==0 || self.form_waktu_mulai.length==0 || self.form_waktu_mulai.length==0 || 
            //     self.form_isi.length==0 || self.form_volume.length==0 || self.form_satuan.length==0 || 
            //     self.form_pemberi_tugas.length==0){
            //     alert("Pastikan isian tanggal, waku mulai - selesai, isi, volume, satuan dan pemberi tugas telah diisi");
            // }
            // else{
            //     if(isNaN(self.form_volume)){
            //         alert("Isian 'Volume' harus angka");    
            //     }
            //     else{
            //         $('#wait_progres').modal('show');
            //         $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')} })

            //         $.ajax({
            //             url :  self.pathname,
            //             method : 'post',
            //             dataType: 'json',
            //             data:{
            //                 id: self.form_id,
            //                 tanggal: self.form_tanggal,
            //                 waktu_mulai: self.form_waktu_mulai,
            //                 waktu_selesai: self.form_waktu_selesai, 
            //                 isi: self.form_isi, 
            //                 hasil: self.form_hasil,
            //                 volume: self.form_volume,
            //                 satuan: self.form_satuan,
            //                 pemberi_tugas: self.form_pemberi_tugas,
            //             },
            //         }).done(function (data) {
            //             $('#add_logbooks').modal('hide');
            //             self.setDatas();
            //         }).fail(function (msg) {
            //             console.log(JSON.stringify(msg));
            //             $('#wait_progres').modal('hide');
            //         });
            //     }  
            // }
        },
        setDatas: function(){
            var self = this;
            if(self.form.tahun.length>0 && self.form.triwulan.length>0){
                $('#wait_progres').modal('show');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })
                $.ajax({
                    url : self.pathname+"/"+self.form.tahun+"/"+ self.form.triwulan + "/show" ,
                    method : 'get',
                    dataType: 'json',
                }).done(function (data) {
                    console.log("masuk");
                    self.form.data = data.data;
                    self.form.rincian = data.rincian;
                    $('#wait_progres').modal('hide');
                }).fail(function (msg) {
                    console.log(JSON.stringify(msg));
                    $('#wait_progres').modal('hide');
                });
            }
        }
    }
});
</script>
@endsection