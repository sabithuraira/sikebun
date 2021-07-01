<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="{{ asset('css/print_pdf.css') }}" rel="stylesheet">
    </head>

    <body>
        <table width="100%">
            <tr>
                <td colspan="2"></td>
                <td align="center">
                    <u><b>SKP{{ substr($model->tahun,2,2) }}-TAHUNAN</b></u><br/>
                    <br>ADMINISTRATUR KEBUN</br>
                </td>
            </tr>
            <tr align="center">
                <td width="25%">
                    <img src="{{ asset('img') }}/logobps.png" width="130" />
                </td>
                <td width="50%">
                    <img src="{{ asset('img') }}/garuda.png" width="55" />
                    <p>REPUBLIK INDONESIA</p>
                </td>
                <td></td>
            </tr>
            
            <tr align="center">
                <td colspan="3">
                    <h3>SURVEI PERUSAHAAN PERKEBUNAN TAHUNAN</h3>
                    <h3>TAHUN {{ $model->tahun }}</h3>
                </td>
            </tr>
            
            <tr>
                <td>RAHASIA</td>
                <td colspan="2" align="right">TAHUN {{ $model->tahun }}</td>
            </tr>
        </table>

        <table class="table-border border-green" width="100%">
            <tr class="bg-green" align="center">
                <td colspan="4"><b>I. PENGENALAN TEMPAT</b></td>
            </tr>
            <tr>
                <td colspan="2">1. Nama Perusahaan/Kantor Administratur </td>
                <td colspan="2">{{ $model->nama_perusahaan }}</td>
            </tr>
            <tr>
                <td colspan="2" class="table-woborderrl">&nbsp;&nbsp;&nbsp; a. Alamat Lengkap Administratur Kebun :</td>
                <td colspan="2" class="table-woborderrl">{{ $model->alamat }}</td>
            </tr>
            <tr>
                <td colspan="2" class="table-woborderrl">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Kode Post: {{ $model->kode_pos }}</td>
                <td colspan="2" class="table-woborderrl">Telepon: {{ $model->telp }}</td>
            </tr>
            
            <tr>
                <td colspan="2" class="table-woborderrl">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Email: {{ $model->email }}</td>
                <td colspan="2" class="table-woborderrl">Fax: {{ $model->fax }}</td>
            </tr>
            
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp; b. Provinsi</td>
                <td colspan="2" align="right">{{ $model->kode_prov }} - {{ $model->label_prov }}</td>
            </tr>
            
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
                <td colspan="2" align="right">
                    {{ $model->kode_kab }} - {{ $model->label_kab }}
                </td>
            </tr>
            
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp; d. Kecamatan</td>
                <td colspan="2" align="right">
                    {{ $model->kode_kec }} - {{ $model->label_kec }}
                </td>
            </tr>
            
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp; e. Desa/Kelurahan *)</td>
                <td colspan="2" align="right">
                    {{ $model->kode_desa }} - {{ $model->label_desa }}
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;  f. Nama Contact Person</td>
                <td colspan="2" align="right">{{ $model->nama_contact }}</td>
            </tr>
            
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp; g. Nomor HP/Telp</td>
                <td colspan="2" align="right">{{ $model->nomor_hp }}</td>
            </tr>

            <tr>
                <td colspan="2">2. Nama Kantor Pusat</td>
                <td colspan="2">{{ $model->nama_kantor_pusat }}</td>
            </tr>
            <tr>
                <td colspan="2" class="table-woborderrl">&nbsp;&nbsp;&nbsp; a. Alamat Lengkap Kantor Pusat :</td>
                <td colspan="2" class="table-woborderrl">{{ $model->alamat_kantor_pusat }}</td>
            </tr>
            <tr>
                <td colspan="2" class="table-woborderrl">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                    Kode Post: {{ $model->kode_pos_kantor_pusat }}
                </td>
                <td colspan="2" class="table-woborderrl">Telepon: {{ $model->telp_kantor_pusat }}</td>
            </tr>
            
            <tr>
                <td colspan="2" class="table-woborderrl">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                    Email: {{ $model->email_kantor_pusat }}
                </td>
                <td colspan="2" class="table-woborderrl">Fax: {{ $model->fax_kantor_pusat }}</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp; b. Provinsi</td>
                <td colspan="2" align="right">
                    {{ $model->kode_prov_kantor_pusat }} - {{ $model->label_prov_kantor_pusat }}
                </td>
            </tr>
            
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
                <td colspan="2" align="right">
                    {{ $model->kode_kab_kantor_pusat }} - {{ $model->label_kab_kantor_pusat }}
                </td>
            </tr>

            <tr>
                <td colspan="2">3. Nama Group Perusahaan</td>
                <td colspan="2">{{ $model->nama_grup }}</td>
            </tr>
            <tr>
                <td colspan="2" class="table-woborderrl">&nbsp;&nbsp;&nbsp; a. Alamat Lengkap Group Perusahaan :</td>
                <td colspan="2" class="table-woborderrl">{{ $model->alamat_grup }}</td>
            </tr>
            <tr>
                <td colspan="2" class="table-woborderrl">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                    Kode Post: {{ $model->kode_pos_grup }}
                </td>
                <td colspan="2" class="table-woborderrl">Telepon: {{ $model->telepon_grup }}</td>
            </tr>
            
            <tr>
                <td colspan="2" class="table-woborderrl">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                    Email: {{ $model->email_grup }}
                </td>
                <td colspan="2" class="table-woborderrl">Fax: {{ $model->fax_grup }}</td>
            </tr>
            
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp; b. Provinsi</td>
                <td colspan="2" align="right">
                    {{ $model->kode_prov_grup }} - {{ $model->label_prov_grup }}
                </td>
            </tr>
            
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
                <td colspan="2" align="right">
                    {{ $model->kode_kab_grup }} - {{ $model->label_kab_grup }}
                </td>
            </tr>
        </table>

        <i class="small-text">*) Coret yang tidak sesuai</i>
        <table width="100%">
            <tr>
                <td>
                    <div class="table-border border-green">
                        <small class="small-text">
                            <b align="center" class="small-text">PERHATIAN</b><br/>
                            <b class="small-text">- Tujuan Survei</b><br/> 
                            <span class="small-text">Memperoleh data statistik perkebunan yang dapat dipercaya dan tepat waktu untuk perencanaan pembangunan sektor perkebunan.</span><br/>
                            <b class="small-text">-Kewenangan pengumpulan data, kerahasiaan data yang diberikan dan kewajiban memberikan jawaban</b>
                            <ul>
                                <li class="small-text">Pelaksanaan survei ini berdasarkan Undang-Undang No. 16 Tahun 1997 tentang Statistik Pasal 11.</li>
                                <li class="small-text">Kerahasiaan data yang diberikan dijamin oleh Undang-Undang No. 16 Tahun 1997 tentang Statistik Pasal 21.</li>
                                <li class="small-text">Setiap responden wajib memberikan keterangan yang diperlukan dalam penyelenggaraan statistik dasar oleh Badan Pusat Statistik sesuai dengan Undang-Undang No. 16 Tahun 1997 tentang Statistik Pasal 27.</li>
                            </ul>
                        </small>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <small class="border border-dark small-text">
                        Perlu bantuan atau penjelasan :<br/>
                        Bila perlu bantuan atau penjelasan lebih lanjut tentang survei ini, silahkan hubungi <br/> Subdit. Statistik Perkebunan<br/>
                        Jl. Dr Sutomo No. 6-8, Jakarta 10710. Telp : (021) 3810291 – 5, 3841195
                        ext. 5130-5133, Fax : (021) 3857048, Email : kebun@bps.go.id
                        </small>
                </td>
            </tr>
        </table>
        
        <div class="page-break"></div>
        <table style="min-width:100%"  class="table-border">
            <tr><td class="bg-green" align="center" colspan="4"><b>II. KETERANGAN UMUM PERUSAHAAN</b></td></tr>
            <tr>
                <td colspan="3">1. Kondisi Perusahaan Berdasarkan Hasil Kunjungan ? (Lingkari salah satu kode yang sesuai)</td>
                <td align="right">
                    @if($model->kondisi_perusahaan==1)
                        Aktif
                    @elseif($model->kondisi_perusahaan==2)
                        Belum berproduksi
                    @elseif($model->kondisi_perusahaan==3)
                        Tutup Sementara/Tidak Ada Kegiatan
                    @elseif($model->kondisi_perusahaan==4)
                        Tidak Ditemukan
                    @elseif($model->kondisi_perusahaan==5)
                        Tutup
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="3">2. Bentuk Badan Hukum Perusahaan</td>
                <td align="right">
                    @if($model->badan_hukum==1)
                        PTP Nusantara
                    @elseif($model->badan_hukum==2)
                        Perusahaan Daerah
                    @elseif($model->badan_hukum==3)
                        Persero
                    @elseif($model->badan_hukum==4)
                        Perum
                    @elseif($model->badan_hukum==5)
                        PT
                    @elseif($model->badan_hukum==6)
                        CV
                    @elseif($model->badan_hukum==7)
                        Koperasi/KUD
                    @elseif($model->badan_hukum==8)
                        Yayasan
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="3">3. Status Permodalan (Lingkari salah satu kode yang sesuai)</td>
                <td align="right">
                    @if($model->status_pemodalan==1)
                        PMDN
                    @elseif($model->status_pemodalan==2)
                        PMA
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="3">4. Masa Berlaku SK HGU Terakhir</td>
                <td align="right">{{ $model->masa_berlaku_hgu_dari }} s/d {{ $model->masa_berlaku_hgu_sampai }}
                </td>
            </tr>
            <tr>
                <td colspan="4">5. Tulis Jenis Tanaman Perkebunan Tahunan dan atau Tanaman Perkebunan Semusim yang diusahakan</td>
            </tr>
            
            <tr>
                <td colspan="4">
                    <br/>
                    Tanaman Tahunan: 
                    <ul>
                        @foreach($rincian_tahunan as $key=>$value)
                            <li>{{ $value->kode_tanaman }}</li>
                        @endforeach
                    </ul>
                    
                    Tanaman Semusim:
                    <ul>
                        @foreach($rincian_semusim as $key=>$value)
                            <li>{{ $value->kode_tanaman }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="3">6. Apakah Perusahaan Perkebunan ini sebagai pelaksana KEMITRAAN?</td>
                <td align="right">
                    @if($model->apakah_pelaksana_kemitraan==1)
                        Ya
                    @elseif($model->apakah_pelaksana_kemitraan==2)
                        Tidak
                    @endif
                </td>
            </tr>
            
            <tr>
                <td colspan="3">7. Apabila rincian 6 berkode 1, kemitraannya dalam bentuk bantuan:</td>
                <td align="right">                
                    @if($model->jenis_kemitraan==1)
                        1. Penyuluhan
                    @elseif($model->jenis_kemitraan==2)
                        2. Bibit/benih
                    @elseif($model->jenis_kemitraan==3)
                        3. Pemasaran
                    @elseif($model->jenis_kemitraan==4)
                        4. Lainnya
                    @endif

                    <p>Keterangan jika lainnya: {{ $model->jenis_kemitraan_lainnya }}</p>
                </td>
            </tr>

            <tr>
                <td colspan="3">8.a. Apakah mempunyai unit pengolahan produksi?</td>
                <td align="right">
                    @if($model->punya_unit_pengolahan==1)
                        Ya
                    @elseif($model->punya_unit_pengolahan==2)
                        Tidak
                    @endif
                </td>
            </tr>
            
            <tr>
                <td colspan="4">
                    <p>8.b. Jika mempunyai unit pengolahan produksi (Rincian 8a. berkode 1), sebutkan jenis tanaman yang diolah:</p>
                    @if(count($rincian_tahunan)>0 || count($rincian_semusim)>0)
                        <ul>
                            @foreach($rincian_tahunan as $key=>$value)
                                <li>{{ $value->tanaman_diolah }}</li>
                            @endforeach

                            @foreach($rincian_semusim as $key=>$value)
                                <li>{{ $value->tanaman_diolah }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
            </tr>
        </table>

        @foreach($rincian_tahunan as $key=>$value)
            <div class="page-break"></div>
            <span align="right">Jenis Tanaman Tahunan I: {{ $value->kode_tanaman }}</span>
            <table class="table-border" style="min-width:100%">
                <tr class="bg-green" align="center">
                    <td colspan="9">III.A UMUR TANAMAN, LUAS TANAMAN, DAN PRODUKSI<br/>TANAMAN PERKEBUNAN TAHUNAN</td>
                </tr>
                <tr><td colspan="9">1. Umur Tanaman dan Luas Tanaman Tahun {{ $model->tahun }}</td></tr>
                <tr>
                    <td colspan="4">a. Kebun Sendiri/Inti</td>
                    <td class="bg-green"></td>
                    <td colspan="4">b. Kebun Plasma yang Belum Dikonversi/Kemitraan</td>
                </tr>
                <tr align="center">
                    <td>Umur Tanaman<br/>(Tahun)</td>
                    <td colspan="3">Luas Tanaman<br/>(Ha)</td>
                    <td class="bg-green"></td>
                    <td>Umur Tanaman<br/>(Tahun)</td>
                    <td colspan="3">Luas Tanaman<br/>(Ha)</td>
                </tr>
                
                <tr align="center">
                    <td>(1)</td>
                    <td colspan="3">(2)</td>
                    <td class="bg-green"></td>
                    <td>(1)</td>
                    <td colspan="3">(2)</td>
                </tr>
                
                <tr align="center">
                    <td> &lt;5 </td><td colspan="3">{{ $value->luas_sendiri_5 }}</td>
                    <td class="bg-green"></td>
                    <td> &lt;5 </td><td colspan="3">{{ $value->luas_plasma_5 }}</td>
                </tr>
                
                <tr align="center">
                    <td> 5-10 </td><td colspan="3">{{ $value->luas_sendiri_5_10  }}</td>
                    <td class="bg-green"></td>
                    <td> 5-10 </td><td colspan="3">{{ $value->luas_plasma_5_10  }}</td>
                </tr>
                
                <tr align="center">
                    <td> 11-25 </td><td colspan="3">{{ $value->luas_sendiri_11_25  }}</td>
                    <td class="bg-green"></td>
                    <td> 11-25 </td><td colspan="3">{{ $value->luas_plasma_11_25  }}</td>
                </tr>

                @php 
                    function customChangeFloat($nilai){
                        if(is_numeric($nilai))
                            return (float)$nilai;
                        else 
                            return 0;
                    }
                @endphp
                
                <tr align="center">
                    <td> >25 </td><td colspan="3">{{ $value->luas_sendiri_25 }}</td>
                    <td class="bg-green"></td>
                    <td> >25 </td><td colspan="3">{{ $value->luas_plasma_25 }}</td>
                </tr>
                
                <tr>
                    <td class="bg-green">Total</td>
                    <td colspan="3" align="center">{{ customChangeFloat($value->luas_sendiri_5) + customChangeFloat($value->luas_sendiri_5_10) + customChangeFloat($value->luas_sendiri_11_25) + customChangeFloat($value->luas_sendiri_25) }}</td>
                    <td class="bg-green"></td>
                    <td class="bg-green">Total</td>
                    <td colspan="3" align="center">{{ customChangeFloat($value->luas_plasma_5) + customChangeFloat($value->luas_plasma_5_10) + customChangeFloat($value->luas_plasma_11_25) + customChangeFloat($value->luas_plasma_25) }}</td>
                </tr>
                <tr><td colspan="9">2. Nama Kebun, Lokasi, Luas Tanaman dan Produksi Primer Tahun {{ $model->tahun }} dan Target Tahun {{ $model->tahun+1 }}</td></tr>
                <tr  align="center">
                    <td colspan="2" rowspan="3">Nama Kebun dan Lokasi Kebun</td>
                    <td rowspan="3">Periode (Triwulan)</td>
                    <td colspan="4">Luas Tanaman<br/>Pada Akhir Triwulan (Ha)</td>
                    <td rowspan="3">Banyaknya<br/>Produksi Primer<br/>(Kg)</td>
                    <td rowspan="3">Nilai Produksi<br/>(000 Rp)</td>
                </tr>
                <tr align="center">
                    <td rowspan="2">TBM</td>
                    <td colspan="2">TM</td>
                    <td rowspan="2">TTM</td>
                </tr>
                <tr align="center">
                    <td>TSM</td><td>TSTM</td>
                </tr>
                
                <tr align="center">
                    <td colspan="2">(1)</td><td>(2)</td><td>(3)</td><td>(4)</td>
                    <td>(5)</td><td>(6)</td><td>(7)</td><td>(8)</td>
                </tr>

                <tr>
                    <td colspan="9">
                        a. Kebun Sendiri/Inti
                        <p>&nbsp;&nbsp;&nbsp; - Wujud produksi dalam bentuk: 
                        {{ $list_wujud_tahunan[$value->sendiri_bentuk_produksi]['jenis'] }} - 
                        {{ $list_wujud_tahunan[$value->sendiri_bentuk_produksi]['wujud'] }}</p>
                        <p>&nbsp;&nbsp;&nbsp; - Rata-rata rendemen: {{ $value->sendiri_rata_rendemen }} %</p>
                    </td>
                </tr>

                @foreach($value->getList_kebun_tahunan_sendiriAttribute() as $index2=>$item_kebun_sendiri)
                    <tr><td colspan="9">{{ $index2+1 }}. Nama Kebun : {{ $item_kebun_sendiri->nama_kebun }}</td></tr>
                    <tr align="center">
                        <td rowspan="10">
                            Provinsi:<br/>
                            {{ $item_kebun_sendiri->kode_prov }}<br/>
                            Kabupaten:<br/>
                            {{ $item_kebun_sendiri->kode_kab }}<br/>
                            Kecamatan:<br/>
                            {{ $item_kebun_sendiri->kode_kec }}<br/>
                            Desa:<br/>
                            {{ $item_kebun_sendiri->kode_desa }}
                        </td>
                        <td rowspan="5">Realisasi Tahun {{ $model->tahun }}</td>
                        <td>I</td>
                        <td>{{ $item_kebun_sendiri->real1_tbm }}</td><td>{{ $item_kebun_sendiri->real1_tsm }}</td>
                        <td>{{ $item_kebun_sendiri->real1_tstm }}</td><td>{{ $item_kebun_sendiri->real1_ttm }}</td>
                        <td>{{ $item_kebun_sendiri->real1_produksi }}</td><td>{{ $item_kebun_sendiri->real1_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>II</td>
                        <td>{{ $item_kebun_sendiri->real2_tbm }}</td><td>{{ $item_kebun_sendiri->real2_tsm }}</td>
                        <td>{{ $item_kebun_sendiri->real2_tstm }}</td><td>{{ $item_kebun_sendiri->real2_ttm }}</td>
                        <td>{{ $item_kebun_sendiri->real2_produksi }}</td><td>{{ $item_kebun_sendiri->real2_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>III</td>
                        <td>{{ $item_kebun_sendiri->real3_tbm }}</td><td>{{ $item_kebun_sendiri->real3_tsm }}</td>
                        <td>{{ $item_kebun_sendiri->real3_tstm }}</td><td>{{ $item_kebun_sendiri->real3_ttm }}</td>
                        <td>{{ $item_kebun_sendiri->real3_produksi }}</td><td>{{ $item_kebun_sendiri->real3_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>IV</td>
                        <td>{{ $item_kebun_sendiri->real4_tbm }}</td><td>{{ $item_kebun_sendiri->real4_tsm }}</td>
                        <td>{{ $item_kebun_sendiri->real4_tstm }}</td><td>{{ $item_kebun_sendiri->real4_ttm }}</td>
                        <td>{{ $item_kebun_sendiri->real4_produksi }}</td><td>{{ $item_kebun_sendiri->real4_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td colspan="5" class="bg-green">Total</td>
                        <td>{{ customChangeFloat($item_kebun_sendiri->real1_produksi) + customChangeFloat($item_kebun_sendiri->real2_produksi) + customChangeFloat($item_kebun_sendiri->real3_produksi) + customChangeFloat($item_kebun_sendiri->real4_produksi)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_sendiri->real1_nilai) + customChangeFloat($item_kebun_sendiri->real2_nilai) + customChangeFloat($item_kebun_sendiri->real3_nilai) + customChangeFloat($item_kebun_sendiri->real4_nilai)  }}</td>
                    </tr>

                    <tr align="center">
                        <td rowspan="5">Target Tahun {{ $model->tahun+1 }}</td><td>I</td>
                        <td>{{ $item_kebun_sendiri->target1_tbm }}</td><td>{{ $item_kebun_sendiri->target1_tsm }}</td>
                        <td>{{ $item_kebun_sendiri->target1_tstm }}</td><td>{{ $item_kebun_sendiri->target1_ttm }}</td>
                        <td>{{ $item_kebun_sendiri->target1_produksi }}</td><td>{{ $item_kebun_sendiri->target1_nilai }}</td>
                    </tr>

                    <tr align="center">
                        <td>II</td>
                        <td>{{ $item_kebun_sendiri->target2_tbm }}</td><td>{{ $item_kebun_sendiri->target2_tsm }}</td>
                        <td>{{ $item_kebun_sendiri->target2_tstm }}</td><td>{{ $item_kebun_sendiri->target2_ttm }}</td>
                        <td>{{ $item_kebun_sendiri->target2_produksi }}</td><td>{{ $item_kebun_sendiri->target2_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>III</td>
                        <td>{{ $item_kebun_sendiri->target3_tbm }}</td><td>{{ $item_kebun_sendiri->target3_tsm }}</td>
                        <td>{{ $item_kebun_sendiri->target3_tstm }}</td><td>{{ $item_kebun_sendiri->target3_ttm }}</td>
                        <td>{{ $item_kebun_sendiri->target3_produksi }}</td><td>{{ $item_kebun_sendiri->target3_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>IV</td>
                        <td>{{ $item_kebun_sendiri->target4_tbm }}</td><td>{{ $item_kebun_sendiri->target4_tsm }}</td>
                        <td>{{ $item_kebun_sendiri->target4_tstm }}</td><td>{{ $item_kebun_sendiri->target4_ttm }}</td>
                        <td>{{ $item_kebun_sendiri->target4_produksi }}</td><td>{{ $item_kebun_sendiri->target4_nilai }}</td>
                    </tr>                
                    
                    <tr align="center">
                        <td colspan="5" class="bg-green">Total</td>
                        <td>{{ customChangeFloat($item_kebun_sendiri->target1_produksi) + customChangeFloat($item_kebun_sendiri->target2_produksi) + customChangeFloat($item_kebun_sendiri->target3_produksi) + customChangeFloat($item_kebun_sendiri->target4_produksi)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_sendiri->target1_nilai) + customChangeFloat($item_kebun_sendiri->target2_nilai) + customChangeFloat($item_kebun_sendiri->target3_nilai) + customChangeFloat($item_kebun_sendiri->target4_nilai)  }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="9">
                        b. Kebun Plasma yang Belum Dikonversi/Kemitraan
                        
                        <p>&nbsp;&nbsp;&nbsp; - Wujud produksi dalam bentuk: 
                        {{ $list_wujud_tahunan[$value->plasma_bentuk_produksi+1]['jenis'] }} - 
                        {{ $list_wujud_tahunan[$value->plasma_bentuk_produksi+1]['wujud'] }}</p>
                        <p>&nbsp;&nbsp;&nbsp; - Rata-rata rendemen: {{ $value->plasma_rata_rendemen }} %</p>
                    </td>
                </tr>

                @foreach($value->getList_kebun_tahunan_plasmaAttribute() as $index2=>$item_kebun_plasma)
                    <tr>
                        <td colspan="9">{{ $index2+1 }}. Nama Kebun :
                        {{ $item_kebun_plasma->nama_kebun }}</td>
                    </tr>
                    <tr align="center">
                        <td rowspan="10">
                            Provinsi:<br/>
                            {{ $item_kebun_plasma->kode_prov }}<br/>
                            Kabupaten:<br/>
                            {{ $item_kebun_plasma->kode_kab }}<br/>
                            Kecamatan:<br/>
                            {{ $item_kebun_plasma->kode_kec }}<br/>
                            Desa:<br/>
                            {{ $item_kebun_plasma->kode_desa }}
                        </td>
                        <td rowspan="5">Realisasi Tahun {{ $model->tahun }}</td>
                        <td>I</td>
                        <td>{{ $item_kebun_plasma->real1_tbm }}<td></td>{{ $item_kebun_plasma->real1_tsm }}</td>
                        <td>{{ $item_kebun_plasma->real1_tstm }}<td></td>{{ $item_kebun_plasma->real1_ttm }}</td>
                        <td>{{ $item_kebun_plasma->real1_produksi }}<td></td>{{ $item_kebun_plasma->real1_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>II</td>
                        <td>{{ $item_kebun_plasma->real2_tbm }}<td></td>{{ $item_kebun_plasma->real2_tsm }}</td>
                        <td>{{ $item_kebun_plasma->real2_tstm }}<td></td>{{ $item_kebun_plasma->real2_ttm }}</td>
                        <td>{{ $item_kebun_plasma->real2_produksi }}<td></td>{{ $item_kebun_plasma->real2_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>III</td>
                        <td>{{ $item_kebun_plasma->real3_tbm }}<td></td>{{ $item_kebun_plasma->real3_tsm }}</td>
                        <td>{{ $item_kebun_plasma->real3_tstm }}<td></td>{{ $item_kebun_plasma->real3_ttm }}</td>
                        <td>{{ $item_kebun_plasma->real3_produksi }}<td></td>{{ $item_kebun_plasma->real3_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>IV</td>
                        <td>{{ $item_kebun_plasma->real4_tbm }}<td></td>{{ $item_kebun_plasma->real4_tsm }}</td>
                        <td>{{ $item_kebun_plasma->real4_tstm }}<td></td>{{ $item_kebun_plasma->real4_ttm }}</td>
                        <td>{{ $item_kebun_plasma->real4_produksi }}<td></td>{{ $item_kebun_plasma->real4_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td colspan="5" class="bg-green">Total</td>
                        <td>{{ customChangeFloat($item_kebun_plasma->real1_produksi) + customChangeFloat($item_kebun_plasma->real2_produksi) + customChangeFloat($item_kebun_plasma->real3_produksi) + customChangeFloat($item_kebun_plasma->real4_produksi)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_plasma->real1_nilai) + customChangeFloat($item_kebun_plasma->real2_nilai) + customChangeFloat($item_kebun_plasma->real3_nilai) + customChangeFloat($item_kebun_plasma->real4_nilai)  }}</td>
                    </tr>

                    <tr align="center">
                        <td rowspan="5">Target Tahun {{ $model->tahun+1 }}</td><td>I</td>
                        <td>{{ $item_kebun_plasma->target1_tbm }}</td><td>{{ $item_kebun_plasma->target1_tsm }}</td>
                        <td>{{ $item_kebun_plasma->target1_tstm }}</td><td>{{ $item_kebun_plasma->target1_ttm }}</td>
                        <td>{{ $item_kebun_plasma->target1_produksi }}</td><td>{{ $item_kebun_plasma->target1_nilai }}</td>
                    </tr>

                    <tr align="center">
                        <td>II</td>
                        <td>{{ $item_kebun_plasma->target2_tbm }}</td><td>{{ $item_kebun_plasma->target2_tsm }}</td>
                        <td>{{ $item_kebun_plasma->target2_tstm }}</td><td>{{ $item_kebun_plasma->target2_ttm }}</td>
                        <td>{{ $item_kebun_plasma->target2_produksi }}</td><td>{{ $item_kebun_plasma->target2_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>III</td>
                        <td>{{ $item_kebun_plasma->target3_tbm }}</td><td>{{ $item_kebun_plasma->target3_tsm }}</td>
                        <td>{{ $item_kebun_plasma->target3_tstm }}</td><td>{{ $item_kebun_plasma->target3_ttm }}</td>
                        <td>{{ $item_kebun_plasma->target3_produksi }}</td><td>{{ $item_kebun_plasma->target3_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>IV</td>
                        <td>{{ $item_kebun_plasma->target4_tbm }}</td><td>{{ $item_kebun_plasma->target4_tsm }}</td>
                        <td>{{ $item_kebun_plasma->target4_tstm }}</td><td>{{ $item_kebun_plasma->target4_ttm }}</td>
                        <td>{{ $item_kebun_plasma->target4_produksi }}</td><td>{{ $item_kebun_plasma->target4_nilai }}</td>
                    </tr>                
                    
                    <tr align="center">
                        <td colspan="5" class="bg-green">Total</td>
                        <td>{{ customChangeFloat($item_kebun_plasma->target1_produksi) + customChangeFloat($item_kebun_plasma->target2_produksi) + customChangeFloat($item_kebun_plasma->target3_produksi) + customChangeFloat($item_kebun_plasma->target4_produksi)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_plasma->target1_nilai) + customChangeFloat($item_kebun_plasma->target2_nilai) + customChangeFloat($item_kebun_plasma->target3_nilai) + customChangeFloat($item_kebun_plasma->target4_nilai)  }}</td>
                    </tr>
                @endforeach
            </table>
        @endforeach

        @foreach($rincian_semusim as $key=>$value)
            <div class="page-break"></div>
            <span align="right">Jenis Tanaman Semusim I: {{ $value->kode_tanaman }}</span>
            <table class="table-border" style="min-width:100%">
                <tr class="bg-green" align="center">
                    <td colspan="7">III.B LUAS TANAM, LUAS PANEN, DAN PRODUKSI<br/>TANAMAN PERKEBUNAN SEMUSIM</td>
                </tr>
                <tr align="center">
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
                        <p>&nbsp;&nbsp;&nbsp; - Wujud produksi dalam bentuk: 
                        {{ $list_wujud_musiman[$value->sendiri_bentuk_produksi+1]['jenis'] }} - 
                        {{ $list_wujud_musiman[$value->sendiri_bentuk_produksi+1]['wujud'] }}</p>
                        <p>&nbsp;&nbsp;&nbsp; - Rata-rata rendemen: <{{ $value->sendiri_rata_rendemen }} %</p>
                    </td>
                </tr>
            
                @foreach($value->getList_kebun_semusim_sendiriAttribute() as $index2=>$item_kebun_sendiri)
                    <tr><td colspan="9">{{ $index2+1 }}. Nama Kebun : {{ $item_kebun_sendiri->nama_kebun }}</td></tr>
                    <tr align="center">
                        <td rowspan="10">
                            Provinsi:<br/>
                            {{ $item_kebun_sendiri->kode_prov }}<br/>
                            Kabupaten:<br/>
                            {{ $item_kebun_sendiri->kode_kab }}<br/>
                            Kecamatan:<br/>
                            {{ $item_kebun_sendiri->kode_kec }}<br/>
                            Desa:<br/>
                            {{ $item_kebun_sendiri->kode_desa }}
                        </td>
                        <td rowspan="5">Realisasi Tahun {{ $model->tahun }}</td>
                        <td>I</td>
                        <td>{{ $item_kebun_sendiri->real1_luas_tanam }}</td><td>{{ $item_kebun_sendiri->real1_luas_panen }}</td>
                        <td>{{ $item_kebun_sendiri->real1_produksi }}</td><td>{{ $item_kebun_sendiri->real1_nilai }}</td>
                    </tr>

                    <tr align="center">
                        <td>II</td>
                        <td>{{ $item_kebun_sendiri->real2_luas_tanam }}</td><td>{{ $item_kebun_sendiri->real2_luas_panen }}</td>
                        <td>{{ $item_kebun_sendiri->real2_produksi }}</td><td>{{ $item_kebun_sendiri->real2_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>III</td>
                        <td>{{ $item_kebun_sendiri->real3_luas_tanam }}</td><td>{{ $item_kebun_sendiri->real3_luas_panen }}</td>
                        <td>{{ $item_kebun_sendiri->real3_produksi }}</td><td>{{ $item_kebun_sendiri->real3_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>IV</td>
                        <td>{{ $item_kebun_sendiri->real4_luas_tanam }}</td><td>{{ $item_kebun_sendiri->real4_luas_panen }}</td>
                        <td>{{ $item_kebun_sendiri->real4_produksi }}</td><td>{{ $item_kebun_sendiri->real4_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td class="bg-green">Total</td>
                        <td>{{ customChangeFloat($item_kebun_sendiri->real1_luas_tanam) + customChangeFloat($item_kebun_sendiri->real2_luas_tanam) + customChangeFloat($item_kebun_sendiri->real3_luas_tanam) + customChangeFloat($item_kebun_sendiri->real4_luas_tanam)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_sendiri->real1_luas_panen) + customChangeFloat($item_kebun_sendiri->real2_luas_panen) + customChangeFloat($item_kebun_sendiri->real3_luas_panen) + customChangeFloat($item_kebun_sendiri->real4_luas_panen)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_sendiri->real1_produksi) + customChangeFloat($item_kebun_sendiri->real2_produksi) + customChangeFloat($item_kebun_sendiri->real3_produksi) + customChangeFloat($item_kebun_sendiri->real4_produksi)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_sendiri->real1_nilai) + customChangeFloat($item_kebun_sendiri->real2_nilai) + customChangeFloat($item_kebun_sendiri->real3_nilai) + customChangeFloat($item_kebun_sendiri->real4_nilai)  }}</td>
                    </tr>

                    <tr align="center">
                        <td rowspan="5">Target Tahun {{ $model->tahun+1 }}</td><td>I</td>
                        <td>{{ $item_kebun_sendiri->target1_luas_tanam }}</td><td>{{ $item_kebun_sendiri->target1_luas_panen }}</td>
                        <td>{{ $item_kebun_sendiri->target1_produksi }}</td><td>{{ $item_kebun_sendiri->target1_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>II</td>
                        <td>{{ $item_kebun_sendiri->target2_luas_tanam }}</td><td>{{ $item_kebun_sendiri->target2_luas_panen }}</td>
                        <td>{{ $item_kebun_sendiri->target2_produksi }}</td><td>{{ $item_kebun_sendiri->target2_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>III</td>
                        <td>{{ $item_kebun_sendiri->target3_luas_tanam }}</td><td>{{ $item_kebun_sendiri->target3_luas_panen }}</td>
                        <td>{{ $item_kebun_sendiri->target3_produksi }}</td><td>{{ $item_kebun_sendiri->target3_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>IV</td>
                        <td>{{ $item_kebun_sendiri->target4_luas_tanam }}</td><td>{{ $item_kebun_sendiri->target4_luas_panen }}</td>
                        <td>{{ $item_kebun_sendiri->target4_produksi }}</td><td>{{ $item_kebun_sendiri->target4_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td class="bg-green">Total</td>
                        <td>{{ customChangeFloat($item_kebun_sendiri->target1_luas_tanam) + customChangeFloat($item_kebun_sendiri->target2_luas_tanam) + customChangeFloat($item_kebun_sendiri->target3_luas_tanam) + customChangeFloat($item_kebun_sendiri->target4_luas_tanam)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_sendiri->target1_luas_panen) + customChangeFloat($item_kebun_sendiri->target2_luas_panen) + customChangeFloat($item_kebun_sendiri->target3_luas_panen) + customChangeFloat($item_kebun_sendiri->target4_luas_panen)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_sendiri->target1_produksi) + customChangeFloat($item_kebun_sendiri->target2_produksi) + customChangeFloat($item_kebun_sendiri->target3_produksi) + customChangeFloat($item_kebun_sendiri->target4_produksi)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_sendiri->target1_nilai) + customChangeFloat($item_kebun_sendiri->target2_nilai) + customChangeFloat($item_kebun_sendiri->target3_nilai) + customChangeFloat($item_kebun_sendiri->target4_nilai)  }}</td>
                    </tr>
                @endforeach
                
                <tr>
                    <td colspan="7">
                        b. Kebun Plasma yang Belum Dikonversi/Kemitraan
                        &nbsp;&nbsp;&nbsp; - Wujud produksi dalam bentuk: 
                        {{ $list_wujud_musiman[$value->plasma_bentuk_produksi+1]['jenis'] }} - 
                        {{ $list_wujud_musiman[$value->plasma_bentuk_produksi+1]['wujud'] }}</p>
                        <p>&nbsp;&nbsp;&nbsp; - Rata-rata rendemen: <{{ $value->plasma_rata_rendemen }} %</p>
                    </td>
                </tr>
                
                @foreach($value->getList_kebun_semusim_plasmaAttribute() as $index2=>$item_kebun_sendiri)
                    <tr><td colspan="9">{{ $index2+1 }}. Nama Kebun : {{ $item_kebun_plasma->nama_kebun }}</td></tr>
                    <tr align="center">
                        <td rowspan="10">
                            Provinsi:<br/>
                            {{ $item_kebun_plasma->kode_prov }}<br/>
                            Kabupaten:<br/>
                            {{ $item_kebun_plasma->kode_kab }}<br/>
                            Kecamatan:<br/>
                            {{ $item_kebun_plasma->kode_kec }}<br/>
                            Desa:<br/>
                            {{ $item_kebun_plasma->kode_desa }}
                        </td>
                        <td rowspan="5">Realisasi Tahun {{ $model->tahun }}</td>
                        <td>I</td>
                        <td>{{ $item_kebun_plasma->real1_luas_tanam }}</td><td>{{ $item_kebun_plasma->real1_luas_panen }}</td>
                        <td>{{ $item_kebun_plasma->real1_produksi }}</td><td>{{ $item_kebun_plasma->real1_nilai }}</td>
                    </tr>

                    <tr align="center">
                        <td>II</td>
                        <td>{{ $item_kebun_plasma->real2_luas_tanam }}</td><td>{{ $item_kebun_plasma->real2_luas_panen }}</td>
                        <td>{{ $item_kebun_plasma->real2_produksi }}</td><td>{{ $item_kebun_plasma->real2_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>III</td>
                        <td>{{ $item_kebun_plasma->real3_luas_tanam }}</td><td>{{ $item_kebun_plasma->real3_luas_panen }}</td>
                        <td>{{ $item_kebun_plasma->real3_produksi }}</td><td>{{ $item_kebun_plasma->real3_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>IV</td>
                        <td>{{ $item_kebun_plasma->real4_luas_tanam }}</td><td>{{ $item_kebun_plasma->real4_luas_panen }}</td>
                        <td>{{ $item_kebun_plasma->real4_produksi }}</td><td>{{ $item_kebun_plasma->real4_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td class="bg-green">Total</td>
                        <td>{{ customChangeFloat($item_kebun_plasma->real1_luas_tanam) + customChangeFloat($item_kebun_plasma->real2_luas_tanam) + customChangeFloat($item_kebun_plasma->real3_luas_tanam) + customChangeFloat($item_kebun_plasma->real4_luas_tanam)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_plasma->real1_luas_panen) + customChangeFloat($item_kebun_plasma->real2_luas_panen) + customChangeFloat($item_kebun_plasma->real3_luas_panen) + customChangeFloat($item_kebun_plasma->real4_luas_panen)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_plasma->real1_produksi) + customChangeFloat($item_kebun_plasma->real2_produksi) + customChangeFloat($item_kebun_plasma->real3_produksi) + customChangeFloat($item_kebun_plasma->real4_produksi)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_plasma->real1_nilai) + customChangeFloat($item_kebun_plasma->real2_nilai) + customChangeFloat($item_kebun_plasma->real3_nilai) + customChangeFloat($item_kebun_plasma->real4_nilai)  }}</td>
                    </tr>

                    <tr align="center">
                        <td rowspan="5">Target Tahun {{ $model->tahun+1 }}</td><td>I</td>
                        <td>{{ $item_kebun_plasma->target1_luas_tanam }}</td><td>{{ $item_kebun_plasma->target1_luas_panen }}</td>
                        <td>{{ $item_kebun_plasma->target1_produksi }}</td><td>{{ $item_kebun_plasma->target1_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>II</td>
                        <td>{{ $item_kebun_plasma->target2_luas_tanam }}</td><td>{{ $item_kebun_plasma->target2_luas_panen }}</td>
                        <td>{{ $item_kebun_plasma->target2_produksi }}</td><td>{{ $item_kebun_plasma->target2_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>III</td>
                        <td>{{ $item_kebun_plasma->target3_luas_tanam }}</td><td>{{ $item_kebun_plasma->target3_luas_panen }}</td>
                        <td>{{ $item_kebun_plasma->target3_produksi }}</td><td>{{ $item_kebun_plasma->target3_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td>IV</td>
                        <td>{{ $item_kebun_plasma->target4_luas_tanam }}</td><td>{{ $item_kebun_plasma->target4_luas_panen }}</td>
                        <td>{{ $item_kebun_plasma->target4_produksi }}</td><td>{{ $item_kebun_plasma->target4_nilai }}</td>
                    </tr>
                    
                    <tr align="center">
                        <td class="bg-green">Total</td>
                        <td>{{ customChangeFloat($item_kebun_plasma->target1_luas_tanam) + customChangeFloat($item_kebun_plasma->target2_luas_tanam) + customChangeFloat($item_kebun_plasma->target3_luas_tanam) + customChangeFloat($item_kebun_plasma->target4_luas_tanam)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_plasma->target1_luas_panen) + customChangeFloat($item_kebun_plasma->target2_luas_panen) + customChangeFloat($item_kebun_plasma->target3_luas_panen) + customChangeFloat($item_kebun_plasma->target4_luas_panen)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_plasma->target1_produksi) + customChangeFloat($item_kebun_plasma->target2_produksi) + customChangeFloat($item_kebun_plasma->target3_produksi) + customChangeFloat($item_kebun_plasma->target4_produksi)  }}</td>
                        <td>{{ customChangeFloat($item_kebun_plasma->target1_nilai) + customChangeFloat($item_kebun_plasma->target2_nilai) + customChangeFloat($item_kebun_plasma->target3_nilai) + customChangeFloat($item_kebun_plasma->target4_nilai)  }}</td>
                    </tr>
                @endforeach
            </table>
        @endforeach
                    
        <div class="page-break"></div>    
        <table class="table-border" style="min-width:100%">
            <tr  class="bg-green" align="center">
                <td colspan="{{ count($rincian_tahunan) + count($rincian_semusim) + 1 }}">IV. PENGELUARAN UNTUK SARANA PRODUKSI YANG DIGUNAKAN UNTUK BUDAYA<br/>SELAMA TAHUN {{ $model->tahun }}</td>
            </tr>
            <tr align="center">
                <td rowspan="2">Jenis Sarana Produksi</td>
                <td colspan="{{ count($rincian_tahunan) + count($rincian_semusim) }}">Nilai Per Jenis Tanaman Perkebunan yang Diusahakan<br/>(000 Rp)</td>
            </tr>
            <tr align="center">
                @foreach($rincian_tahunan as $index=>$value)
                    <td>{{ $value->kode_tanaman }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td>{{ $value->kode_tanaman }}</td>
                @endforeach
            </tr>
            
            <tr>
                <td>a. Bibit Tanaman</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">{{ $value->bibit_tanaman }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">{{ $value->bibit_tanaman }}</td>
                @endforeach
            </tr>
            
            <tr>
                <td>b. Pupuk/Stimulan</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center"></td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center"></td>
                @endforeach
            </tr>
            
            <tr>
                <td>(1) {{ $model->pupuk1 }}</td>
                
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">{{ $value->pupuk1 }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">{{ $value->pupuk1 }}</td>
                @endforeach
            </tr>
            
            <tr>
                <td>(2) {{ $model->pupuk2 }} dst</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">{{ $value->pupuk2 }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">{{ $value->pupuk2 }}</td>
                @endforeach
            </tr>
            
            <tr>
                <td>(3) {{ $model->pupuk3 }} dst</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">{{ $value->pupuk3 }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">{{ $value->pupuk3 }}</td>
                @endforeach
            </tr>

            <tr>
                <td>c. Pestisida</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center"></td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center"></td>
                @endforeach
            </tr>
            
            <tr>
                <td>(1) {{ $model->pestisida1 }}</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">{{ $value->pestisida1 }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">{{ $value->pestisida1 }}</td>
                @endforeach
            </tr>
            
            <tr>
                <td>(2) {{ $model->pestisida2 }} dst</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">{{ $value->pestisida2 }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">{{ $value->pestisida2 }}</td>
                @endforeach
            </tr>
            
            <tr>
                <td>(3) {{ $model->pestisida3 }} dst</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">{{ $value->pestisida3 }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">{{ $value->pestisida3 }}</td>
                @endforeach
            </tr>
            
            <tr>
                <td>d. Bahan bakar untuk budidaya perkebunan</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">{{ $value->bahan_bakar_budidaya }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">{{ $value->bahan_bakar_budidaya }}</td>
                @endforeach
            </tr>
            
            <tr>
                <td>e. Sewa Lahan</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">{{ $value->sewa_lahan }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">{{ $value->sewa_lahan }}</td>
                @endforeach
            </tr>
            
            <tr>
                <td>f. Sewa Alat</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">{{ $value->sewa_alat }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">{{ $value->sewa_alat }}</td>
                @endforeach
            </tr>
            
            <tr>
                <td>g. Pengeluaran lainnya</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">{{ $value->pengeluaran_lainnya }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">{{ $value->pengeluaran_lainnya }}</td>
                @endforeach
            </tr>
            
            <tr>
                <td>Total (Rincian a s.d Rincian g)</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">
                        {{ customChangeFloat($value->bibit_tanaman) + customChangeFloat($value->pupuk1) + customChangeFloat($value->pupuk2) + customChangeFloat($value->pupuk3) + customChangeFloat($value->pestisida1) + customChangeFloat($value->pestisida2) + customChangeFloat($value->pestisida3) + customChangeFloat($value->bahan_bakar_budidaya) + customChangeFloat($value->sewa_lahan) + customChangeFloat($value->sewa_alat) + customChangeFloat($value->pengeluaran_lainnya) }}
                    </td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">
                        {{ customChangeFloat($value->bibit_tanaman) + customChangeFloat($value->pupuk1) + customChangeFloat($value->pupuk2) + customChangeFloat($value->pupuk3) + customChangeFloat($value->pestisida1) + customChangeFloat($value->pestisida2) + customChangeFloat($value->pestisida3) + customChangeFloat($value->bahan_bakar_budidaya) + customChangeFloat($value->sewa_lahan) + customChangeFloat($value->sewa_alat) + customChangeFloat($value->pengeluaran_lainnya) }}
                    </td>
                @endforeach
            </tr>
            
            <tr>
                <td>h. Biaya untuk kemitraan (pupuk, benin, dll)</td>
                @foreach($rincian_tahunan as $index=>$value)
                    <td align="center">{{ $value->biaya_kemitraan }}</td>
                @endforeach
                
                @foreach($rincian_semusim as $index=>$value)
                    <td align="center">{{ $value->biaya_kemitraan }}</td>
                @endforeach
            </tr>
        </table>

        <div class="page-break"></div>
        <table class="table-border" style="min-width:100%">
            <tr class="bg-green" align="center">
                <td colspan="5">V. JUMLAH DAN UPAH TENAGA KERJA SELAMA TAHUN {{ $model->tahun }}</td>
            </tr>
            <tr align="center">
                <td rowspan="2">Tenaga Kerja</td>
                <td colspan="2">Pekerja Administrator</td>
                <td colspan="2">Pekerja Kebun/Lapangan</td>
            </tr>
            <tr align="center">
                <td>Banyaknya Pekerja</td>
                <td>Upah Pekerja<br/>(000 Rp)</td>
                <td>Banyaknya Pekerja</td>
                <td>Upah Pekerja<br/>(000 Rp)</td>
            </tr>
            
            <tr align="center">
                <td>(1)</td><td>(2)</td><td>(3)</td>
                <td>(4)</td><td>(5)</td>
            </tr>
            
            <tr>
                <td>1. Pekerja Tetap</td>
                <td class="bg-green"></td><td class="bg-green"></td>
                <td class="bg-green"></td><td class="bg-green"></td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp; Laki-laki</td>
                <td align="center">{{ $model->bpt_admin_laki }}</td><td align="center">{{ $model->upt_admin_laki }}.000</td>
                <td align="center">{{ $model->bpt_kebun_laki }}</td><td align="center">{{ $model->upt_kebun_laki }}.000</td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp; Perempuan</td>
                <td align="center">{{ $model->bpt_admin_perempuan }}</td><td align="center">{{ $model->upt_admin_perempuan }}.000</td>
                <td align="center">{{ $model->bpt_kebun_perempuan }}</td><td align="center">{{ $model->upt_kebun_perempuan }}.000</td>
            </tr>
            <tr>
                <td>2. Pekerja Tidak Tetap</td>
                <td class="bg-green"></td><td class="bg-green"></td>
                <td class="bg-green"></td><td class="bg-green"></td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp; Laki-laki</td>
                <td align="center">{{ $model->bptt_admin_laki }}</td><td align="center">{{ $model->uptt_admin_laki }}.000</td>
                <td align="center">{{ $model->bptt_kebun_laki }}</td><td align="center">{{ $model->uptt_kebun_laki }}.000</td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp; Perempuan</td>
                <td align="center">{{ $model->bptt_admin_perempuan }}</td><td align="center">{{ $model->uptt_admin_perempuan }}.000</td>
                <td align="center">{{ $model->bptt_kebun_perempuan }}</td><td align="center">{{ $model->uptt_kebun_perempuan }}.000</td>
            </tr>
            
            <tr>
                <td>Total</td>
                <td>{{ customChangeFloat($model->bpt_admin_laki)+customChangeFloat($model->bpt_admin_perempuan)+customChangeFloat($model->bptt_admin_laki)+customChangeFloat($model->bptt_admin_perempuan) }}</td>
                <td>{{ customChangeFloat($model->upt_admin_laki)+customChangeFloat($model->upt_admin_perempuan)+customChangeFloat($model->uptt_admin_laki)+customChangeFloat($model->uptt_admin_perempuan) }}</td>
                <td>{{ customChangeFloat($model->bpt_kebun_laki)+customChangeFloat($model->bpt_kebun_perempuan)+customChangeFloat($model->bptt_kebun_laki)+customChangeFloat($model->bptt_kebun_perempuan) }}</td>
                <td>{{ customChangeFloat($model->upt_kebun_laki)+customChangeFloat($model->upt_kebun_perempuan)+customChangeFloat($model->uptt_kebun_laki)+customChangeFloat($model->uptt_kebun_perempuan) }}</td>
            </tr>
        </table>

        <div class="page-break"></div>
        <table class="table-border" style="min-width:100%">
            <tr class="bg-green" align="center">
                <td colspan="2">VI. PENDAPATAN/PENERIMAAN PERUSAHAAN PERKEBUNAN TAHUN {{ $model->tahun }}</td>
            </tr>
            <tr align="center">
                <td><b>Jenis Pendapatan/Penerimaan</b></td>
                <td><b>Nilai (000 Rp)</b></td>
            </tr>
            <tr align="center">
                <td>(1)</td><td>(2)</td>
            </tr>
            
            <tr>
                <td>
                    1. Pendapatan Bersih dari Usaha Tanaman Perkebunan { Blok IIIA R.2a jumlah tahun {{ $model->tahun }}, kol.(7) jenis tanaman tahunan I  + Blok IIIA R.2a jumlah tahun {{ $model->tahun }}, kol.(7)  jenis tanaman tahunan II + Blok IIIA R.2a jumlah tahun {{ $model->tahun }}, kol.(7)  jenis tanaman tahunan III + Blok IIIB R.a jumlah tahun {{ $model->tahun }} kol.(6) jenis tanaman semusim I + Blok IIIB R.a jumlah tahun {{ $model->tahun }} kol.(6)  jenis tanaman semusim II + Blok IIIB R.a jumlah tahun {{ $model->tahun }} kol.(6)  jenis tanaman semusim III - Blok IV Rincian total kol.(2) - Blok V Rincian Jumlah kol (3) - Blok V Rincian Jumlah kol (5) }
                </td>
                <td>{{ $model->pendapatan_bersih_kebun }}</td>
            </tr>
            
            <tr>
                <td>2. Pendapatan Bersih dari Usaha Pertanian Lainnya (Hortikultura, Peternakan, Perikanan, dll)</td>
                <td>{{ $model->pendapatan_bersih_tani_lain }}</td>
            </tr>
            
            <tr>
                <td>3. Pendapatan dari Hasil Kemitraan</td>
                <td>{{ $model->pendapatan_hasil_kemitraan }}</td>
            </tr>
            
            <tr>
                <td>4. Pendapatan Bersih dari penyewaan (Peralatan, Mesin-mesin, Transportasi, dll)</td>
                <td>{{ $model->pendapatan_dari_sewa }}</td>
            </tr>
            
            <tr>
                <td>5. Pendapatan Bersih dari penjualan bibit</td>
                <td>{{ $model->pendapatan_jual_bibit }}</td>
            </tr>
            
            <tr>
                <td>6. Pendapatan Bersih Lainnya</td>
                <td>{{ $model->pendapatan_bersih_lain }}</td>
            </tr>
            
            <tr>
                <td>7. Total (R1 s.d R6)</td>
                <td>{{ customChangeFloat($model->pendapatan_bersih_kebun)+customChangeFloat($model->pendapatan_bersih_tani_lain)
                    +customChangeFloat($model->pendapatan_hasil_kemitraan)+customChangeFloat($model->pendapatan_dari_sewa)
                    +customChangeFloat($model->pendapatan_jual_bibit)+customChangeFloat($model->pendapatan_bersih_lain) }}</td>
            </tr>
        </table>

        <div class="page-break"></div>
        <table class="table-border" style="min-width:100%">
            <tr  class="bg-green" align="center">
                <td>VII. CATATAN</td>
            </tr>
            <tr>
                <td>{{ $model->catatan }}</textarea></td>
            </tr>
        </table>

        <div class="page-break"></div>
        <table class="table-border" style="min-width:100%">
            <tr  class="bg-green" align="center">
                <td colspan="4">VIII. KETERANGAN PENCACAHAN</td>
            </tr>
            <tr>
                <td>1. Nama Pencacah : </td>
                <td>{{ $model->nama_pencacah }}</td>
                <td>1. Nama Pemeriksa : </td>
                <td>{{ $model->nama_pemeriksa }}</td>
            </tr>
            
            <tr>
                <td>2. Tanggal Pencacahan : </td>
                <td>{{ $model->tanggal_pencacah }}</td>
                <td>2. Tanggal Pemeriksaan : </td>
                <td>{{ $model->tanggal_pemeriksa }}</td>
            </tr>
            
            <tr>
                <td>3. Tanda Tangan</td><td></td><td>3. Tanda Tangan</td><td></td>
            </tr>
        </table>

        <div class="page-break"></div>
        <table class="table-border" style="min-width:100%">
            <tr class="bg-green" align="center">
                <td>IX. PENGESAHAN</td>
            </tr>
            <tr>
                <td>
                    Diisi dengan sebenarnya di : {{ $model->diisi_di }}. 
                    Pada Tanggal : {{ $model->diisi_tanggal }}<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Nama Administratur/Pengurus Perkebunan{{ $model->diisi_administratur }}<br/>
                </td>
            </tr>
        </table>
    </body>
</html>