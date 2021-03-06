@extends('layouts.admin')

@section('content')
<div class="row clearfix" id="app">
  <div class="col-md-12">
      <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">User Detail Role & Permission</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ url('user_role/'.$id) }}" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                
                <fieldset disabled>
                    <div class="form-group">
                        <label>Nama :</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $model->name) }}">
                    </div>

                    <div class="form-group">
                        <label>Username :</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email', $model->email) }}">
                    </div>
                </fieldset>

                <div class="form-group">
                    <label>Roles:</label>

                    <select id="optrole" name="optrole[]" class="ms" multiple="multiple">
                        @foreach($all_roles as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Simpan</button>

              </form>
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
    <link rel="stylesheet" href="{!! asset('material/assets/js/multi-select/css/multi-select.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('material/assets/js/multi-select/js/jquery.multi-select.js') !!}"></script>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<script>
    var vm = new Vue({  
        el: "#app",
        data:  {
            list_roles: {!! json_encode($model->roles) !!},
            list_permissions: {!! json_encode($model->permissions) !!},
        },
        methods: {
            getDatas: function(){
                var self = this;
                $('#wait_progres').modal('show');
                var roles_val =[];
                var permissions_val =[];
                for(i=0;i<self.list_roles.length;++i){
                    roles_val.push(self.list_roles[i].id);
                }
                for(i=0;i<self.list_permissions.length;++i){
                    permissions_val.push(self.list_permissions[i].id);
                }
                $("#optrole").val(roles_val);
                $("#optrole").multiSelect("refresh");
                
                $("#optpermission").val(permissions_val);
                $("#optpermission").multiSelect("refresh");
                $('#wait_progres').modal('hide');
            },
        }
    });
    $(document).ready(function() {
        vm.getDatas();
    });
    //I use multiselect plugin here
    // // //Multi-select
    $('#optrole').multiSelect();
    $('#optpermission').multiSelect();
</script>
@endsection