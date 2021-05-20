@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <form method="post" action="{{ url('perusahaan') }}" enctype="multipart/form-data">
        @csrf
        @include('perusahaan._form')
        </form>
    </div>
</div>
@endsection