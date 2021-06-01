@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row d-flex justify-content-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/YSOmcDKHUJ0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            
            <hr/><br/>
            
            <div class="row d-flex justify-content-center">
                <img src="{{ asset('img/infografis1.jpg') }}" width="400">
                <img src="{{ asset('img/infografis2.jpg') }}" width="400">
                <img src="{{ asset('img/infografis3.jpg') }}" width="400">
                <img src="{{ asset('img/infografis4.jpg') }}" width="400">
                <img src="{{ asset('img/infografis5.jpg') }}" width="400">
                <img src="{{ asset('img/infografis6.jpg') }}" width="400">
            </div>
            
            <hr/>
            
            <table class="table-border" style="min-width:100%">
                <tr class="bg-info text-center"><td colspan="2"><b>DOKUMEN</b></td></tr>
                <tr>
                    <td>Surat Edaran BUPATI MUSI BANYUASIN TENTANG DUKUNGAN SIKEBUN</td>
                    <td><a target="_blank" href="https://drive.google.com/file/d/1ufsARiqdjEEnYeuRhB3tOPc0O7n733Qk/view?usp=sharing">Unduh</a></td>
                </tr>
                <tr>
                    <td>Surat Edaran BUPATI MUSI BANYUASIN TENTANG DUKUNGAN DUKUNGAN SURVEI PERUSAHAAN PERKEBUNAN</td>
                    <td><a target="_blank" href="https://drive.google.com/file/d/1LDBPqxYkPhczFzKWlukWsWAgr_4ot0yO/view?usp=sharing">Unduh</a></td>
                </tr>
                <tr>
                    <td>Perjanjian Kerja Sama BPS dengan GAPKI Tentang Penyediaan, Pemanfaatan dan Pengembangan Data/Informasi Statistik Kelapa Sawit</td>
                    <td><a target="_blank" href="https://drive.google.com/file/d/1IPXh7eUPl49Vmfvfp2ZOpZDSkHglU9JI/view?usp=sharing">Unduh</a></td>
                </tr>
                <tr>
                    <td>Nota Kesapahaman BPS dan GAPKI Tentang Penyediaan, Pemanfaatan dan Pengembangan Data/Informasi Statistik Kelapa Sawit</td>
                    <td><a target="_blank" href="https://drive.google.com/file/d/1XL4Z0F8yKkgLDKa3VdaURcvECsYjcMlq/view?usp=sharing">Unduh</a></td>
                </tr>
                <tr>
                    <td>Pedoman Pengisian SKB Triwulanan</td>
                    <td><a target="_blank" href="https://drive.google.com/file/d/1HgcCPtXPStKCo73K3uCj04s3S1PxR7jE/view?usp=sharing">Unduh</a></td>
                </tr>
                <tr>
                    <td>Pedoman Pengisian SKB Tahunan</td>
                    <td><a target="_blank" href="https://drive.google.com/file/d/1ltjQ07uK4GKbIiYswjzmoSLFh8kmTfBx/view?usp=sharing">Unduh</a></td>
                </tr>
            </table>
            
            <hr/>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link href="{{ asset('css') }}/simple_table.css" rel="stylesheet" />
@endsection