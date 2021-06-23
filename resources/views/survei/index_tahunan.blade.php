@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title ">Survey Tahunan Anda</h4>
                @hasanyrole('operator')
                    <a href="{{ url('survei/tahunan') }}" class="btn btn-secondary btn-round">Tambah Data</a>
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
                                <td>
                                    @hasanyrole('pemeriksa')
                                        <p>{{ $value->company->nama_perusahaan }}</p>
                                    @endhasanyrole
                                    Tahun: {{ $value->tahun }}
                                </td>
                                <td>
                                    {{ $value->listStatus[$value->status_dokumen] }}<br/>
                                    <small><i>(Terakhir diperbaharui {{ date('d M Y h:i', strtotime($value->updated_at)) }})</i></small>
                                </td>
                                <td class="text-center">
                                    @if($value->status_dokumen>=3)
                                        @hasanyrole('admin|approval|pemeriksa')
                                        <a href="{{ url('survei/'.$value->id.'/tahunan_print') }}" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">print</i>
                                        </a>
                                        @endhasanyrole
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($value->status_dokumen>=3 && $value->status_dokumen<=6)
                                        @hasanyrole('admin|approval|pemeriksa')
                                        <a href="{{ url('survei/'.$value->id.'/tahunan') }}" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">search</i>
                                        </a>
                                        @endhasanyrole
                                    @endif
                                    
                                    @hasanyrole('operator')
                                    <a href="{{ url('survei/'.$value->id.'/watch_tahunan') }}" class="btn btn-primary btn-link btn-sm">
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