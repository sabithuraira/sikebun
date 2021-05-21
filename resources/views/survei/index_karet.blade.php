@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-danger">
                <h4 class="card-title ">Survey Triwulanan Karet Anda</h4>
                <a href="{{ url('survey/sawit') }}" class="btn btn-secondary btn-round">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class=" text-primary">
                        <th>No</th>
                        <th>Periode</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($datas as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>Triwulan: {{ $value->triwulan }} Tahun: {{ $value->tahun }}</td>
                                <td>--</td>
                                <td class="text-center">
                                    <a href="{{ url('survei/'.$value->id.'/sawit') }}" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">search</i>
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
