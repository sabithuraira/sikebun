@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Daftar User</h4>
                <a href="{{ url('user/create') }}" class="btn btn-secondary btn-round">Tambah User</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class=" text-primary">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Perusahaan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($datas as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    @if($value->company_id!=null)
                                        {{ $value->company->nama_perusahaan }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('user/'.Crypt::encrypt($value->id).'/change_user') }}" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {{ $datas->links() }} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
