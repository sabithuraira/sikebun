@extends('layouts.login')

@section('content')

    <div class="col-md-6 card">
        <div class="card-header">
            <div class="row align-bottom">
                <div class="col-md-6"><img src="{{ asset('img/logo_sikebun.png') }}" width="150px" /></div>
            </div>
        </div>
        <div class="card-header card-header-primary">
            <h4 class="card-title">Login</h4>
            <p class="card-category">Selamat datang, silahkan masukkan akun anda</p>
        </div>
        <div class="card-body">
            
            @if(session('status'))
                <div class="text-sm text-green">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Username</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input class="form-control" type="password" name="password" required autocomplete="current-password">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Remember Password &nbsp;&nbsp;</label>
                            <input type="checkbox" name="remember">
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary pull-right">Login</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
@endsection