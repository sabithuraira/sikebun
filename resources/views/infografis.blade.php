@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            &nbsp;&nbsp;
            <br/><br/>
            <div class="row d-flex justify-content-center">
                <img src="{{ asset('img/infografis1.jpg') }}" width="400">
                <img src="{{ asset('img/infografis2.jpg') }}" width="400">
                <img src="{{ asset('img/infografis3.jpg') }}" width="400">
                <img src="{{ asset('img/infografis4.jpg') }}" width="400">
                <img src="{{ asset('img/infografis5.jpg') }}" width="400">
                <img src="{{ asset('img/infografis6.jpg') }}" width="400">
            </div>
            <hr/>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link href="{{ asset('css') }}/simple_table.css" rel="stylesheet" />
@endsection