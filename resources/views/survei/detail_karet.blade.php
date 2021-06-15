@extends('layouts.admin')

@section('content')
<div class="card" id="app_vue">
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
                <select disabled name="tahun" v-model="form.tahun">
                    <option>- Pilih Tahun -</option>
                    @for($i = 2020 ;$i <= date('Y'); $i++))
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                TRIWULAN
                <select disabled name="triwulan" v-model="form.triwulan">
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
            <td><input type="text"  disabled name="nama_perusahaan" v-model="form.nama_perusahaan"></td>
            <td>103. Nama Group Perusahaan</td>
            <td><input type="text" name="nama_grup" v-model="form.nama_grup"></td>
        </tr>
        
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;a. Alamat Lengkap Administratur Kebun:<input type="text" disabled name="alamat" v-model="form.alamat"></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;a. Alamat Lengkap Group Perusahaan:<input type="text" name="alamat_grup" v-model="form.alamat_grup"></td>
        </tr>
        
        <tr>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Kode Pos: <input type="text" disabled name="kode_pos" v-model="form.kode_pos">
                &nbsp;&nbsp;&nbsp; Telepon: <input type="text" disabled name="telp" v-model="form.telp">
            </td>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Kode Pos: <input type="text" name="kode_pos_grup"  v-model="form.kode_pos_grup">
                &nbsp;&nbsp;&nbsp; Telepon: <input type="text" name="telepon_grup"  v-model="form.telepon_grup">
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Email: <input type="text" name="email" v-model="form.email">
                &nbsp;&nbsp;&nbsp; Fax: <input type="text" disabled name="fax" v-model="form.fax">
            </td>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Email: <input type="text" name="email_grup"  v-model="form.email_grup">
                &nbsp;&nbsp;&nbsp; Fax: <input type="text" name="fax_grup"  v-model="form.fax_grup">
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; b. Provinsi</td>
            <td>
                <input type="text" name="kode_prov" disabled v-model="form.kode_prov" size="4">@{{ form.label_prov }}
                <input type="hidden" name="label_prov" v-model="form.label_prov">
            </td>
            <td>&nbsp;&nbsp;&nbsp; b. Provinsi</td>
            <td>
                <select name="kode_prov_grup" v-model="form.kode_prov_grup" @change="setKab()">
                    <option v-for="v in list_grup_prov" :key="v.idProv" :value="v.idProv">
                        @{{ v.idProv }} - @{{ v.namaProv }}
                    </option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
            <td>
                <input disabled class="form-control" type="text" :value="form.kode_kab + ' - ' + form.label_kab">
            </td>
            <td>&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
            <td>
                <select name="kode_kab_grup" v-model="form.kode_kab_grup">
                    <option>- Pilih Kabupaten/Kota -</option>
                    <option v-for="v in list_grup_kab" :key="v.idKab" :value="v.idKab">
                        @{{ v.idKab }} - @{{ v.nmKab }}
                    </option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; d. Kecamatan</td>
            <td>
                <input disabled class="form-control" type="text" :value="form.kode_kec + ' - ' + form.label_kec">
            </td>
            <td>104. Status permodalan/pemilikan *)</td>
            <td>
                <select name="status_pemodalan_grup" v-model="form.status_pemodalan_grup">
                    <option value="1">1. PMDN</option>
                    <option value="2">2. PMA</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; e. Desa/Kelurahan *)</td>
            <td>
                <input disabled class="form-control" type="text" :value="form.kode_desa + ' - ' + form.label_desa">
            </td>
            <td>105. Bentuk Badan Hukum</td>
            <td>
                <select name="badan_hukum_grup" v-model="form.badan_hukum_grup">
                    <option value="">- Pilih Bentuk Badan Hukum -</option>
                    <option value="1">1. PTPN</option>
                    <option value="2">2. Perusahaan Daerah</option>
                    <option value="3">3. Persero</option>
                    <option value="4">4. Perum</option>
                    <option value="5">5. PT</option>
                    <option value="6">6. CV</option>
                    <option value="7">7. Koperasi/KUD</option>
                    <option value="8">8. Yayasan</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; f. Nama Contact Person</td>
            <td><input type="text" name="nama_contact" v-model="form.nama_contact"></td>
            <td>106. Apakah Sebagai Pelaksana Kemitraan</td>
            <td>
                <select name="apakah_pelaksana_kemitraan" v-model="form.apakah_pelaksana_kemitraan">
                    <option value="1">1. Ya</option>
                    <option value="2">2. Tidak</option>
                </select>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; g. Nomor HP/Telp.</td>
            <td><input type="text" name="nomor_hp" v-model="form.nomor_hp"></td>
            <td>107. Apakah mempunyai Kebun Plasma yang belum dikonversi</td>
            <td>
                <select name="punya_kebun_plasma" v-model="form.punya_kebun_plasma">
                    <option value="1">1. Ya</option>
                    <option value="2">2. Tidak</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td colspan="2"><b>Kondisi Perusahaan: Aktif/Tutup Sementara/Non Respon/Tidak Ditemukan *)</b></td>
            <td>108. Apakah mempunyai unit pengolahan produksi</td>
            <td>
                <select name="punya_unit_pengolahan" v-model="form.punya_unit_pengolahan">
                    <option value="1">1. Ya</option>
                    <option value="2">2. Tidak</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td>102. Nama Kantor Pusat</td>
            <td><input type="text" disabled name="nama_kantor_pusat" v-model="form.nama_kantor_pusat"></td>
            <td>109. Tahun Berdiri/Operasional Perusahaan</td>
            <td><input type="text" name="tahun_berdiri" v-model="form.tahun_berdiri"></td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; a. Alamat Lengkap Pusat</td>
            <td><input type="text" disabled name="alamat_kantor_pusat" v-model="form.alamat_kantor_pusat"></td>
            <td colspan="2" class="text-center bg-danger"><b>II. KETERANGAN PETUGAS</b></td>
        </tr>
        
        <tr>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Kode Pos: <input type="text" disabled name="kode_pos_kantor_pusat" v-model="form.kode_pos_kantor_pusat">
                Telepon: <input type="text" disabled name="telp_kantor_pusat" v-model="form.telp_kantor_pusat">
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
                Fax: <input type="text" name="fax_kantor_pusat" disabled v-model="form.fax_kantor_pusat">
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; b. Provinsi</td>
            <td>
                <input disabled class="form-control" type="text" :value="form.kode_prov_kantor_pusat + ' - ' + form.label_prov_kantor_pusat">
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
            <td>
                <input disabled class="form-control" type="text" :value="form.kode_kab_kantor_pusat + ' - ' + form.label_kab_kantor_pusat">
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
        
        <tr>
            <td colspan="16">
                1. Kebun Sendiri/Inti  &nbsp;&nbsp;
                <button class="btn btn-info btn-sm" @click="addRincian(1)">Tambah Kebun Sendiri</button>
            </td>
        </tr>
        
        <tr v-for="(item, index) in rincian1" :key="'rincian1'+index">
            <td><input type="text" v-model="item.rincian"></td>
            <td><input type="text" v-model="item.tbm1" size="3"></td>
            <td><input type="text" v-model="item.tsm1" size="3"></td>
            <td><input type="text" v-model="item.tstm1" size="3"></td>
            <td><input type="text" v-model="item.ttm1" size="3"></td>
            <td><input type="text" v-model="item.produksi1" size="3"></td>
            <td><input type="text" v-model="item.tbm2" size="3"></td>
            <td><input type="text" v-model="item.tsm2" size="3"></td>
            <td><input type="text" v-model="item.tstm2" size="3"></td>
            <td><input type="text" v-model="item.ttm2" size="3"></td>
            <td><input type="text" v-model="item.produksi2" size="3"></td>
            <td><input type="text" v-model="item.tbm3" size="3"></td>
            <td><input type="text" v-model="item.tsm3" size="3"></td>
            <td><input type="text" v-model="item.tstm3" size="3"></td>
            <td><input type="text" v-model="item.ttm3" size="3"></td>
            <td><input type="text" v-model="item.produksi3" size="3"></td>
        </tr>

        <tr>
            <td colspan="16">
                2. Kebun Plasma yang Belum Dikonversi/Kemitraan  &nbsp;&nbsp;
                <button class="btn btn-info btn-sm" @click="addRincian(2)">Tambah Kebun Plasma</button>
            </td>
        </tr>
        
        <tr v-for="(item, index) in rincian2" :key="'rincian2'+index">
            <td><input type="text" v-model="item.rincian"></td>
            <td><input type="text" v-model="item.tbm1" size="3"></td>
            <td><input type="text" v-model="item.tsm1" size="3"></td>
            <td><input type="text" v-model="item.tstm1" size="3"></td>
            <td><input type="text" v-model="item.ttm1" size="3"></td>
            <td><input type="text" v-model="item.produksi1" size="3"></td>
            <td><input type="text" v-model="item.tbm2" size="3"></td>
            <td><input type="text" v-model="item.tsm2" size="3"></td>
            <td><input type="text" v-model="item.tstm2" size="3"></td>
            <td><input type="text" v-model="item.ttm2" size="3"></td>
            <td><input type="text" v-model="item.produksi2" size="3"></td>
            <td><input type="text" v-model="item.tbm3" size="3"></td>
            <td><input type="text" v-model="item.tsm3" size="3"></td>
            <td><input type="text" v-model="item.tstm3" size="3"></td>
            <td><input type="text" v-model="item.ttm3" size="3"></td>
            <td><input type="text" v-model="item.produksi3" size="3"></td>
        </tr>

        <tr>
            <td>3. Total</td>
            <td>@{{ t301_a3_total_tbm_bulan1 }}</td>
            <td>@{{ t301_a3_total_tsm_bulan1 }}</td>
            <td>@{{ t301_a3_total_tstm_bulan1 }}</td>
            <td>@{{ t301_a3_total_ttm_bulan1 }}</td>
            <td>@{{ t301_a3_total_produksi_bulan1 }}</td>
            
            <td>@{{ t301_a3_total_tbm_bulan2 }}</td>
            <td>@{{ t301_a3_total_tsm_bulan2 }}</td>
            <td>@{{ t301_a3_total_tstm_bulan2 }}</td>
            <td>@{{ t301_a3_total_ttm_bulan2 }}</td>
            <td>@{{ t301_a3_total_produksi_bulan2 }}</td>
            
            <td>@{{ t301_a3_total_tbm_bulan3 }}</td>
            <td>@{{ t301_a3_total_tsm_bulan3 }}</td>
            <td>@{{ t301_a3_total_tstm_bulan3 }}</td>
            <td>@{{ t301_a3_total_ttm_bulan3 }}</td>
            <td>@{{ t301_a3_total_produksi_bulan3 }}</td>
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
            <td colspan="5">    C. Rendemen dari <b>TANDAN BUAH SEGAR</b> menjadi <b><i>CRUDE PALM OIL</i></b></td>
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
            <td colspan="16">**) Kode Produksi (pilih salah satu) :  1. Tandan Buah Segar (TBS) &nbsp;&nbsp;&nbsp; 2. Crude Palm Oil (CPO) &nbsp;&nbsp;&nbsp; </td>
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
                <input type="text" name="diisi_di" v-model="form.diisi_di">, <input class="datetimepicker4" id="diisi_tanggal" type="text" name="diisi_tanggal" :value="form.diisi_tanggal"> <br/>
                Administratur/Pengurus <br/><br/><br/><br/>
                <input type="text" name="diisi_administratur" v-model="form.diisi_administratur"><br/>
                (Nama jelas, tanda tangan dan stempel perusahaan)
            </td>
        </tr>
    </table>

    <div class="row">
        <template v-if="form.status_dokumen==3 || form.status_dokumen==4">
            <div class="col-md-6 text-center">
                <button class="btn btn-info" @click="sendData(4)">SIMPAN PERBAIKAN</button>
            </div>
            
            <div class="col-md-6 text-center">
                <button class="btn btn-success" @click="sendData(5)">KIRIM KE BPS</button>
            </div>
        </template>
    </div>

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
        form: {!! json_encode($model) !!},
        rincian1: {!! json_encode($rincian1) !!}, 
        rincian2: {!! json_encode($rincian2) !!},
        list_kab: [], list_pusat_kab: [], 
        list_grup_prov:  {!! json_encode($list_prov) !!},
        list_grup_kab: [],
        list_kec: [], list_desa: [],
    },
    computed: {
        pathname(){
            return window.location.pathname.replace("/"+this.form.id+"/karet", "")
        },
        t301_a3_total_tbm_bulan1(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].tbm1=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].tbm1)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].tbm1=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].tbm1)
            }
            return total
        },
        t301_a3_total_tsm_bulan1(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].tsm1=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].tsm1)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].tsm1=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].tsm1)
            }
            return total
        },
        t301_a3_total_tstm_bulan1(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].tstm1=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].tstm1)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].tstm1=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].tstm1)
            }
            return total
        },
        t301_a3_total_ttm_bulan1(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].ttm1=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].ttm1)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].ttm1=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].ttm1)
            }
            return total
        },
        t301_a3_total_produksi_bulan1(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].produksi1=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].produksi1)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].produksi1=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].produksi1)
            }
            return total
        },
        t301_a3_total_tbm_bulan2(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].tbm2=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].tbm2)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].tbm2=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].tbm2)
            }
            return total
        },
        t301_a3_total_tsm_bulan2(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].tsm2=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].tsm2)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].tsm2=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].tsm2)
            }
            return total
        },
        t301_a3_total_tstm_bulan2(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].tstm2=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].tstm2)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].tstm2=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].tstm2)
            }
            return total
        },
        t301_a3_total_ttm_bulan2(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].ttm2=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].ttm2)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].ttm2=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].ttm2)
            }
            return total
        },
        t301_a3_total_produksi_bulan2(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].produksi2=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].produksi2)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].produksi2=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].produksi2)
            }
            return total
        },
        t301_a3_total_tbm_bulan3(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].tbm3=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].tbm3)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].tbm3=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].tbm3)
            }
            return total
        },
        t301_a3_total_tsm_bulan3(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].tsm3=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].tsm3)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].tsm3=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].tsm3)
            }
            return total
        },
        t301_a3_total_tstm_bulan3(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].tstm3=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].tstm3)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].tstm3=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].tstm3)
            }
            return total
        },
        t301_a3_total_ttm_bulan3(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].ttm3=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].ttm3)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].ttm3=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].ttm3)
            }
            return total
        },
        t301_a3_total_produksi_bulan3(){
            var total = 0
            for(var i=0;i<this.rincian1.length;i++){
                if(this.rincian1[i].produksi3=='') total += 0;
                else total +=  parseFloat(this.rincian1[i].produksi3)
            }
            
            for(var i=0;i<this.rincian2.length;i++){
                if(this.rincian2[i].produksi3=='') total += 0;
                else total +=  parseFloat(this.rincian2[i].produksi3)
            }
            return total
        }
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
        sendData: function (status_data) {
            var self = this;
            $('#wait_progres').modal('show');

            var msg_error = []

            if(self.form.tahun=='') msg_error.push("Tahun Wajib Diisi")
            if(self.form.triwulan=='') msg_error.push("Triwulan Wajib Diisi")
            if(self.form.nama_perusahaan=='') msg_error.push("Nama Perusahaan Wajib Diisi")
            if(self.form.alamat=='') msg_error.push("Alamat Wajib Diisi")
            if(self.form.kode_prov=='') msg_error.push("Provinsi Perusahaan Wajib Diisi")
            if(self.form.kode_kab=='') msg_error.push("Kabupaten/Kota Perusahaan Wajib Diisi")

            var d302a = (self.form['302_2a']==null || self.form['302_2a'].length==0) ? 0 : parseFloat(self.form['302_2a']);
            var d303a = (self.form['302_3a']==null ||self.form['302_3a'].length==0) ? 0 : parseFloat(self.form['302_3a']);
            var d304a = (self.form['302_4a']==null ||self.form['302_4a'].length==0) ? 0 : parseFloat(self.form['302_4a']);
            var d302b = (self.form['302_2b']==null ||self.form['302_2b'].length==0) ? 0 : parseFloat(self.form['302_2b']);
            var d303b = (self.form['302_3b']==null ||self.form['302_3b'].length==0) ? 0 : parseFloat(self.form['302_3b']);
            var d304b = (self.form['302_4b']==null ||self.form['302_4b'].length==0) ? 0 : parseFloat(self.form['302_4b']);
            var d302c = (self.form['302_2c']==null ||self.form['302_2c'].length==0) ? 0 : parseFloat(self.form['302_2c']);
            var d303c = (self.form['302_3c']==null ||self.form['302_3c'].length==0) ? 0 : parseFloat(self.form['302_3c']);
            var d304c = (self.form['302_4c']==null ||self.form['302_4c'].length==0) ? 0 : parseFloat(self.form['302_4c']);
            if(d302a+d302b+d302c!=100) msg_error.push("Jumlah 302A tidak 100")
            if(d303a+d303b+d303c!=100) msg_error.push("Jumlah 303A tidak 100")
            if(d304a+d304b+d304c!=100) msg_error.push("Jumlah 304A tidak 100")
            
            if(msg_error.length==0){
                var data_post = self.form
                var rincian = { rincian1: self.rincian1, rincian2: self.rincian2 }
                data_post = { ...data_post, ...rincian }

                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')} })
                $.ajax({
                    url :  self.pathname+"/"+self.form.id+"/" + status_data + "/karet_send",
                    method : 'post',
                    dataType: 'json',
                    data: data_post
                }).done(function (data) {
                    $('#wait_progres').modal('hide');
                    window.location.href = self.pathname + "/index_karet"
                }).fail(function (msg) {
                    console.log(JSON.stringify(msg));
                    $('#wait_progres').modal('hide');
                    window.location.href = self.pathname + "/index_karet"
                });
            }
            else{
                $('#wait_progres').modal('hide');
                alert(msg_error.join("\n"))
            }
        },
        setKab: function(){
            $('#wait_progres').modal('show');
            var self = this;

            $.ajax({
                url :  self.pathname+"/get_kab",
                method : 'post',
                dataType: 'json',
                data:{
                    kode_prov: self.form.kode_prov_grup,
                },
            }).done(function (data) {
                self.list_grup_kab = data.result 
                $('#wait_progres').modal('hide');
            }).fail(function (msg) {
                console.log(JSON.stringify(msg));
                $('#wait_progres').modal('hide');
            });
        },
    }
});

$(document).ready(function() { 
    vm.setKab();
    $('.datetimepicker4').datetimepicker({
        format: 'DD-MM-YYYY',
        icons: {
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
        }
    });
    
    $("#diisi_tanggal").on("dp.change", function (e) {
        vm.form.diisi_tanggal = this.value;
    });
});
</script>
@endsection