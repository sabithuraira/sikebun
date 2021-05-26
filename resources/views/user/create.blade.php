@extends('layouts.admin')

@section('content')
    <div class="col-md-12 card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Tambah User Baru</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('user') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                            @foreach ($errors->get('name') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Username</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" required />
                            @foreach ($errors->get('email') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input type="password" class="form-control" name="password" required  autocomplete="new-password" />
                            @foreach ($errors->get('password') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Password Konfirmasi</label>
                            <input type="password" class="form-control" name="password_confirmation" required  autocomplete="new-password" />
                            @foreach ($errors->get('password_confirmation') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Perusahaan</label>
                            <select required class="form form-control" name="company_id" value="{{ old('company_id') }}" >
                                <option value="">- PILIH PERUSAHAAN -</option>
                                @foreach($list_perusahaan as $key=>$value)
                                    <option value="{{ $value->id }}">{{ $value->nama_perusahaan }}</option>
                                @endforeach
                            </select>
                            @foreach ($errors->get('company_id') as $msg)
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