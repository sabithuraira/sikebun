@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title ">Survey Triwulanan Sawit Anda</h4>
                @hasanyrole('operator')
                    <a href="{{ url('survei/sawit') }}" class="btn btn-secondary btn-round">Tambah Data</a>
                @endhasanyrole
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class=" text-primary">
                        <th>No</th>
                        <th>Periode</th>
                        <th>Status</th>
                        <th colspan="2" class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($datas as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>Triwulan: {{ $value->triwulan }} Tahun: {{ $value->tahun }}</td>
                                <td>{{ $value->listStatus[$value->status_dokumen] }}</td>
                                <td class="text-center">
                                    <a href="{{ url('survei/'.$value->id.'/sawit_print') }}" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">search</i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    @hasanyrole('admin|approval')
                                    <a href="{{ url('survei/'.$value->id.'/sawit') }}" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">search</i>
                                    </a>
                                    @endhasanyrole
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
