<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="{{ asset('css/print_pdf.css') }}" rel="stylesheet">
    </head>

    <body>
        <table width="100%">
            <tr align="center">
                <td width="25%">
                    <img src="{{ asset('img') }}/logobps.png" width="125" />
                </td>
                <td  width="50%">
                    <img src="{{ asset('img') }}/garuda.png" width="50" />
                    <p>REPUBLIK INDONESIA</p>
                    
                    <b>SURVEI PERUSAHAAN PERKEBUNAN KARET TRIWULANAN</b> <br/>
                    <b>TAHUN {{ $model->tahun }}</b>
                </td>
                <td width="25%">
                    <p>SKP21 - KARET</p>
                </td>
            </tr>
            
            <tr align="center">
                <td colspan="3">
                    <small class="border border-dark small-text">
                        Laporan Harap Dikirim Sebelum Tanggal 10 Pada: Bulan April 2021 (Triwulan I), Juli 2021 (Triwulan II), Oktober 2021 (Triwulan III), Januari 2022 (Triwulan IV)
                    </small>
                </td>
            </tr>
            
            <tr>
                <td>RAHASIA</td>
                <td colspan="2"align="right">
                    TRIWULAN {{ $model->triwulan }}
                </td>
            </tr>
        </table>

        <table class="table-border border-green" style="min-width:100%">
            <tr align="center" class="bg-green"><td colspan="4"><b>I. PENGENALAN TEMPAT</b></td></tr>
            <tr>
                <td>101. Nama Perusahaan/Kantor Administratur</td>
                <td>{{ $model->nama_perusahaan }}</td>
                <td>103. Nama Group Perusahaan</td>
                <td>{{ $model->nama_grup }}</td>
            </tr>
            
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;a. Alamat Lengkap Administratur Kebun: {{ $model->alamat }}</td>
                <td colspan="2">&nbsp;&nbsp;&nbsp;a. Alamat Lengkap Group Perusahaan: {{ $model->alamat_grup }}</td>
            </tr>
            
            <tr>
                <td colspan="2">
                    &nbsp;&nbsp;&nbsp; Kode Pos: {{ $model->kode_pos }}
                    &nbsp;&nbsp;&nbsp; Telepon: {{ $model->telp }}
                </td>
                <td colspan="2">
                    &nbsp;&nbsp;&nbsp; Kode Pos: {{ $model->kode_pos_grup }}
                    &nbsp;&nbsp;&nbsp; Telepon: {{ $model->telepon_grup }}
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    &nbsp;&nbsp;&nbsp; Email: {{ $model->email }}
                    &nbsp;&nbsp;&nbsp; Fax: {{ $model->fax }}
                </td>
                <td colspan="2">
                    &nbsp;&nbsp;&nbsp; Email: {{ $model->email_grup }}
                    &nbsp;&nbsp;&nbsp; Fax: {{ $model->fax_grup }}
                </td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp;&nbsp; b. Provinsi</td>
                <td>
                    {{ $model->kode_prov }} - {{ $model->label_prov }}
                </td>
                <td>&nbsp;&nbsp;&nbsp; b. Provinsi</td>
                <td>{{ $model->kode_prov_grup }} - {{ $model->label_prov_grup }}</td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
                <td>{{ $model->kode_kab }} - {{ $model->label_kab }}</td>
                <td>&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
                <td>{{ $model->kode_kab_grup }} - {{ $model->label_kab_grup }}</td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp;&nbsp; d. Kecamatan</td>
                <td>{{ $model->kode_kec }} - {{ $model->label_kec }}</td>
                <td>104. Status permodalan/pemilikan *)</td>
                <td>
                    @if($model->status_pemodalan_grup==1)
                        1. PMDN
                    @elseif($model->status_pemodalan_grup==2)
                        2. PMA
                    @endif
                </td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp;&nbsp; e. Desa/Kelurahan *)</td>
                <td>{{ $model->kode_desa }} - {{ $model->label_desa }}</td>
                <td>105. Bentuk Badan Hukum</td>
                <td>
                    @if($model->badan_hukum_grup==1)
                        1. PTPN
                    @elseif($model->badan_hukum_grup==2)
                        2. Perusahaan Daerah
                    @elseif($model->badan_hukum_grup==3)
                        3. Persero
                    @elseif($model->badan_hukum_grup==4)
                        4. Perum
                    @elseif($model->badan_hukum_grup==5)
                        5. PT
                    @elseif($model->badan_hukum_grup==6)
                        6. CV
                    @elseif($model->badan_hukum_grup==7)
                        7. Koperasi/KUD
                    @elseif($model->badan_hukum_grup==8)
                        8. Yayasan
                    @endif
                </td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp;&nbsp; f. Nama Contact Person</td>
                <td>{{ $model->nama_contact }}</td>
                <td>106. Apakah Sebagai Pelaksana Kemitraan</td>
                <td>
                    @if($model->apakah_pelaksana_kemitraan==1)
                        1. Ya
                    @elseif($model->apakah_pelaksana_kemitraan==2)
                        2. Tidak
                    @endif
                </td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp;&nbsp; g. Nomor HP/Telp.</td>
                <td>{{ $model->nomor_hp }}</td>
                <td>107. Apakah mempunyai Kebun Plasma yang belum dikonversi</td>
                <td>
                    @if($model->punya_kebun_plasma==1)
                        1. Ya
                    @elseif($model->punya_kebun_plasma==2)
                        2. Tidak
                    @endif
                </td>
            </tr>
            
            <tr>
                <td colspan="2"><b>Kondisi Perusahaan: Aktif/Tutup Sementara/Non Respon/Tidak Ditemukan *)</b></td>
                <td>108. Apakah mempunyai unit pengolahan produksi</td>
                <td>
                    @if($model->punya_unit_pengolahan==1)
                        1. Ya
                    @elseif($model->punya_unit_pengolahan==2)
                        2. Tidak
                    @endif
                </td>
            </tr>
            
            <tr>
                <td>102. Nama Kantor Pusat</td>
                <td>{{ $model->nama_kantor_pusat }}</td>
                <td>109. Tahun Berdiri/Operasional Perusahaan</td>
                <td>{{ $model->tahun_berdiri }}</td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp;&nbsp; a. Alamat Lengkap Pusat</td>
                <td>{{ $model->alamat_kantor_pusat }}</td>
                <td colspan="2" align="center" class="bg-green"><b>II. KETERANGAN PETUGAS</b></td>
            </tr>
            
            <tr>
                <td colspan="2">
                    &nbsp;&nbsp;&nbsp; Kode Pos: {{ $model->kode_pos_kantor_pusat }}
                    Telepon: {{ $model->telp_kantor_pusat }}
                </td>
                <td colspan="3" rowspan="4">
                    <table style="min-width:100%">
                        <tr>
                            <td>Uraian</td><td>Pencacah</td><td>Pemeriksa</td>
                        </tr>
                        <tr>
                            <td>201. Nama</td>
                            <td>{{ $model->nama_pencacah }}</td>
                            <td>{{ $model->nama_pemeriksa }}</td>
                        </tr>
                        <tr>
                            <td>202. Tanggal</td>
                            <td>{{ $model->tanggal_pencacah }}</td>
                            <td>{{ $model->tanggal_pemeriksa }}</td>
                        </tr>
                        <tr>
                            <td>203. Tanda Tangan</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    &nbsp;&nbsp;&nbsp; Email: {{ $model->email_kantor_pusat }}
                    Fax: {{ $model->fax_kantor_pusat }}
                </td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp;&nbsp; b. Provinsi</td>
                <td>{{ $model->kode_prov_kantor_pusat }} - {{ $model->label_prov_kantor_pusat }}</td>
            </tr>
            
            <tr>
                <td>&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
                <td>{{ $model->kode_kab_kantor_pusat }} - {{ $model->label_kab_kantor_pusat }}</td>
            </tr>
        </table>

        <i class="small-text">*) Coret yang tidak sesuai</i>
        <table width="100%">
            <tr>
                <td width="70%">
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

        <br/>

        <table class="table-border border-green" width="100%">
            <tr><td colspan="16" align="center" class="bg-green"><b>III. LUAS TANAMAN, PRODUKSI DAN DISTRIBUSI PRODUKSI</b></td></tr>
            <tr><td colspan="16">301. Luas Tanaman dan Produksi</td></tr>
            <tr><td colspan="16">A. Nama Kebun, Luas Tanaman dan Produksi</td></tr>
            <tr align="center">
                <td rowspan="4">Nama Kebun</td>
                <td colspan="5">Bulan {{ $list_bulan[0] }}</td>
                <td colspan="5">Bulan {{ $list_bulan[1] }}</td>
                <td colspan="5">Bulan {{ $list_bulan[2] }}</td>
            </tr>
            <tr align="center">
                <td colspan="4">Luas Tanaman (Ha)</td>
                <td rowspan="3">Produksi (Kg)</td>
                <td colspan="4">Luas Tanaman (Ha)</td>
                <td rowspan="3">Produksi (Kg)</td>
                <td colspan="4">Luas Tanaman (Ha)</td>
                <td rowspan="3">Produksi (Kg)</td>
            </tr>
            
            <tr align="center">
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
            
            <tr align="center">
                <td>TSM</td><td>TSTM</td>
                <td>TSM</td><td>TSTM</td>
                <td>TSM</td><td>TSTM</td>
            </tr>
            
            <tr align="center">
                <td>(1)</td><td>(2)</td><td>(3)</td><td>(4)</td><td>(5)</td><td>(6)</td><td>(7)</td><td>(8)</td>
                <td>(9)</td><td>(10)</td><td>(11)</td><td>(12)</td><td>(13)</td><td>(14)</td><td>(15)</td><td>(16)</td>
            </tr>
            
            <tr>
                <td colspan="16">
                    1. Kebun Sendiri/Inti &nbsp;&nbsp; 
                </td>
            </tr>

            @php 
                $t301_a3_total_tbm_bulan1 = 0;
                $t301_a3_total_tsm_bulan1 = 0;
                $t301_a3_total_tstm_bulan1 = 0;
                $t301_a3_total_ttm_bulan1 = 0;
                $t301_a3_total_produksi_bulan1 = 0;
                $t301_a3_total_tbm_bulan2 = 0;
                $t301_a3_total_tsm_bulan2 = 0;
                $t301_a3_total_tstm_bulan2 = 0;
                $t301_a3_total_ttm_bulan2 = 0;
                $t301_a3_total_produksi_bulan2 = 0;
                $t301_a3_total_tbm_bulan3 = 0;
                $t301_a3_total_tsm_bulan3 = 0;
                $t301_a3_total_tstm_bulan3 = 0;
                $t301_a3_total_ttm_bulan3 = 0;
                $t301_a3_total_produksi_bulan3 = 0;
            @endphp

            @foreach($rincian1 as $key=>$value)
                @php 
                    $t301_a3_total_tbm_bulan1 += $value->tbm1;
                    $t301_a3_total_tsm_bulan1 += $value->tsm1;
                    $t301_a3_total_tstm_bulan1  += $value->tstm1;
                    $t301_a3_total_ttm_bulan1  += $value->ttm1;
                    $t301_a3_total_produksi_bulan1  += $value->produksi1;
                    $t301_a3_total_tbm_bulan2  += $value->tbm2;
                    $t301_a3_total_tsm_bulan2  += $value->tsm2;
                    $t301_a3_total_tstm_bulan2  += $value->tstm2;
                    $t301_a3_total_ttm_bulan2  += $value->ttm2;
                    $t301_a3_total_produksi_bulan2  += $value->produksi2;
                    $t301_a3_total_tbm_bulan3  += $value->tbm3;
                    $t301_a3_total_tsm_bulan3  += $value->tsm3;
                    $t301_a3_total_tstm_bulan3  += $value->tstm3;
                    $t301_a3_total_ttm_bulan3  += $value->ttm3;
                    $t301_a3_total_produksi_bulan3  += $value->produksi3;
                @endphp
                <tr>
                    <td>{{ $value->rincian }}</td>
                    <td>{{ $value->tbm1 }}</td>
                    <td>{{ $value->tsm1 }}</td>
                    <td>{{ $value->tstm1 }}</td>
                    <td>{{ $value->ttm1 }}</td>
                    <td>{{ $value->produksi1 }}</td>
                    <td>{{ $value->tbm2 }}</td>
                    <td>{{ $value->tsm2 }}</td>
                    <td>{{ $value->tstm2 }}</td>
                    <td>{{ $value->ttm2 }}</td>
                    <td>{{ $value->produksi2 }}</td>
                    <td>{{ $value->tbm3 }}</td>
                    <td>{{ $value->tsm3 }}</td>
                    <td>{{ $value->tstm3 }}</td>
                    <td>{{ $value->ttm3 }}</td>
                    <td>{{ $value->produksi3 }}</td>
                </tr>
            @endforeach

            <tr>
                <td colspan="16">
                    2. Kebun Plasma yang Belum Dikonversi/Kemitraan  &nbsp;&nbsp;
                </td>
            </tr>
            
            @foreach($rincian2 as $key=>$value)
                @php 
                    $t301_a3_total_tbm_bulan1 += $value->tbm1;
                    $t301_a3_total_tsm_bulan1 += $value->tsm1;
                    $t301_a3_total_tstm_bulan1  += $value->tstm1;
                    $t301_a3_total_ttm_bulan1  += $value->ttm1;
                    $t301_a3_total_produksi_bulan1  += $value->produksi1;
                    $t301_a3_total_tbm_bulan2  += $value->tbm2;
                    $t301_a3_total_tsm_bulan2  += $value->tsm2;
                    $t301_a3_total_tstm_bulan2  += $value->tstm2;
                    $t301_a3_total_ttm_bulan2  += $value->ttm2;
                    $t301_a3_total_produksi_bulan2  += $value->produksi2;
                    $t301_a3_total_tbm_bulan3  += $value->tbm3;
                    $t301_a3_total_tsm_bulan3  += $value->tsm3;
                    $t301_a3_total_tstm_bulan3  += $value->tstm3;
                    $t301_a3_total_ttm_bulan3  += $value->ttm3;
                    $t301_a3_total_produksi_bulan3  += $value->produksi3;
                @endphp
                <tr>
                    <td>{{ $value->rincian }}</td>
                    <td>{{ $value->tbm1 }}</td>
                    <td>{{ $value->tsm1 }}</td>
                    <td>{{ $value->tstm1 }}</td>
                    <td>{{ $value->ttm1 }}</td>
                    <td>{{ $value->produksi1 }}</td>
                    <td>{{ $value->tbm2 }}</td>
                    <td>{{ $value->tsm2 }}</td>
                    <td>{{ $value->tstm2 }}</td>
                    <td>{{ $value->ttm2 }}</td>
                    <td>{{ $value->produksi2 }}</td>
                    <td>{{ $value->tbm3 }}</td>
                    <td>{{ $value->tsm3 }}</td>
                    <td>{{ $value->tstm3 }}</td>
                    <td>{{ $value->ttm3 }}</td>
                    <td>{{ $value->produksi3 }}</td>
                </tr>
            @endforeach

            <tr>
                <td>3. Total</td>
                <td>{{ $t301_a3_total_tbm_bulan1 }}</td>
                <td>{{ $t301_a3_total_tsm_bulan1 }}</td>
                <td>{{ $t301_a3_total_tstm_bulan1 }}</td>
                <td>{{ $t301_a3_total_ttm_bulan1 }}</td>
                <td>{{ $t301_a3_total_produksi_bulan1 }}</td>
                
                <td>{{ $t301_a3_total_tbm_bulan2 }}</td>
                <td>{{ $t301_a3_total_tsm_bulan2 }}</td>
                <td>{{ $t301_a3_total_tstm_bulan2 }}</td>
                <td>{{ $t301_a3_total_ttm_bulan2 }}</td>
                <td>{{ $t301_a3_total_produksi_bulan2 }}</td>
                
                <td>{{ $t301_a3_total_tbm_bulan3 }}</td>
                <td>{{ $t301_a3_total_tsm_bulan3 }}</td>
                <td>{{ $t301_a3_total_tstm_bulan3 }}</td>
                <td>{{ $t301_a3_total_ttm_bulan3 }}</td>
                <td>{{ $t301_a3_total_produksi_bulan3 }}</td>
            </tr>
            <tr>
                <td>B. Kode Bentuk Produksi</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    @if($model['301_b_bulan1']==1)
                        1.Tandan Buah Segar (TBS)
                    @elseif($model['301_b_bulan1']==2)
                        2.Crude Palm Oil (CPO)
                    @endif
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    @if($model['301_b_bulan2']==1)
                        1.Tandan Buah Segar (TBS)
                    @elseif($model['301_b_bulan2']==2)
                        2.Crude Palm Oil (CPO)
                    @endif
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    @if($model['301_b_bulan3']==1)
                        1.Tandan Buah Segar (TBS)
                    @elseif($model['301_b_bulan3']==2)
                        2.Crude Palm Oil (CPO)
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="5">    C. Rendemen dari <b>TANDAN BUAH SEGAR</b> menjadi <b><i>CRUDE PALM OIL</i></b></td>
                <td>{{ $model['301_c_bulan1'] }} %</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $model['301_c_bulan2'] }} %</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $model['301_c_bulan3'] }} %</td>
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
                <td colspan="5">{{ $model['302_2a'] }}</td>
                <td colspan="5">{{ $model['302_3a'] }}</td>
                <td colspan="5">{{ $model['302_4a'] }}</td>
            </tr>
            
            <tr>
                <td>b. 	Dijual ke pihak lain</td>
                <td colspan="5">{{ $model['302_2b'] }}</td>
                <td colspan="5">{{ $model['302_3b'] }}</td>
                <td colspan="5">{{ $model['302_4b'] }}</td>
            </tr>
            
            <tr>
                <td>c. 	Rusak/susut/hilang</td>
                <td colspan="5">{{ $model['302_2c'] }}</td>
                <td colspan="5">{{ $model['302_3c'] }}</td>
                <td colspan="5">{{ $model['302_4c'] }}</td>
            </tr>
            
            <tr>
                <td>d. Jumlah</td>
                <td colspan="5">100.00</td>
                <td colspan="5">100.00</td>
                <td colspan="5">100.00</td>
            </tr>
            
            <tr>
                <td colspan="16" align="center" class="bg-green"><b>IV. CATATAN DAN PENGESAHAN</b></td>
            </tr>

            <tr>
                <td colspan="9" align="center" style="vertical-align:top;">
                    Catatan<br/>
                    {{ $model->catatan }}
                </td>
                <td colspan="7" align="center">
                    Diisi Dengan Sebenarnya<br/>
                    {{ $model->diisi_di }}, 
                    {{ date("d M Y", strtotime($model->diisi_tanggal)) }} <br/>
                    Administratur/Pengurus <br/><br/><br/><br/>
                    {{ $model->diisi_administratur }}<br/>
                    (Nama jelas, tanda tangan dan stempel perusahaan)
                </td>
            </tr>
        </table>
    </body>
</html>