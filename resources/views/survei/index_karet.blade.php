@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-danger">
                <h4 class="card-title ">Survey Triwulanan Karet Anda</h4>
                @hasanyrole('operator')
                    <a href="{{ url('survei/karet') }}" class="btn btn-secondary btn-round">Tambah Data</a>
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
                                <td>
                                    {{ $value->listStatus[$value->status_dokumen] }}<br/>
                                    <small><i>(Terakhir diperbaharui {{ date('d M Y h:i', strtotime($value->updated_at)) }})</i></small>
                                </td>
                                <td class="text-center">
                                    @if($value->status_dokumen>=2)
                                        @hasanyrole('admin|approval')
                                        <a href="{{ url('survei/'.$value->id.'/karet') }}" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">search</i>
                                        </a>
                                        @endhasanyrole
                                    @endif
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
