<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Str;
use MongoDB\Driver\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.roles.index',[
            'roles'=>Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>['required']
        ]);
        Role::create([
            'name'=>Str::ucfirst(request('name')),
           'slug'=>Str::of(Str::lower(request('name')))->slug('-'),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit',[
            'role'=>$role,
            'permissions'=>Permission::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role)
    {

        $role->name=Str::ucfirst(request('name'));
        $role->slug=Str::of(request('name'))->slug('-');
        if($role->isDirty('name')){
            session()->flash('role-updated','Role Updated: '.request('name'));
            $role->save();
        }else{
            session()->flash('role-updated','Nothing has been updated here');
        }

        return  back();
    }

    public function attach_permission(Role $role){

        $role->permissions()->attach(request('permission'));
        return back();
    }
    public function detach_permission(Role $role){
        $role->permissions()->detach('permission');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('role-deleted','Deleted Role '.$role->name);
        return back();

    }
}
