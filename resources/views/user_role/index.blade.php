@extends('layouts.admin')

@section('content')
    <div class="container" id="app">
        <br />
        @if (\Session::has('success'))
            <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Daftar Role</h4>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{url('user_role')}}" method="get">
                            <div class="input-group mb-3">
                                @csrf
                                <input type="text" class="form-control" name="search" id="search" value="{{ $keyword }}" placeholder="Search..">

                                <div class="input-group-append">
                                    <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <section class="datas">
                            @include('user_role.list')
                            
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal hide" id="wait_progres" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center"><img src="{!! asset('lucid/assets/images/loading.gif') !!}" width="200" height="200" alt="Loading..."></div>
                        <h4 class="text-center">Please wait...</h4>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection

@section('css')
    <meta name="_token" content="{{csrf_token()}}" />
    <meta name="csrf-token" content="@csrf">
@endsection

@section('scripts')
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<script>
    var vm = new Vue({  
        el: "#app",
        data:  {
            role_name : '',
            id: 0,
        },
        methods: {
            saveDatas: function () {
                var self = this;
                $('#wait_progres').modal('show');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })
                $.ajax({
                    url : "{{ url('/role/') }}",
                    method : 'post',
                    dataType: 'json',
                    data:{
                        id: self.id,
                        role_name: self.role_name,
                    },
                }).done(function (data) {
                    self.id = 0;
                    self.role_name = '';
                    $('#wait_progres').modal('hide');
                    window.location.reload(false);
                }).fail(function (msg) {
                    console.log(JSON.stringify(msg));
                    $('#wait_progres').modal('hide');
                });
            },
        }
    });
    $(document).ready(function() {
    });
    $('#btn-tambah').click(function(e) {
        e.preventDefault();
        $('#form_modal').modal('show');
        vm.id = 0;
    });
    
    $('#btn-edit').click(function(e) {
        e.preventDefault();
        $('#form_modal').modal('show');
        vm.id = $(this).data("id");
        vm.role_name = $(this).data("name");
    });
    $('#btn-submit').click(function() {
        vm.saveDatas();
    });
</script>
@endsection