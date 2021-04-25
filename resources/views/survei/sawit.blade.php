@extends('layouts.admin')

@section('content')
<table style="min-width:100%">
    <tr>
        <th colspan="4" class='text-center'>
            <p>Logo RI</p>
            <p>SKP21 - KARET</p>
        </th>
    </tr>
    <tr>
        <th colspan="4">
            <p>Logo BPS</p>
            <p>SURVEI PERUSAHAAN PERKEBUNAN KARET TRIWULANAN</p>
            <p>TAHUN 2021</p>
        </th>
    </tr>
    
    <tr>
        <td colspan="4">
            Laporan Harap Dikirim Sebelum Tanggal 10 Pada: Bulan April 2021 (Triwulan I), Juli 2021 (Triwulan II), Oktober 2021 (Triwulan III), Januari 2022 (Triwulan IV)
        </td>
    </tr>
    
    <tr>
        <td colspan="4">
            <p>RAHASIA</p>
            <p>TRIWULAN</p>
        </td>
    </tr>
</table>

<table style="border:1px solid;min-width:100%">
    <tr colspan="4">I. PENGENALAN TEMPAT</tr>
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
        <td colspan="2"><p>Kondisi Perusahaan: Aktif/Tutup Sementara/Non Respon/Tidak Ditemukan *)</p></td>
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
        <td colspan="2">II. KETERANGAN PETUGAS</td>
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



<table style="border:1px solid;min-width:100%">
    <tr colspan="16">III. LUAS TANAMAN, PRODUKSI DAN DISTRIBUSI PRODUKSI</tr>
    <tr><td colspan="16">301. Luas Tanaman dan Produksi</td></tr>
    <tr><td colspan="16">A. Nama Kebun, Luas Tanaman dan Produksi</td></tr>
    <tr>
        <td rowspan="4">Nama Kebun</td>
        <td colspan="5">Bulan</td>
        <td colspan="5">Bulan</td>
        <td colspan="5">Bulan</td>
    </tr>
    <tr>
        <td colspan="4">Luas Tanaman</td>
        <td rowspan="3">Produksi</td>
        <td colspan="4">Luas Tanaman</td>
        <td rowspan="3">Produksi</td>
        <td colspan="4">Luas Tanaman</td>
        <td rowspan="3">Produksi</td>
    </tr>
    
    <tr>
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
    
    <tr>
        <td>TSM</td><td>TSTM</td>
        <td>TSM</td><td>TSTM</td>
        <td>TSM</td><td>TSTM</td>
    </tr>
    
    <tr>
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
</table>
@endsection
