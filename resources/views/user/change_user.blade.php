@extends('layouts.admin')

@section('content')
    <div class="col-md-12 card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Perbaharui User</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('user/'.$id.'/change_user/') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $model->name }}" required autofocus autocomplete="name" />
                            @foreach ($errors->get('name') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Perusahaan</label>
                            <select required class="form form-control" name="company_id" >
                                <option value="">- PILIH PERUSAHAAN -</option>
                                @foreach($list_perusahaan as $key=>$value)
                                    <option value="{{ $value->id }}" @if($model->company_id==$value->id) selected="selected" @endif >{{ $value->nama_perusahaan }}</option>
                                @endforeach
                            </select>
                            @foreach ($errors->get('company_id') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                            @endforeach
                        </div>
                    </div> 
                </div>
                
                <button type="submit" class="btn btn-primary pull-right">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection