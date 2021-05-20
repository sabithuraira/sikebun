@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row d-flex justify-content-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/YSOmcDKHUJ0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            
            <hr/>
            
            <table class="table-border" style="min-width:100%">
                <tr class="bg-info text-center"><td colspan="2"><b>PANDUAN PENGISIAN</b></td></tr>
                <tr>
                    <td>Pedoman Pengisian SKB Triwulanan</td>
                    <td><a href="https://drive.google.com/file/d/1HgcCPtXPStKCo73K3uCj04s3S1PxR7jE/view?usp=sharing">Unduh</a></td>
                </tr>
                <tr>
                    <td>Pedoman Pengisian SKB Tahunan</td>
                    <td><a href="https://drive.google.com/file/d/1ltjQ07uK4GKbIiYswjzmoSLFh8kmTfBx/view?usp=sharing">Unduh</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link href="{{ asset('css') }}/simple_table.css" rel="stylesheet" />
@endsection