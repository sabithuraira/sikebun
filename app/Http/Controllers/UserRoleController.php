<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $datas = User::where('name', 'LIKE', '%' . $keyword . '%')
            ->paginate();

        $datas->withPath('user_role');
        $datas->appends($request->all());
        if ($request->ajax()) {
            return \Response::json(\View::make('user_role.list', array('datas' => $datas))->render());
        }
        return view('user_role.index',compact('datas', 'keyword'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::find($id);
        $all_roles = Role::all();
        $all_permissions = Permission::all();
        return view('user_role.edit',compact('model','id',
            'all_roles', 'all_permissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = User::find($id);

        $model->syncPermissions($request['optpermission']);
        $model->syncRoles($request['optrole']);


        return redirect('user_role');
    }
}