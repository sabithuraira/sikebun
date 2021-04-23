@extends('layouts.login')

@section('content')
    <div class="col-md-6 card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Register</h4>
            <p class="card-category">Isi Form dibawah untuk mendaftar</p>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" required />
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input type="password" class="form-control" name="password" required  autocomplete="new-password" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Password Konfirmasi</label>
                            <input type="password" class="form-control" name="password_confirmation" required  autocomplete="new-password" />
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary pull-right">Register</button>
                
                <div class="row">
                    <div class="col-md-12">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            Saya sudah pernah melakukan pendaftaran
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
@endsection