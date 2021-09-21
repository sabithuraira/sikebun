@extends('layouts.admin')

@section('content')

<div class="content">


    <div class="modal hide fade" id="pesan" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center"><img src="{!! asset('img/popup_login.png') !!}" width="100%"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            &nbsp;&nbsp;
            <br/><br/>
            <div class="row d-flex justify-content-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/dBG-Va_SQWw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <hr/>
            <div class="row d-flex justify-content-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/rC6iHlYeghs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <hr/>
            <div class="row d-flex justify-content-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/BASOy_btGTM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <hr/><br/>
            
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
                    <td>Pedoman Survei Perusahaan Perkebunan</td>
                    <td><a target="_blank" href="https://drive.google.com/file/d/1UHcEaIAACYP_cBVbKsOms2p6EPbSCvzQ/view?usp=sharing">Unduh</a></td>
                </tr>

                <tr>
                    <td>Pedoman Pengisian SKB Triwulanan</td>
                    <td><a target="_blank" href="https://drive.google.com/file/d/1zVklxGScU6nQEOFX9S6hPtaogpaZbRWo/view?usp=sharing">Unduh</a></td>
                </tr>
                <tr>
                    <td>Pedoman Pengisian SKB Tahunan</td>
                    <td><a target="_blank" href="https://drive.google.com/file/d/1EUmGUJB36sAfA0sd8Yp4whII0YL3BNj-/view?usp=sharing">Unduh</a></td>
                </tr>
                
                <tr>
                    <td>Pedoman Penggunaan Website</td>
                    <td><a target="_blank" href="https://drive.google.com/file/d/1OB8rYLX7b0wPJkRCS1vZOZDm22kUHHSr/view?usp=sharing">Unduh</a></td>
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


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#pesan').modal('show');
        });
    </script>
@endsection