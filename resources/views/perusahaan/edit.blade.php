@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <form method="post" action="{{ url('perusahaan/'.$model->id) }}" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        @include('perusahaan._form')
        </form>
    </div>
</div>
@endsection