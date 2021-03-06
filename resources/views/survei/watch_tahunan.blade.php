@extends('layouts.admin')

@section('content')
<div class="card" id="app_vue">
    <table style="min-width:100%">
        <tr>
            <td colspan="2"></td>
            <td class="text-center">
                <u><b>@{{ 'SKP'+form.tahun.toString().substr(2,2)+'-TAHUNAN'  }}</b></u><br/>
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
                <h4>TAHUN @{{ form.tahun }}</h4>
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
            </td>
        </tr>
    </table>

    <div class="card card-nav-tabs card-plain">
        <div class="card-header card-header-success">
            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="blok1-tab" data-toggle="tab" href="#blok1" role="tab" aria-controls="blok1" aria-selected="true">Blok I</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="blok2-tab" data-toggle="tab" href="#blok2" role="tab" aria-controls="blok2" aria-selected="false">Blok II</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="blok3-tab" data-toggle="tab" href="#blok3" role="tab" aria-controls="blok3" aria-selected="false">Blok III</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="blok4-tab" data-toggle="tab" href="#blok4" role="tab" aria-controls="blok4" aria-selected="false">Blok IV</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="blok5-tab" data-toggle="tab" href="#blok5" role="tab" aria-controls="blok5" aria-selected="false">Blok V</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="blok6-tab" data-toggle="tab" href="#blok6" role="tab" aria-controls="blok6" aria-selected="false">Blok VI</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="blok7-tab" data-toggle="tab" href="#blok7" role="tab" aria-controls="blok7" aria-selected="false">Blok VII</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="blok8-tab" data-toggle="tab" href="#blok8" role="tab" aria-controls="blok8" aria-selected="false">Blok VIII</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="blok9-tab" data-toggle="tab" href="#blok9" role="tab" aria-controls="blok9" aria-selected="false">Blok IX</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><div class="card-body ">
            <div class="tab-content">
                <div class="tab-pane show active" id="blok1" aria-labelledby="blok1-tab">
                    <table class="table-border" style="min-width:100%">
                        <tr class="bg-success text-center"><td colspan="4"><b>I. PENGENALAN TEMPAT</b></td></tr>
                        <tr>
                            <td colspan="2">1. Nama Perusahaan/Kantor Administratur </td>
                            <td colspan="2"><input type="text" v-model="form.nama_perusahaan" disabled></td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">a. Alamat Lengkap Administratur Kebun :</td>
                            <td colspan="2"><input type="text" v-model="form.alamat" disabled></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td colspan="2">&nbsp;&nbsp;&nbsp; 
                                Kode Post: <input type="text" v-model="form.kode_pos" disabled>
                            </td>
                            <td>Telepon: <input type="text" v-model="form.telp" disabled></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td colspan="2">&nbsp;&nbsp;&nbsp; Email: <input disabled type="text" v-model="form.email"></td>
                            <td>Fax: <input type="text" v-model="form.fax" disabled></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>b. Provinsi</td>
                            <td colspan="2" class="text-right"><input type="text" size="3" v-model="form.kode_prov" disabled></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>c. Kabupaten/Kota *)</td>
                            <td colspan="2" class="text-right">
                                <input disabled class="form-control" type="text" :value="form.kode_kab + ' - ' + form.label_kab">
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>d. Kecamatan</td>
                            <td colspan="2" class="text-right">
                                <input disabled class="form-control" type="text" :value="form.kode_kec + ' - ' + form.label_kec">
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>e. Desa/Kelurahan *)</td>
                            <td colspan="2" class="text-right">
                                <input disabled class="form-control" type="text" :value="form.kode_desa + ' - ' + form.label_desa">
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>f. Nama PIC &nbsp;&nbsp;<input type="text" v-model="form.nama_pic" disabled></td>
                            <td colspan="2" class="text-right">No. HP/Telepon: <input type="text" v-model="form.nomor_hp" disabled></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>g. Jabatan PIC &nbsp;&nbsp;<input type="text" v-model="form.jabatan_pic" disabled></td>
                            <td colspan="2" class="text-right">
                                Jenis Kelamin: 
                                <select v-model="form.jenis_kelamin_pic" disabled>
                                    <option value="1">Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>h. Nama bagian/divisi/unit kerja PIC</td>
                            <td colspan="2" class="text-right"><input type="text" v-model="form.nama_unit_pic" disabled></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>i. Status</td>
                            <td colspan="2" class="text-right">
                                <select v-model="form.status_usaha" disabled>
                                    <option value="1">Aktif</option>
                                    <option value="2">Tutup</option>
                                    <option value="3">Tutup Sementara</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>j. Koordinat Lokasi Perusahaan</td>
                            <td colspan="2" class="text-right">Lintang (Latitude) <input type="text" v-model="form.koordinat_lat" disabled></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td colspan="2" class="text-right">Bujur (Longitude) <input type="text" v-model="form.koordinat_long" disabled></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>k. Website Perusahaan</td>
                            <td colspan="2" class="text-right"><input type="text" v-model="form.website" disabled></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>l. Akun Media Sosial (Whatsapp/Instagram, dll)</td>
                            <td colspan="2" class="text-right"><input type="text" v-model="form.akun_medsos" disabled></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>m. KBLI (Klasifikasi Buku Lapangan Usaha Indonesia)</td>
                            <td colspan="2" class="text-right"><input type="text" v-model="form.kbli" disabled></td>
                        </tr>

                        <tr>
                            <td colspan="2">2. Nama Kantor Pusat</td>
                            <td colspan="2"><input type="text" v-model="form.nama_kantor_pusat" disabled></td>
                        </tr>
                        <tr>
                            <td></td><td >a. Alamat Lengkap Kantor Pusat :</td>
                            <td colspan="2"><input type="text" v-model="form.alamat_kantor_pusat" disabled></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">&nbsp;&nbsp;&nbsp; 
                                Kode Post: <input type="text" v-model="form.kode_pos_kantor_pusat" disabled>
                            </td>
                            <td>Telepon: <input type="text" v-model="form.telp_kantor_pusat" disabled></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td colspan="2">&nbsp;&nbsp;&nbsp; 
                                Email: <input disabled type="text" v-model="form.email_kantor_pusat">
                            </td>
                            <td>Fax: <input type="text"  v-model="form.fax_kantor_pusat" disabled></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>b. Provinsi</td>
                            <td colspan="2" class="text-right">
                                <input disabled class="form-control" type="text" :value="form.kode_prov_kantor_pusat + ' - ' + form.label_prov_kantor_pusat">
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>c. Kabupaten/Kota *)</td>
                            <td colspan="2" class="text-right">
                                <input disabled class="form-control" type="text" :value="form.kode_kab_kantor_pusat + ' - ' + form.label_kab_kantor_pusat">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">3. Nama Group Perusahaan</td>
                            <td colspan="2"><input disabled type="text" v-model="form.nama_grup"></td>
                        </tr>
                        <tr>
                            <td></td><td>a. Alamat Lengkap Group Perusahaan :</td>
                            <td colspan="2"><input disabled type="text" v-model="form.alamat_grup"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">&nbsp;&nbsp;&nbsp; 
                                Kode Post: <input disabled type="text" v-model="form.kode_pos_grup">
                            </td>
                            <td>Telepon: <input disabled type="text" v-model="form.telepon_grup"></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td colspan="2">&nbsp;&nbsp;&nbsp; 
                                Email: <input disabled type="text"  v-model="form.email_grup">
                            </td>
                            <td>Fax: <input disabled type="text" v-model="form.fax_grup"></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>b. Provinsi</td>
                            <td colspan="2" class="text-right">
                                <select disabled name="kode_prov_grup" v-model="form.kode_prov_grup" @change="setKab()">
                                    <option v-for="v in list_grup_prov" :key="v.idProv" :value="v.idProv">
                                        @{{ v.idProv }} - @{{ v.namaProv }}
                                    </option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>c. Kabupaten/Kota *)</td>
                            <td colspan="2" class="text-right">
                                <input disabled class="form-control" type="text" :value="form.kode_kab_grup + ' - ' + form.label_kab_grup">
                            </td>
                        </tr>

                        <tr><td colspan="4"></td></tr>
                        
                        <tr><td colspan="4">
                            <span class="text-center">PERHATIAN</span><br/>
                            ???	Tujuan Survei 
                                Memperoleh data statistik perkebunan yang dapat dipercaya dan tepat waktu untuk perencanaan pembangunan sektor perkebunan.
                            ???	Kewenangan pengumpulan data, kerahasiaan data yang diberikan dan kewajiban memberikan jawaban
                            ???	Pelaksanaan survei ini berdasarkan Undang-Undang No. 16 Tahun 1997 tentang Statistik Pasal 11.
                            ???	Kerahasiaan data yang diberikan dijamin oleh Undang-Undang No. 16 Tahun 1997 tentang Statistik Pasal 21.
                            ???	Setiap responden wajib memberikan keterangan yang diperlukan dalam penyelenggaraan statistik dasar oleh Badan Pusat Statistik sesuai dengan Undang-Undang No. 16 Tahun 1997 tentang Statistik Pasal 27.
                        </td></tr>

                    </table>
                </div>

                <div class="tab-pane" id="blok2" aria-labelledby="blok2-tab">
                    <table style="min-width:100%"  class="table-border">
                        <tr><td class="bg-success text-center" colspan="4"><b>II. KETERANGAN UMUM PERUSAHAAN</b></td></tr>
                        <tr>
                            <td colspan="3">1. Kondisi Perusahaan Berdasarkan Hasil Kunjungan ? (Lingkari salah satu kode yang sesuai)</td>
                            <td class="text-right">
                                <select disabled required v-model="form.kondisi_perusahaan">
                                    <option value="1">Aktif</option>
                                    <option value="2">Belum berproduksi</option>
                                    <option value="3">Tutup Sementara/Tidak ada Kegiatan</option>
                                    <option value="4">Tidak ditemukan</option>
                                    <option value="5">Tutup</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">2. Bentuk Badan Hukum Perusahaan</td>
                            <td class="text-right">
                                <select  disabled required v-model="form.badan_hukum">
                                    <!-- <option value="1">PTP Nusantara</option>
                                    <option value="2">Perusahaan Daerah</option>
                                    <option value="3">Persero</option>
                                    <option value="4">Perum</option>
                                    <option value="5">PT</option>
                                    <option value="6">CV</option>
                                    <option value="7">Koperasi/KUD</option>
                                    <option value="8">Yayasan</option> -->

                                    <option value="1">1. Persero/Perum</option>
                                    <option value="2">2. Perusahaan Daerah (PD)/Badan Usaha Milik Daerah (BUMD)</option>
                                    <option value="3">3. Perseroan Terbatas (PT)</option>
                                    <option value="4">4. Koperasi/KUD</option>
                                    <option value="5">5. Yayasan</option>
                                    <option value="6">6. Naamloze Vennotschap (NV)</option>
                                    <option value="7">7. Commanditaire Vennotschap (CV)</option>
                                    <option value="8">8. Firma</option>
                                    <option value="9">9. Perwakilan Perusahaan/Lembaga Asing</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">3. Status Permodalan (Lingkari salah satu kode yang sesuai)</td>
                            <td class="text-right">
                                <select disabled  required v-model="form.status_pemodalan">
                                    <option value="1">PMDN</option>
                                    <option value="2">PMA</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">4. Masa Berlaku SK HGU Terakhir</td>
                            <td class="text-right">
                                <input disabled required type="text" v-model="form.masa_berlaku_hgu_dari"> s/d <input disabled  required type="text"  v-model="form.masa_berlaku_hgu_sampai">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">5. Tulis Jenis Tanaman Perkebunan Tahunan dan atau Tanaman Perkebunan Semusim yang diusahakan</td>
                        </tr>
                        
                        <tr>
                            <td colspan="4">
                                <br/>
                                <div v-for="(item, index)  in rincian_tahunan" :key="'tahunan'+index">
                                    Pilih Tanaman Tahunan: 
                                    <select  disabled required v-model="item.kode_tanaman">
                                        <option>- Pilih Tanaman -</option>
                                        <option v-for="item in list_jenis_tanaman_tahunan" :key="item.kode">
                                            @{{ item.kode }} - @{{ item.label }} 
                                        </option>
                                    </select>
                                </div>
                                
                                <div v-for="(item, index)  in rincian_semusim" :key="'semusim'+index">
                                    Pilih Tanaman Semusim: 
                                    <select disabled required v-model="item.kode_tanaman">
                                        <option>- Pilih Tanaman -</option>
                                        <option v-for="item in list_jenis_tanaman_semusim" :key="item.kode">
                                            @{{ item.kode }} - @{{ item.label }} 
                                        </option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">6. Apakah Perusahaan Perkebunan ini sebagai pelaksana KEMITRAAN?</td>
                            <td class="text-right">
                                <select  disabled required v-model="form.apakah_pelaksana_kemitraan">
                                    <option value="1">Ya</option>
                                    <option value="2">Tidak</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="3">7. Apabila rincian 6 berkode 1, kemitraannya dalam bentuk bantuan:</td>
                            <td class="text-right">
                                <select disabled v-model="form.jenis_kemitraan">
                                    <option value="1">1. Penyuluhan</option>
                                    <option value="2">2. Bibit/benih</option>
                                    <option value="3">3. Pemasaran</option>
                                    <option value="4">4. Lainnya</option>
                                </select>

                                <input disabled type="text" v-model="form.jenis_kemitraan_lainnya" placeholder="keterangan jika lainnya">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">8.a. Apakah mempunyai unit pengolahan produksi?</td>
                            <td class="text-right">
                                <select  disabled required v-model="form.punya_unit_pengolahan">
                                    <option value="1">Ya</option>
                                    <option value="2">Tidak</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr><td colspan="4">8.b. Jika mempunyai unit pengolahan produksi (Rincian 8a. berkode 1), sebutkan jenis tanaman yang diolah:</td></tr>
                        
                        <tr>
                            <td colspan="4">
                                <div v-for="(item, index)  in rincian_tahunan" :key="'tahunan_diolah'+index">
                                    <select  disabled required v-model="item.tanaman_diolah">
                                        <option>- Pilih Tanaman -</option>
                                        <option v-for="item in list_jenis_tanaman_tahunan" :key="item.kode">
                                            @{{ item.kode }} - @{{ item.label }} 
                                        </option>
                                    </select>
                                </div>
                                
                                <div v-for="(item, index)  in rincian_semusim" :key="'semusim_diolah'+index">
                                    <select  disabled required v-model="item.tanaman_diolah">
                                        <option>- Pilih Tanaman -</option>
                                        <option v-for="item in list_jenis_tanaman_semusim" :key="item.kode">
                                            @{{ item.kode }} - @{{ item.label }} 
                                        </option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="tab-pane" id="blok3" aria-labelledby="blok3-tab">
                    <div v-for="(item, index)  in rincian_tahunan" :key="'tabel_tahunan'+index">
                        <hr/>
                        <span class="text-right">Jenis Tanaman Tahunan I: @{{ item.kode_tanaman }}</span>
                        <table class="table-border" style="min-width:100%">
                            <tr class="bg-success text-center">
                                <td colspan="9">III.A UMUR TANAMAN, LUAS TANAMAN, DAN PRODUKSI<br/>TANAMAN PERKEBUNAN TAHUNAN</td>
                            </tr>
                            <tr><td colspan="9">1. Umur Tanaman dan Luas Tanaman Tahun @{{ form.tahun }}</td></tr>
                            <tr>
                                <td colspan="4">a. Kebun Sendiri/Inti</td>
                                <td></td>
                                <td colspan="4">b. Kebun Plasma yang Belum Dikonversi/Kemitraan</td>
                            </tr>
                            <tr class="text-center">
                                <td>Umur Tanaman<br/>(Tahun)</td>
                                <td colspan="3">Luas Tanaman<br/>(Ha)</td>
                                <td></td>
                                <td>Umur Tanaman<br/>(Tahun)</td>
                                <td colspan="3">Luas Tanaman<br/>(Ha)</td>
                            </tr>
                            
                            <tr class="text-center">
                                <td>(1)</td>
                                <td colspan="3">(2)</td>
                                <td></td>
                                <td>(1)</td>
                                <td colspan="3">(2)</td>
                            </tr>
                            
                            <tr class="text-center">
                                <td> <5 </td><td colspan="3"><input type="text" v-model="item.luas_sendiri_5"></td>
                                <td></td>
                                <td> <5 </td><td colspan="3"><input type="text" v-model="item.luas_plasma_5"></td>
                            </tr>
                            
                            <tr class="text-center">
                                <td> 5-10 </td><td colspan="3"><input type="text" v-model="item.luas_sendiri_5_10"></td>
                                <td></td>
                                <td> 5-10 </td><td colspan="3"><input type="text" v-model="item.luas_plasma_5_10"></td>
                            </tr>
                            
                            <tr class="text-center">
                                <td> 11-25 </td><td colspan="3"><input type="text" v-model="item.luas_sendiri_11_25"></td>
                                <td></td>
                                <td> 11-25 </td><td colspan="3"><input type="text" v-model="item.luas_plasma_11_25"></td>
                            </tr>
                            
                            <tr class="text-center">
                                <td> >25 </td><td colspan="3"><input type="text" v-model="item.luas_sendiri_25"></td>
                                <td></td>
                                <td> >25 </td><td colspan="3"><input type="text" v-model="item.luas_plasma_25"></td>
                            </tr>
                            
                            <tr>
                                <td class="bg-success">Total</td>
                                <td colspan="3">@{{ customChangeFloat(item.luas_sendiri_5) + customChangeFloat(item.luas_sendiri_5_10) + customChangeFloat(item.luas_sendiri_11_25) + customChangeFloat(item.luas_sendiri_25) }}</td>
                                <td></td>
                                <td class="bg-success">Total</td>
                                <td colspan="3">@{{ customChangeFloat(item.luas_plasma_5) + customChangeFloat(item.luas_plasma_5_10) + customChangeFloat(item.luas_plasma_11_25) + customChangeFloat(item.luas_plasma_25) }}</td>
                            </tr>
                            <tr><td colspan="9">2. Nama Produk Utama yang dihasilkan tahun @{{ form.tahun }}: <input disabled type="text" v-model="item.nama_produk_utama">  <input disabled type="text" v-model="item.kbki_produk_utama" placeholder="Kode KBKI (diisi oleh BPS)"> </td></tr>
                            <tr><td colspan="9">3. Nama Kebun, Lokasi, Luas Tanaman dan Produksi Primer Tahun @{{ form.tahun }} dan Target Tahun @{{ form.tahun+1 }}</td></tr>
                            <tr  class="text-center">
                                <td colspan="2" rowspan="3">Nama Kebun dan Lokasi Kebun</td>
                                <td rowspan="3">Periode (Triwulan)</td>
                                <td colspan="4">Luas Tanaman<br/>Pada Akhir Triwulan (Ha)</td>
                                <td rowspan="3">Banyaknya<br/>Produksi Primer<br/>(Kg)</td>
                                <td rowspan="3">Nilai Produksi<br/>(000 Rp)</td>
                            </tr>
                            <tr class="text-center">
                                <td rowspan="2">TBM</td>
                                <td colspan="2">TM</td>
                                <td rowspan="2">TTM</td>
                            </tr>
                            <tr class="text-center">
                                <td>TSM</td><td>TSTM</td>
                            </tr>
                            
                            <tr class="text-center">
                                <td colspan="2">(1)</td><td>(2)</td><td>(3)</td><td>(4)</td>
                                <td>(5)</td><td>(6)</td><td>(7)</td><td>(8)</td>
                            </tr>

                            <tr>
                                <td colspan="9">
                                    a. Kebun Sendiri/Inti
                                    &nbsp;&nbsp;&nbsp; - Wujud produksi dalam bentuk: 
                                    <select disabled v-model="item.sendiri_bentuk_produksi">
                                        <option v-for="(wujud_item, index_wujud) in list_wujud_tahunan" :value="wujud_item.id" :key="'wujud_tahunan_sendiri'+index_wujud">
                                            @{{ wujud_item.jenis }} - @{{ wujud_item.wujud }}
                                        </option>
                                    </select>
                                    &nbsp;&nbsp;&nbsp; - Rata-rata rendemen: <input disabled name="text"  v-model="item.sendiri_rata_rendemen"> %
                                </td>
                            </tr>
                            
                            <template v-if="item.list_kebun_tahunan_sendiri.length>0" v-for="(item_kebun_sendiri, index2)  in item.list_kebun_tahunan_sendiri">
                                <tr><td colspan="9">@{{ index2+1 }}. Nama Kebun : <input disabled type="text" v-model="item_kebun_sendiri.nama_kebun" ></td></tr>
                                <tr class="text-center">
                                    <td rowspan="10">
                                        Provinsi:<br/>
                                        <input disabled type="text"  v-model="item_kebun_sendiri.kode_prov"><br/>
                                        Kabupaten:<br/>
                                        <input disabled type="text" v-model="item_kebun_sendiri.kode_kab"><br/>
                                        Kecamatan:<br/>
                                        <input disabled type="text" v-model="item_kebun_sendiri.kode_kec"><br/>
                                        Desa:<br/>
                                        <input disabled type="text" v-model="item_kebun_sendiri.kode_desa">
                                    </td>
                                    <td rowspan="5">Realisasi Tahun @{{ form.tahun }}</td>
                                    <td>I</td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.real1_tbm"></td><td><input disabled type="text"  v-model="item_kebun_sendiri.real1_tsm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.real1_tstm"></td><td><input disabled type="text"  v-model="item_kebun_sendiri.real1_ttm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.real1_produksi"></td><td><input disabled type="text"  v-model="item_kebun_sendiri.real1_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>II</td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.real2_tbm"></td><td><input disabled type="text"  v-model="item_kebun_sendiri.real2_tsm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.real2_tstm"></td><td><input disabled type="text"  v-model="item_kebun_sendiri.real2_ttm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.real2_produksi"></td><td><input disabled type="text"  v-model="item_kebun_sendiri.real2_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>III</td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.real3_tbm"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.real3_tsm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.real3_tstm"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.real3_ttm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.real3_produksi"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.real3_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>IV</td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.real4_tbm"></td><td><input type="text" disabled  v-model="item_kebun_sendiri.real4_tsm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.real4_tstm"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.real4_ttm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.real4_produksi"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.real4_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td colspan="5" class="bg-success">Total</td>
                                    <td>@{{ customChangeFloat(item_kebun_sendiri.real1_produksi) + customChangeFloat(item_kebun_sendiri.real2_produksi) + customChangeFloat(item_kebun_sendiri.real3_produksi) + customChangeFloat(item_kebun_sendiri.real4_produksi)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_sendiri.real1_nilai) + customChangeFloat(item_kebun_sendiri.real2_nilai) + customChangeFloat(item_kebun_sendiri.real3_nilai) + customChangeFloat(item_kebun_sendiri.real4_nilai)  }}</td>
                                </tr>

                                <tr class="text-center">
                                    <td rowspan="5">Target Tahun @{{ form.tahun+1 }}</td><td>I</td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.target1_tbm"></td><td><input disabled type="text"  v-model="item_kebun_sendiri.target1_tsm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.target1_tstm"></td><td><input disabled type="text"  v-model="item_kebun_sendiri.target1_ttm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.target1_produksi"></td><td><input disabled type="text"  v-model="item_kebun_sendiri.target1_nilai" size="3"></td>
                                </tr>

                                <tr class="text-center">
                                    <td>II</td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.target2_tbm"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.target2_tsm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.target2_tstm"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.target2_ttm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.target2_produksi"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.target2_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>III</td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.target3_tbm"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.target3_tsm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.target3_tstm"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.target3_ttm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.target3_produksi"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.target3_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>IV</td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.target4_tbm"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.target4_tsm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.target4_tstm"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.target4_ttm" size="3"></td>
                                    <td><input disabled type="text" size="3" v-model="item_kebun_sendiri.target4_produksi"></td><td><input type="text"  disabled v-model="item_kebun_sendiri.target4_nilai" size="3"></td>
                                </tr>                
                                
                                <tr class="text-center">
                                    <td colspan="5" class="bg-success">Total</td>
                                    <td>@{{ customChangeFloat(item_kebun_sendiri.target1_produksi) + customChangeFloat(item_kebun_sendiri.target2_produksi) + customChangeFloat(item_kebun_sendiri.target3_produksi) + customChangeFloat(item_kebun_sendiri.target4_produksi)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_sendiri.target1_nilai) + customChangeFloat(item_kebun_sendiri.target2_nilai) + customChangeFloat(item_kebun_sendiri.target3_nilai) + customChangeFloat(item_kebun_sendiri.target4_nilai)  }}</td>
                                </tr>
                            </template>
                            
                            <tr><td colspan="9"><button class="btn btn-info" @click="addKebunRincian(1,1,index)">Tambah Kebun Sendiri</button></td></tr>
                            <tr>
                                <td colspan="9">
                                    b. Kebun Plasma yang Belum Dikonversi/Kemitraan
                                    &nbsp;&nbsp;&nbsp; - Wujud produksi dalam bentuk: 
                                    <select v-model="item.plasma_bentuk_produksi">
                                        <option v-for="(wujud_item, index_wujud) in list_wujud_tahunan" :value="wujud_item.id" :key="'wujud_tahunan_plasma'+index_wujud">
                                            @{{ wujud_item.jenis }} - @{{ wujud_item.wujud }}
                                        </option>
                                    </select>
                                    &nbsp;&nbsp;&nbsp; - Rata-rata rendemen: <input name="text" v-model="item.plasma_rata_rendemen" > %
                                </td>
                            </tr>

                            <template v-if="item.list_kebun_tahunan_plasma.length>0" v-for="(item_kebun_plasma, index2) in item.list_kebun_tahunan_plasma">
                                <tr>
                                    <td colspan="9">@{{ index2+1 }}. Nama Kebun :
                                    <input type="text" v-model="item_kebun_plasma.nama_kebun"></td>
                                </tr>
                                <tr class="text-center">
                                    <td rowspan="10">
                                        Provinsi:<br/>
                                        <input type="text"  v-model="item_kebun_plasma.kode_prov"><br/>
                                        Kabupaten:<br/>
                                        <input type="text" v-model="item_kebun_plasma.kode_kab"><br/>
                                        Kecamatan:<br/>
                                        <input type="text" v-model="item_kebun_plasma.kode_kec"><br/>
                                        Desa:<br/>
                                        <input type="text" v-model="item_kebun_plasma.kode_desa">
                                    </td>
                                    <td rowspan="5">Realisasi Tahun @{{ form.tahun }}</td>
                                    <td>I</td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.real1_tbm"></td><td><input type="text"  v-model="item_kebun_plasma.real1_tsm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.real1_tstm"></td><td><input type="text"  v-model="item_kebun_plasma.real1_ttm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.real1_produksi"></td><td><input type="text"  v-model="item_kebun_plasma.real1_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>II</td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.real2_tbm"></td><td><input type="text"  v-model="item_kebun_plasma.real2_tsm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.real2_tstm"></td><td><input type="text"  v-model="item_kebun_plasma.real2_ttm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.real2_produksi"></td><td><input type="text"  v-model="item_kebun_plasma.real2_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>III</td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.real3_tbm"></td><td><input type="text"  v-model="item_kebun_plasma.real3_tsm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.real3_tstm"></td><td><input type="text"  v-model="item_kebun_plasma.real3_ttm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.real3_produksi"></td><td><input type="text"  v-model="item_kebun_plasma.real3_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>IV</td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.real4_tbm"></td><td><input type="text"  v-model="item_kebun_plasma.real4_tsm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.real4_tstm"></td><td><input type="text"  v-model="item_kebun_plasma.real4_ttm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.real4_produksi"></td><td><input type="text"  v-model="item_kebun_plasma.real4_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td colspan="5" class="bg-success">Total</td>
                                    <td>@{{ customChangeFloat(item_kebun_plasma.real1_produksi) + customChangeFloat(item_kebun_plasma.real2_produksi) + customChangeFloat(item_kebun_plasma.real3_produksi) + customChangeFloat(item_kebun_plasma.real4_produksi)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_plasma.real1_nilai) + customChangeFloat(item_kebun_plasma.real2_nilai) + customChangeFloat(item_kebun_plasma.real3_nilai) + customChangeFloat(item_kebun_plasma.real4_nilai)  }}</td>
                                </tr>

                                <tr class="text-center">
                                    <td rowspan="5">Target Tahun @{{ form.tahun+1 }}</td><td>I</td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.target1_tbm"></td><td><input type="text"  v-model="item_kebun_plasma.target1_tsm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.target1_tstm"></td><td><input type="text"  v-model="item_kebun_plasma.target1_ttm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.target1_produksi"></td><td><input type="text"  v-model="item_kebun_plasma.target1_nilai" size="3"></td>
                                </tr>

                                <tr class="text-center">
                                    <td>II</td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.target2_tbm"></td><td><input type="text"  v-model="item_kebun_plasma.target2_tsm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.target2_tstm"></td><td><input type="text"  v-model="item_kebun_plasma.target2_ttm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.target2_produksi"></td><td><input type="text"  v-model="item_kebun_plasma.target2_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>III</td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.target3_tbm"></td><td><input type="text"  v-model="item_kebun_plasma.target3_tsm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.target3_tstm"></td><td><input type="text"  v-model="item_kebun_plasma.target3_ttm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.target3_produksi"></td><td><input type="text"  v-model="item_kebun_plasma.target3_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>IV</td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.target4_tbm"></td><td><input type="text"  v-model="item_kebun_plasma.target4_tsm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.target4_tstm"></td><td><input type="text"  v-model="item_kebun_plasma.target4_ttm" size="3"></td>
                                    <td><input type="text" size="3" v-model="item_kebun_plasma.target4_produksi"></td><td><input type="text"  v-model="item_kebun_plasma.target4_nilai" size="3"></td>
                                </tr>                
                                
                                <tr class="text-center">
                                    <td colspan="5" class="bg-success">Total</td>
                                    <td>@{{ customChangeFloat(item_kebun_plasma.target1_produksi) + customChangeFloat(item_kebun_plasma.target2_produksi) + customChangeFloat(item_kebun_plasma.target3_produksi) + customChangeFloat(item_kebun_plasma.target4_produksi)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_plasma.target1_nilai) + customChangeFloat(item_kebun_plasma.target2_nilai) + customChangeFloat(item_kebun_plasma.target3_nilai) + customChangeFloat(item_kebun_plasma.target4_nilai)  }}</td>
                                </tr>
                            </template>
                            <tr><td colspan="9"><button class="btn btn-info" @click="addKebunRincian(1,2,index)">Tambah Kebun Plasma</button></td></tr>
                        </table>
                    </div>

                    <div v-for="(item, index)  in rincian_semusim" :key="'tabel_semusim'+index">
                        <hr/>
                        <span class="text-right">Jenis Tanaman Semusim I: @{{ item.kode_tanaman }}</span>
                        <table class="table-border" style="min-width:100%">
                            <tr class="bg-success text-center">
                                <td colspan="7">III.B LUAS TANAM, LUAS PANEN, DAN PRODUKSI<br/>TANAMAN PERKEBUNAN SEMUSIM</td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="2">Nama Kebun dan Lokasi Kebun</td>
                                <td>Periode<br/>(Triwulan)</td>
                                <td>Luas Tanam<br/>(Ha)</td>
                                <td>Luas Panen<br/>(Ha)</td>
                                <td>Banyaknya Produksi Primer<br/>(Kg)</td>
                                <td>Nilai Produksi<br/>(000 Rp)</td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    a. Kebun Sendiri/Inti
                                    &nbsp;&nbsp;&nbsp; - Wujud produksi dalam bentuk: 
                                    <select v-model="item.sendiri_bentuk_produksi">
                                        <option v-for="(wujud_item, index_wujud) in list_wujud_musiman" :value="wujud_item.id" :key="'wujud_musiman_sendiri'+index_wujud">
                                            @{{ wujud_item.jenis }} - @{{ wujud_item.wujud }}
                                        </option>
                                    </select>
                                    &nbsp;&nbsp;&nbsp; - Rata-rata rendemen: <input name="text"  v-model="item.sendiri_rata_rendemen"> %
                                </td>
                            </tr>
                        
                            <template v-if="item.list_kebun_semusim_sendiri.length>0" v-for="(item_kebun_sendiri, index2)  in item.list_kebun_semusim_sendiri">
                                <tr><td colspan="9">@{{ index2+1 }}. Nama Kebun : <input type="text" v-model="item_kebun_sendiri.nama_kebun" ></td></tr>
                                <tr class="text-center">
                                    <td rowspan="10">
                                        Provinsi:<br/>
                                        <input type="text"  v-model="item_kebun_sendiri.kode_prov"><br/>
                                        Kabupaten:<br/>
                                        <input type="text" v-model="item_kebun_sendiri.kode_kab"><br/>
                                        Kecamatan:<br/>
                                        <input type="text" v-model="item_kebun_sendiri.kode_kec"><br/>
                                        Desa:<br/>
                                        <input type="text" v-model="item_kebun_sendiri.kode_desa">
                                    </td>
                                    <td rowspan="5">Realisasi Tahun @{{ form.tahun }}</td>
                                    <td>I</td>
                                    <td><input type="text" v-model="item_kebun_sendiri.real1_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.real1_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_sendiri.real1_produksi" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.real1_nilai" size="3"></td>
                                </tr>

                                <tr class="text-center">
                                    <td>II</td>
                                    <td><input type="text" v-model="item_kebun_sendiri.real2_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.real2_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_sendiri.real2_produksi" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.real2_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>III</td>
                                    <td><input type="text" v-model="item_kebun_sendiri.real3_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.real3_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_sendiri.real3_produksi" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.real3_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>IV</td>
                                    <td><input type="text" v-model="item_kebun_sendiri.real4_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.real4_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_sendiri.real4_produksi" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.real4_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td class="bg-success">Total</td>
                                    <td>@{{ customChangeFloat(item_kebun_sendiri.real1_luas_tanam) + customChangeFloat(item_kebun_sendiri.real2_luas_tanam) + customChangeFloat(item_kebun_sendiri.real3_luas_tanam) + customChangeFloat(item_kebun_sendiri.real4_luas_tanam)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_sendiri.real1_luas_panen) + customChangeFloat(item_kebun_sendiri.real2_luas_panen) + customChangeFloat(item_kebun_sendiri.real3_luas_panen) + customChangeFloat(item_kebun_sendiri.real4_luas_panen)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_sendiri.real1_produksi) + customChangeFloat(item_kebun_sendiri.real2_produksi) + customChangeFloat(item_kebun_sendiri.real3_produksi) + customChangeFloat(item_kebun_sendiri.real4_produksi)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_sendiri.real1_nilai) + customChangeFloat(item_kebun_sendiri.real2_nilai) + customChangeFloat(item_kebun_sendiri.real3_nilai) + customChangeFloat(item_kebun_sendiri.real4_nilai)  }}</td>
                                </tr>

                                <tr class="text-center">
                                    <td rowspan="5">Target Tahun @{{ form.tahun+1 }}</td><td>I</td>
                                    <td><input type="text" v-model="item_kebun_sendiri.target1_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.target1_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_sendiri.target1_produksi" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.target1_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>II</td>
                                    <td><input type="text" v-model="item_kebun_sendiri.target2_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.target2_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_sendiri.target2_produksi" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.target2_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>III</td>
                                    <td><input type="text" v-model="item_kebun_sendiri.target3_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.target3_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_sendiri.target3_produksi" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.target3_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>IV</td>
                                    <td><input type="text" v-model="item_kebun_sendiri.target4_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.target4_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_sendiri.target4_produksi" size="3"></td><td><input type="text" v-model="item_kebun_sendiri.target4_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td class="bg-success">Total</td>
                                    <td>@{{ customChangeFloat(item_kebun_sendiri.target1_luas_tanam) + customChangeFloat(item_kebun_sendiri.target2_luas_tanam) + customChangeFloat(item_kebun_sendiri.target3_luas_tanam) + customChangeFloat(item_kebun_sendiri.target4_luas_tanam)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_sendiri.target1_luas_panen) + customChangeFloat(item_kebun_sendiri.target2_luas_panen) + customChangeFloat(item_kebun_sendiri.target3_luas_panen) + customChangeFloat(item_kebun_sendiri.target4_luas_panen)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_sendiri.target1_produksi) + customChangeFloat(item_kebun_sendiri.target2_produksi) + customChangeFloat(item_kebun_sendiri.target3_produksi) + customChangeFloat(item_kebun_sendiri.target4_produksi)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_sendiri.target1_nilai) + customChangeFloat(item_kebun_sendiri.target2_nilai) + customChangeFloat(item_kebun_sendiri.target3_nilai) + customChangeFloat(item_kebun_sendiri.target4_nilai)  }}</td>
                                </tr>
                            </template>
                            
                            <tr><td colspan="7"><button class="btn btn-info" @click="addKebunRincian(2,1,index)">Tambah Kebun Sendiri</button></td></tr>
                            
                            <tr>
                                <td colspan="7">
                                    b. Kebun Plasma yang Belum Dikonversi/Kemitraan
                                    &nbsp;&nbsp;&nbsp; - Wujud produksi dalam bentuk: 
                                    <select v-model="item.plasma_bentuk_produksi">
                                        <option v-for="(wujud_item, index_wujud) in list_wujud_musiman" :value="wujud_item.id" :key="'wujud_musiman_sendiri'+index_wujud">
                                            @{{ wujud_item.jenis }} - @{{ wujud_item.wujud }}
                                        </option>
                                    </select>
                                    &nbsp;&nbsp;&nbsp; - Rata-rata rendemen: <input type="text" v-model="item.plasma_rata_rendemen"> %
                                </td>
                            </tr>
                            
                            <template v-if="item.list_kebun_semusim_plasma.length>0" v-for="(item_kebun_plasma, index2)  in item.list_kebun_semusim_plasma">
                                <tr><td colspan="9">@{{ index2+1 }}. Nama Kebun : <input type="text" v-model="item_kebun_plasma.nama_kebun" ></td></tr>
                                <tr class="text-center">
                                    <td rowspan="10">
                                        Provinsi:<br/>
                                        <input type="text"  v-model="item_kebun_plasma.kode_prov"><br/>
                                        Kabupaten:<br/>
                                        <input type="text" v-model="item_kebun_plasma.kode_kab"><br/>
                                        Kecamatan:<br/>
                                        <input type="text" v-model="item_kebun_plasma.kode_kec"><br/>
                                        Desa:<br/>
                                        <input type="text" v-model="item_kebun_plasma.kode_desa">
                                    </td>
                                    <td rowspan="5">Realisasi Tahun @{{ form.tahun }}</td>
                                    <td>I</td>
                                    <td><input type="text" v-model="item_kebun_plasma.real1_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_plasma.real1_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_plasma.real1_produksi" size="3"></td><td><input type="text" v-model="item_kebun_plasma.real1_nilai" size="3"></td>
                                </tr>

                                <tr class="text-center">
                                    <td>II</td>
                                    <td><input type="text" v-model="item_kebun_plasma.real2_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_plasma.real2_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_plasma.real2_produksi" size="3"></td><td><input type="text" v-model="item_kebun_plasma.real2_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>III</td>
                                    <td><input type="text" v-model="item_kebun_plasma.real3_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_plasma.real3_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_plasma.real3_produksi" size="3"></td><td><input type="text" v-model="item_kebun_plasma.real3_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>IV</td>
                                    <td><input type="text" v-model="item_kebun_plasma.real4_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_plasma.real4_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_plasma.real4_produksi" size="3"></td><td><input type="text" v-model="item_kebun_plasma.real4_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td class="bg-success">Total</td>
                                    <td>@{{ customChangeFloat(item_kebun_plasma.real1_luas_tanam) + customChangeFloat(item_kebun_plasma.real2_luas_tanam) + customChangeFloat(item_kebun_plasma.real3_luas_tanam) + customChangeFloat(item_kebun_plasma.real4_luas_tanam)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_plasma.real1_luas_panen) + customChangeFloat(item_kebun_plasma.real2_luas_panen) + customChangeFloat(item_kebun_plasma.real3_luas_panen) + customChangeFloat(item_kebun_plasma.real4_luas_panen)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_plasma.real1_produksi) + customChangeFloat(item_kebun_plasma.real2_produksi) + customChangeFloat(item_kebun_plasma.real3_produksi) + customChangeFloat(item_kebun_plasma.real4_produksi)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_plasma.real1_nilai) + customChangeFloat(item_kebun_plasma.real2_nilai) + customChangeFloat(item_kebun_plasma.real3_nilai) + customChangeFloat(item_kebun_plasma.real4_nilai)  }}</td>
                                </tr>

                                <tr class="text-center">
                                    <td rowspan="5">Target Tahun @{{ form.tahun+1 }}</td><td>I</td>
                                    <td><input type="text" v-model="item_kebun_plasma.target1_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_plasma.target1_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_plasma.target1_produksi" size="3"></td><td><input type="text" v-model="item_kebun_plasma.target1_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>II</td>
                                    <td><input type="text" v-model="item_kebun_plasma.target2_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_plasma.target2_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_plasma.target2_produksi" size="3"></td><td><input type="text" v-model="item_kebun_plasma.target2_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>III</td>
                                    <td><input type="text" v-model="item_kebun_plasma.target3_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_plasma.target3_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_plasma.target3_produksi" size="3"></td><td><input type="text" v-model="item_kebun_plasma.target3_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td>IV</td>
                                    <td><input type="text" v-model="item_kebun_plasma.target4_luas_tanam" size="3"></td><td><input type="text" v-model="item_kebun_plasma.target4_luas_panen" size="3"></td>
                                    <td><input type="text" v-model="item_kebun_plasma.target4_produksi" size="3"></td><td><input type="text" v-model="item_kebun_plasma.target4_nilai" size="3"></td>
                                </tr>
                                
                                <tr class="text-center">
                                    <td class="bg-success">Total</td>
                                    <td>@{{ customChangeFloat(item_kebun_plasma.target1_luas_tanam) + customChangeFloat(item_kebun_plasma.target2_luas_tanam) + customChangeFloat(item_kebun_plasma.target3_luas_tanam) + customChangeFloat(item_kebun_plasma.target4_luas_tanam)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_plasma.target1_luas_panen) + customChangeFloat(item_kebun_plasma.target2_luas_panen) + customChangeFloat(item_kebun_plasma.target3_luas_panen) + customChangeFloat(item_kebun_plasma.target4_luas_panen)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_plasma.target1_produksi) + customChangeFloat(item_kebun_plasma.target2_produksi) + customChangeFloat(item_kebun_plasma.target3_produksi) + customChangeFloat(item_kebun_plasma.target4_produksi)  }}</td>
                                    <td>@{{ customChangeFloat(item_kebun_plasma.target1_nilai) + customChangeFloat(item_kebun_plasma.target2_nilai) + customChangeFloat(item_kebun_plasma.target3_nilai) + customChangeFloat(item_kebun_plasma.target4_nilai)  }}</td>
                                </tr>
                            </template>
                            <tr><td colspan="7"><button class="btn btn-info" @click="addKebunRincian(2,2,index)">Tambah Kebun Plasma</button></td></tr>
                        </table>
                    </div>
                </div>
                
                <div class="tab-pane" id="blok4" aria-labelledby="blok4-tab">
                    <table class="table-border" style="min-width:100%">
                        <tr class="bg-success text-center">
                            <td colspan="5">IV. PENGELUARAN UNTUK SARANA PRODUKSI YANG DIGUNAKAN UNTUK BUDAYA<br/>SELAMA TAHUN @{{ form.tahun }}</td>
                        </tr>
                        <tr class="text-center">
                            <td rowspan="2">Jenis Sarana Produksi</td>
                            <td :colspan="rincian_tahunan.length + rincian_semusim.length">Nilai Per Jenis Tanaman Perkebunan yang Diusahakan<br/>(000 Rp)</td>
                        </tr>
                        <tr class="text-center">
                            <td v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_header'+index">@{{ item.kode_tanaman }}</td>
                            <td v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_header'+index">@{{ item.kode_tanaman }}</td>
                        </tr>
                        
                        <tr>
                            <td>a. Bibit Tanaman</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_bibit'+index">
                                <input type="text" v-model="item.bibit_tanaman" size="3">
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_bibit'+index">
                                <input type="text" v-model="item.bibit_tanaman" size="3">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>b. Pupuk/Stimulan</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_pupuk'+index"></td>
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_pupuk'+index"></td>
                        </tr>
                        
                        <tr>
                            <td>(1) <input type="text" v-model="form.pupuk1"></td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_pupuka'+index">
                                <input type="text" v-model="item.pupuk1" size="3">
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_pupuka'+index">
                                <input type="text" v-model="item.pupuk1" size="3">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>(2) <input type="text" v-model="form.pupuk2"> dst</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_pupukb'+index">
                                <input type="text" v-model="item.pupuk2" size="3">
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_pupukb'+index">
                                <input type="text" v-model="item.pupuk2" size="3">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>(3) <input type="text" v-model="form.pupuk3"> dst</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_pupukc'+index">
                                <input type="text" v-model="item.pupuk3" size="3">
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_pupukc'+index">
                                <input type="text" v-model="item.pupuk3" size="3">
                            </td>
                        </tr>

                        <tr>
                            <td>c. Pestisida</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_pestisida'+index"></td>
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_pestisida'+index"></td>
                        </tr>
                        
                        <tr>
                            <td>(1) <input type="text" v-model="form.pestisida1"></td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_pestisida1'+index">
                                <input type="text" v-model="item.pestisida1" size="3">
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_pestisida1'+index">
                                <input type="text" v-model="item.pestisida1" size="3">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>(2) <input type="text" v-model="form.pestisida2"> dst</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_pestisida2'+index">
                                <input type="text" v-model="item.pestisida2" size="3">
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_pestisida2'+index">
                                <input type="text" v-model="item.pestisida2" size="3">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>(3) <input type="text" v-model="form.pestisida3"> dst</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_pestisida3'+index">
                                <input type="text" v-model="item.pestisida3" size="3">
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_pestisida3'+index">
                                <input type="text" v-model="item.pestisida3" size="3">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>d. Bahan bakar untuk budidaya perkebunan</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_bahan_bakar'+index">
                                <input type="text" v-model="item.bahan_bakar_budidaya" size="3">
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_bahan_bakar'+index">
                                <input type="text" v-model="item.bahan_bakar_budidaya" size="3">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>e. Sewa Lahan</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_sewa_lahan'+index">
                                <input type="text" v-model="item.sewa_lahan" size="3">
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_sewa_lahan'+index">
                                <input type="text" v-model="item.sewa_lahan" size="3">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>f. Sewa Alat</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_sewa_alat'+index">
                                <input type="text" v-model="item.sewa_alat" size="3">
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_sewa_alat'+index">
                                <input type="text" v-model="item.sewa_alat" size="3">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>g. Pengeluaran lainnya</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_pengeluaran_lainnya'+index">
                                <input type="text" v-model="item.pengeluaran_lainnya" size="3">
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_pengeluaran_lainnya'+index">
                                <input type="text" v-model="item.pengeluaran_lainnya" size="3">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Total (Rincian a s.d Rincian g)</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_total'+index">
                                @{{ customChangeFloat(item.bibit_tanaman) + customChangeFloat(item.pupuk1) + customChangeFloat(item.pupuk2) + customChangeFloat(item.pupuk3) + customChangeFloat(item.pestisida1) + customChangeFloat(item.pestisida2) + customChangeFloat(item.pestisida3) + customChangeFloat(item.bahan_bakar_budidaya) + customChangeFloat(item.sewa_lahan) + customChangeFloat(item.sewa_alat) + customChangeFloat(item.pengeluaran_lainnya) }}
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_total'+index">
                                @{{ customChangeFloat(item.bibit_tanaman) + customChangeFloat(item.pupuk1) + customChangeFloat(item.pupuk2) + customChangeFloat(item.pupuk3) + customChangeFloat(item.pestisida1) + customChangeFloat(item.pestisida2) + customChangeFloat(item.pestisida3) + customChangeFloat(item.bahan_bakar_budidaya) + customChangeFloat(item.sewa_lahan) + customChangeFloat(item.sewa_alat) + customChangeFloat(item.pengeluaran_lainnya) }}
                            </td>
                        </tr>
                        
                        <tr>
                            <td>h. Biaya untuk kemitraan (pupuk, benin, dll)</td>
                            <td class="text-center" v-for="(item, index)  in rincian_tahunan" :key="'pengeluaran_tahunan_biaya_kemitraan'+index">
                                <input type="text" v-model="item.biaya_kemitraan" size="3">
                            </td>
                            
                            <td class="text-center" v-for="(item, index)  in rincian_semusim" :key="'pengeluaran_semusim_biaya_kemitraan'+index">
                                <input type="text" v-model="item.biaya_kemitraan" size="3">
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="tab-pane" id="blok5" aria-labelledby="blok5-tab">
                    <table class="table-border" style="min-width:100%">
                        <tr class="bg-success text-center">
                            <td colspan="5">V. JUMLAH DAN UPAH TENAGA KERJA SELAMA TAHUN @{{ form.tahun }}</td>
                        </tr>
                        <tr class="text-center">
                            <td rowspan="2">Tenaga Kerja</td>
                            <td colspan="2">Pekerja Administrator</td>
                            <td colspan="2">Pekerja Kebun/Lapangan</td>
                        </tr>
                        <tr class="text-center">
                            <td>Banyaknya Pekerja</td>
                            <td>Upah Pekerja<br/>(000 Rp)</td>
                            <td>Banyaknya Pekerja</td>
                            <td>Upah Pekerja<br/>(000 Rp)</td>
                        </tr>
                        
                        <tr class="text-center">
                            <td>(1)</td><td>(2)</td><td>(3)</td>
                            <td>(4)</td><td>(5)</td>
                        </tr>
                        
                        <tr>
                            <td>1. Pekerja Tetap</td>
                            <td></td><td></td>
                            <td></td><td></td>
                        </tr>
                        
                        <tr>
                            <td>&nbsp &nbsp Laki-laki</td>
                            <td class="text-center"><input type="text" v-model="form.bpt_admin_laki" size="3"></td><td class="text-center"><input type="text" v-model="form.upt_admin_laki" size="3">.000</td>
                            <td class="text-center"><input type="text" v-model="form.bpt_kebun_laki" size="3"></td><td class="text-center"><input type="text" v-model="form.upt_kebun_laki" size="3">.000</td>
                        </tr>
                        
                        <tr>
                            <td>&nbsp &nbsp Perempuan</td>
                            <td class="text-center"><input type="text" v-model="form.bpt_admin_perempuan" size="3"></td><td class="text-center"><input type="text" v-model="form.upt_admin_perempuan" size="3">.000</td>
                            <td class="text-center"><input type="text" v-model="form.bpt_kebun_perempuan" size="3"></td><td class="text-center"><input type="text" v-model="form.upt_kebun_perempuan" size="3">.000</td>
                        </tr>
                        <tr>
                            <td>2. Pekerja Tidak Tetap</td>
                            <td></td><td></td>
                            <td></td><td></td>
                        </tr>
                        
                        <tr>
                            <td>&nbsp &nbsp Laki-laki</td>
                            <td class="text-center"><input type="text" v-model="form.bptt_admin_laki" size="3"></td><td class="text-center"><input type="text" v-model="form.uptt_admin_laki" size="3">.000</td>
                            <td class="text-center"><input type="text" v-model="form.bptt_kebun_laki" size="3"></td><td class="text-center"><input type="text" v-model="form.uptt_kebun_laki" size="3">.000</td>
                        </tr>
                        
                        <tr>
                            <td>&nbsp &nbsp Perempuan</td>
                            <td class="text-center"><input type="text" v-model="form.bptt_admin_perempuan" size="3"></td><td class="text-center"><input type="text" v-model="form.uptt_admin_perempuan" size="3">.000</td>
                            <td class="text-center"><input type="text" v-model="form.bptt_kebun_perempuan" size="3"></td><td class="text-center"><input type="text" v-model="form.uptt_kebun_perempuan" size="3">.000</td>
                        </tr>
                        
                        <tr>
                            <td>Total</td>
                            <td>@{{ customChangeFloat(form.bpt_admin_laki)+customChangeFloat(form.bpt_admin_perempuan)+customChangeFloat(form.bptt_admin_laki)+customChangeFloat(form.bptt_admin_perempuan) }}</td>
                            <td>@{{ customChangeFloat(form.upt_admin_laki)+customChangeFloat(form.upt_admin_perempuan)+customChangeFloat(form.uptt_admin_laki)+customChangeFloat(form.uptt_admin_perempuan) }}</td>
                            <td>@{{ customChangeFloat(form.bpt_kebun_laki)+customChangeFloat(form.bpt_kebun_perempuan)+customChangeFloat(form.bptt_kebun_laki)+customChangeFloat(form.bptt_kebun_perempuan) }}</td>
                            <td>@{{ customChangeFloat(form.upt_kebun_laki)+customChangeFloat(form.upt_kebun_perempuan)+customChangeFloat(form.uptt_kebun_laki)+customChangeFloat(form.uptt_kebun_perempuan) }}</td>
                        </tr>
                    </table>
                </div>
                
                <div class="tab-pane" id="blok6" aria-labelledby="blok6-tab">
                    <table class="table-border" style="min-width:100%">
                        <tr class="bg-success text-center">
                            <td colspan="2">VI. PENDAPATAN/PENERIMAAN PERUSAHAAN PERKEBUNAN TAHUN @{{ form.tahun }}</td>
                        </tr>
                        <tr class="text-center">
                            <td><b>Jenis Pendapatan/Penerimaan</b></td>
                            <td><b>Nilai (000 Rp)</b></td>
                        </tr>
                        <tr class="text-center">
                            <td>(1)</td><td>(2)</td>
                        </tr>
                        
                        <tr>
                            <td>
                                1. Pendapatan Bersih dari Usaha Tanaman Perkebunan { Blok IIIA R.2a jumlah tahun @{{ form.tahun }}, kol.(7) jenis tanaman tahunan I  + Blok IIIA R.2a jumlah tahun @{{ form.tahun }}, kol.(7)  jenis tanaman tahunan II + Blok IIIA R.2a jumlah tahun @{{ form.tahun }}, kol.(7)  jenis tanaman tahunan III + Blok IIIB R.a jumlah tahun @{{ form.tahun }} kol.(6) jenis tanaman semusim I + Blok IIIB R.a jumlah tahun @{{ form.tahun }} kol.(6)  jenis tanaman semusim II + Blok IIIB R.a jumlah tahun @{{ form.tahun }} kol.(6)  jenis tanaman semusim III - Blok IV Rincian total kol.(2) - Blok V Rincian Jumlah kol (3) - Blok V Rincian Jumlah kol (5) }
                            </td>
                            <td><input type="text" v-model="form.pendapatan_bersih_kebun"></td>
                        </tr>
                        
                        <tr>
                            <td>2. Pendapatan Bersih dari Usaha Pertanian Lainnya (Hortikultura, Peternakan, Perikanan, dll)</td>
                            <td><input type="text" v-model="form.pendapatan_bersih_tani_lain"></td>
                        </tr>
                        
                        <tr>
                            <td>3. Pendapatan dari Hasil Kemitraan</td>
                            <td><input type="text" v-model="form.pendapatan_hasil_kemitraan"></td>
                        </tr>
                        
                        <tr>
                            <td>4. Pendapatan Bersih dari penyewaan (Peralatan, Mesin-mesin, Transportasi, dll)</td>
                            <td><input type="text" v-model="form.pendapatan_dari_sewa"></td>
                        </tr>
                        
                        <tr>
                            <td>5. Pendapatan Bersih dari penjualan bibit</td>
                            <td><input type="text" v-model="form.pendapatan_jual_bibit"></td>
                        </tr>
                        
                        <tr>
                            <td>6. Pendapatan Bersih Lainnya</td>
                            <td><input type="text" v-model="form.pendapatan_bersih_lain"></td>
                        </tr>
                        
                        <tr>
                            <td>7. Total (R1 s.d R6)</td>
                            <td>@{{ customChangeFloat(form.pendapatan_bersih_kebun)+customChangeFloat(form.pendapatan_bersih_tani_lain)
                                +customChangeFloat(form.pendapatan_hasil_kemitraan)+customChangeFloat(form.pendapatan_dari_sewa)
                                +customChangeFloat(form.pendapatan_jual_bibit)+customChangeFloat(form.pendapatan_bersih_lain) }}</td>
                        </tr>
                    </table>
                </div>
                
                <div class="tab-pane" id="blok7" aria-labelledby="blok7-tab">
                    <table class="table-border" style="min-width:100%">
                        <tr class="bg-success text-center">
                            <td>VII. CATATAN</td>
                        </tr>
                        <tr>
                            <td><textarea class="form form-control" v-model="form.catatan"></textarea></td>
                        </tr>
                    </table>
                </div>
                
                <div class="tab-pane" id="blok8" aria-labelledby="blok8-tab">
                    <table class="table-border" style="min-width:100%">
                        <tr class="bg-success text-center">
                            <td colspan="4">VIII. KETERANGAN PENCACAHAN</td>
                        </tr>
                        <tr>
                            <td>1. Nama Pencacah : </td>
                            <td><input type="text" disabled v-model="form.nama_pencacah"></td>
                            <td>1. Nama Pemeriksa : </td>
                            <td><input type="text" disabled v-model="form.nama_pemeriksa"></td>
                        </tr>
                        
                        <tr>
                            <td>2. Tanggal Pencacahan : </td>
                            <td><input type="text" disabled v-model="form.tanggal_pencacah"></td>
                            <td>2. Tanggal Pemeriksaan : </td>
                            <td><input type="text" disabled v-model="form.tanggal_pemeriksa"></td>
                        </tr>
                        
                        <tr>
                            <td>3. Tanda Tangan</td><td></td><td>3. Tanda Tangan</td><td></td>
                        </tr>
                    </table>
                </div>
                
                <div class="tab-pane" id="blok9" aria-labelledby="blok9-tab">
                    <table class="table-border" style="min-width:100%">
                        <tr class="bg-success text-center">
                            <td>IX. PENGESAHAN</td>
                        </tr>
                        <tr>
                            <td>
                                Diisi dengan sebenarnya di : <input type="text" v-model="form.diisi_di">. 
                                Pada Tanggal : <input type="text" id="diisi_tanggal" class="datetimepicker4" :value="form.diisi_tanggal"><br/>
                                &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp  Nama Administratur/Pengurus Perkebunan<input type="text" v-model="form.diisi_administratur"><br/>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
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
        list_jenis_tanaman_tahunan:[
            {kode: 3101, label: 'Aren/Enau', jenis: 1},
            {kode: 3102, label: 'Asam Jawa', jenis: 1},
            {kode: 3103, label: 'Cengkeh', jenis: 1},
            {kode: 3104, label: 'Gambir', jenis: 1},
            {kode: 3105, label: 'Jambu Mete', jenis: 1},
            {kode: 3106, label: 'Jarak Pagar', jenis: 1},
            {kode: 3107, label: 'Kakao', jenis: 1},
            {kode: 3108, label: 'Kapok', jenis: 1},
            {kode: 3109, label: 'Karet', jenis: 1},
            {kode: 3110, label: 'Kayu Manis', jenis: 1},
            {kode: 3111, label: 'Kelapa Sawit', jenis: 1},
            {kode: 3112, label: 'Kelapa', jenis: 1},
            {kode: 3113, label: 'Kemenyan', jenis: 1},
            {kode: 3114, label: 'Kemiri', jenis: 1},
            {kode: 3115, label: 'Kemiri Sunan', jenis: 1},
            {kode: 3116, label: 'Kenanga', jenis: 1},
            {kode: 3117, label: 'Kina', jenis: 1},
            {kode: 3118, label: 'Klerek', jenis: 1},
            {kode: 3119, label: 'Kopi', jenis: 1},
            {kode: 3120, label: 'Lada', jenis: 1},
            {kode: 3121, label: 'Lontar', jenis: 1},
            {kode: 3122, label: 'Murbai', jenis: 1},
            {kode: 3123, label: 'Panili/Vanili', jenis: 1},
            {kode: 3124, label: 'Pala', jenis: 1},
            {kode: 3125, label: 'Pandan Anyaman', jenis: 1},
            {kode: 3126, label: 'Pinang/Jambe', jenis: 1},
            {kode: 3127, label: 'Sagu', jenis: 1},
            {kode: 3128, label: 'Soga', jenis: 1},
            {kode: 3129, label: 'Teh', jenis: 1},
            {kode: 3199, label: 'Tahunan Lainnya', jenis: 1},
        ],
        list_jenis_tanaman_semusim:[
            {kode: 3201, label: 'Abaca/Manila', jenis: 2},
            {kode: 3202, label: 'Akar Wangi', jenis: 2},
            {kode: 3203, label: 'Jute', jenis: 2},
            {kode: 3204, label: 'Kapas', jenis: 2},
            {kode: 3205, label: 'Kenaf', jenis: 2},
            {kode: 3206, label: 'Nilam', jenis: 2},
            {kode: 3207, label: 'Rami/Haramay', jenis: 2},
            {kode: 3208, label: 'Rosela', jenis: 2},
            {kode: 3209, label: 'Sereh Wangi', jenis: 2},
            {kode: 3210, label: 'Tebu', jenis: 2},
            {kode: 3211, label: 'Tembakau', jenis: 2},
            {kode: 3299, label: 'Semusim Lainnya', jenis: 2}
        ],
        list_wujud_tahunan: [
            {id: 1, jenis: 'Cengkeh Ambon', wujud: "Bunga Basah"},
            {id: 2, jenis: 'Cengkeh Zanibar', wujud: "Bunga Basah"},
            {id: 3, jenis: 'Jambu Mete', wujud: "Biji Basah"},
            {id: 4, jenis: 'Kakao', wujud: "Buah masa/glondong"},
            {id: 5, jenis: 'Kapok', wujud: "Buah kapok kering"},
            {id: 6, jenis: 'Karet', wujud: "Lateks"},
            {id: 7, jenis: 'Kayu Manis', wujud: "Kulit Batang Basah"},
            {id: 8, jenis: 'Kelapa Sawit', wujud: "Tandan Buah Segar (TBS)"},
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
            {id: 8, jenis: 'Tembakau', wujud: "Tandan Buah Segar (TBS)"},
            {id: 9, jenis: 'Yute', wujud: "Buah Kelapa"},
            {id: 10, jenis: 'Nilam', wujud: "Buah Kelapa"},
        ],
        rincian_tahunan: {!! json_encode($rincian_tahunan) !!}, 
        rincian_semusim: {!! json_encode($rincian_semusim) !!},
        list_kab: [], list_pusat_kab: [], 
        list_grup_prov:  {!! json_encode($list_prov) !!},
        list_grup_kab: [],
        list_kec: [], list_desa: [],
        form: {!! json_encode($model) !!},
    },
    computed: {
        tahun() { return this.form.tahun },
        pathname(){ return window.location.pathname.replace("/" + this.form.tahun + "/watch_tahunan", "") } ,
    },
    methods: {
        customChangeFloat: function(nilai){
            if(isNaN(parseFloat(nilai))) return 0
            else return parseFloat(nilai)
        },
        setDatas: function(){
            var self = this;
            if(self.form.tahun.toString().length>0){
                $('#wait_progres').modal('show');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })
                $.ajax({
                    url : self.pathname+"/tahunan/"+self.form.tahun + "/show" ,
                    method : 'get',
                    dataType: 'json',
                }).done(function (data) {
                    if(data.data!=null){
                        self.form = data.data;
                        self.rincian_tahunan = data.rincian_tahunan;
                        self.rincian_semusim = data.rincian_semusim;
                        console.log("wooii")
                        console.log(data);
                        vm.setKab();
                    }

                    $('#wait_progres').modal('hide');
                }).fail(function (msg) {
                    console.log(JSON.stringify(msg));
                    $('#wait_progres').modal('hide');
                });
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