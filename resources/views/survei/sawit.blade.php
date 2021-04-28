@extends('layouts.admin')

@section('css')
    <link href="{{ asset('css') }}/simple_table.css" rel="stylesheet" />
@endsection

@section('content')
<div class="card">
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
            <td colspan="2" class="text-right">TRIWULAN</td>
        </tr>
    </table>

    <table class="table-border" style="min-width:100%">
        <tr class="bg-danger text-center"><td colspan="4"><b>I. PENGENALAN TEMPAT</b></td></tr>
        <tr>
            <td>101. Nama Perusahaan/Kantor Administratur</td>
            <td><input type="text" name="nama_perusahaan"></td>
            <td>103. Nama Group Perusahaan</td>
            <td><input type="text" name="nama_group_perusahaan"></td>
        </tr>
        
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;a. Alamat Lengkap Administratur Kebun:</td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;a. Alamat Lengkap Group Perusahaan:</td>
        </tr>
        
        <tr>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Kode Pos: <input type="text" name="kode_pos_perusahaan">
                &nbsp;&nbsp;&nbsp; Telepon: <input type="text" name="telepon_perusahaan">
            </td>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Kode Pos: <input type="text" name="kode_pos_induk_perusahaan">
                &nbsp;&nbsp;&nbsp; Telepon: <input type="text" name="telepon_induk_perusahaan">
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Email: <input type="text" name="email_perusahaan">
                &nbsp;&nbsp;&nbsp; Fax: <input type="text" name="fax_perusahaan">
            </td>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Email: <input type="text" name="email_induk_perusahaan">
                &nbsp;&nbsp;&nbsp; Fax: <input type="text" name="fax_induk_perusahaan">
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; b. Provinsi</td>
            <td><input type="text" name="kode_prov_perusahaan"></td>
            <td>&nbsp;&nbsp;&nbsp; b. Provinsi</td>
            <td><input type="text" name="kode_prov_induk_perusahaan"></td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
            <td><input type="text" name="kode_kab_perusahaan"></td>
            <td>&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
            <td><input type="text" name="kode_kab_induk_perusahaan"></td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; d. Kecamatan</td>
            <td><input type="text" name="kode_kec_perusahaan"></td>
            <td>104. Status permodalan/pemilikan *)</td>
            <td><input type="text" name="status_permodalan"></td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; e. Desa/Kelurahan *)</td>
            <td><input type="text" name="kode_desa_perusahaan"></td>
            <td>105. Bentuk Badan Hukum</td>
            <td><input type="text" name="bentuk_badan_hukum"></td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; f. Nama Contact Person</td>
            <td><input type="text" name="nama_contact_person"></td>
            <td>106. Apakah Sebagai Pelaksana Kemitraan</td>
            <td><input type="text" name="apakah_pelaksana_kemitraan"></td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; g. Nomor HP/Telp.</td>
            <td><input type="text" name="hp_contact_person"></td>
            <td>107. Apakah mempunyai Kebun Plasma yang belum dikonversi</td>
            <td><input type="text" name="punya_kebun_plasma"></td>
        </tr>
        
        <tr>
            <td colspan="2"><b>Kondisi Perusahaan: Aktif/Tutup Sementara/Non Respon/Tidak Ditemukan *)</b></td>
            <td>108. Apakah mempunyai unit pengolahan produksi</td>
            <td><input type="text" name="punya_unit_pengolahan"></td>
        </tr>
        
        <tr>
            <td>102. Nama Kantor Pusat</td>
            <td></td>
            <td>109. Tahun Berdiri/Operasional Perusahaan</td>
            <td></td>
        </tr>
        
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp; a. Alamat Lengkap Pusat</td>
            <td colspan="2" class="text-center bg-danger"><b>II. KETERANGAN PETUGAS</b></td>
        </tr>
        
        <tr>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Kode Pos: <input type="text" name="kode_pos_kantor_pusat">
                Telepon: <input type="text" name="telp_kantor_pusat">
            </td>
            <td colspan="3" rowspan="4">
                <table style="min-width:100%">
                    <tr>
                        <td>Uraian</td><td>Pencacah</td><td>Pemeriksa</td>
                    </tr>
                    <tr>
                        <td>201. Nama</td>
                        <td><input type="text" name="pencacah_nama" /></td>
                        <td><input type="text" name="pemeriksa_nama" /></td>
                    </tr>
                    <tr>
                        <td>202. Tanggal</td>
                        <td><input type="text" name="pencacah_tanggal" /></td>
                        <td><input type="text" name="pemeriksa_tanggal" /></td>
                    </tr>
                    <tr>
                        <td>203. Tanda Tangan</td>
                        <td><input type="text" name="pencacah_ttd" /></td>
                        <td><input type="text" name="pemeriksa_ttd" /></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                &nbsp;&nbsp;&nbsp; Email: <input type="text" name="email_kantor_pusat">
                Fax: <input type="text" name="fax_kantor_pusat">
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; b. Provinsi</td>
            <td><input type="text" name="kode_prov_kantor_pusat"></td>
        </tr>
        
        <tr>
            <td>&nbsp;&nbsp;&nbsp; c. Kabupaten/Kota *)</td>
            <td><input type="text" name="kode_kab_kantor_pusat"></td>
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
        <tr>
            <td>B. Kode Bentuk Produksi</td>
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
        <tr>
            <td colspan="5">    C. Rendemen dari LATEKS menjadi bentuk produksi pada Rincian B kolom (6), (11), (16)</td>
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
            <td colspan="5"><input type="text"></td>
            <td colspan="5"><input type="text"></td>
            <td colspan="5"><input type="text"></td>
        </tr>
        
        <tr>
            <td>b. 	Dijual ke pihak lain</td>
            <td colspan="5"><input type="text"></td>
            <td colspan="5"><input type="text"></td>
            <td colspan="5"><input type="text"></td>
        </tr>
        
        <tr>
            <td>c. 	Rusak/susut/hilang</td>
            <td colspan="5"><input type="text"></td>
            <td colspan="5"><input type="text"></td>
            <td colspan="5"><input type="text"></td>
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
            <td colspan="9">Catatan</td>
            <td colspan="7">
                Diisi Dengan Sebenarnya<br/>
                ........................, .............. <br/>
                Administratur/Pengurus <br/><br/><br/><br/>
                .........................<br/>
                (Nama jelas, tanda tangan dan stempel perusahaan)
            </td>
        </tr>
    </table>
</div>
@endsection
