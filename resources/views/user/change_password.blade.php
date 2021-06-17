@extends('layouts.admin')

@section('content')
    <div class="col-md-12 card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Ubah Password</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('user/change_password') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Password Saat Ini</label>
                            <input type="password" class="form-control" name="current_password" required/>
                            @foreach ($errors->get('current_password') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input type="password" class="form-control" name="password" required />
                            @foreach ($errors->get('password') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Password Konfirmasi</label>
                            <input type="password" class="form-control" name="password_confirmation" required />
                            @foreach ($errors->get('password_confirmation') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary pull-right">Register</button>
            </form>
        </div>
    </div>
@endsection