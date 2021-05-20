@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Daftar Perusahaan</h4>
                <a href="{{ url('perusahaan/create') }}" class="btn btn-secondary btn-round">Tambah Perusahaan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class=" text-primary">
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($datas as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->nama_perusahaan }}</td>
                                <td>{{ $value->alamat_perusahaan }}</td>
                                <td class="text-center">
                                    <a href="{{ url('perusahaan/'.$value->id.'/edit') }}" class="btn btn-primary btn-link btn-sm">
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
