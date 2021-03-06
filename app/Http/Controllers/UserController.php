<?php

namespace App\Http\Controllers;

use App\User;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Role;

class UserController extends Controller
{
    public function index(){

        $users = User::all();

        //return response()->json(['users'=>$users]);
       return view('admin.users.index', ['users'=>$users]);

    }
    public function show(User $user){
        return view('admin.users.profile', [
            'user'=>$user,
            'roles'=>Role::all(),

            ]);
        //return response()->json(['user'=>$user,'roles'=>Role::all()]);
    }
    public function update(User $user){


        $inputs = request()->validate([

            'username'=> ['required', 'string', 'max:255','alpha_dash'],
            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'email', 'max:255'],


        ]);



        $user->update($inputs);
        session()->flash('user-updated','User has been updated');

        return redirect()->route('users.index');
    }
    public function destroy(User $user){
        $user->delete();
        session()->flash('user-deleted','User has been deleted');
        return back();
    }
    public function attach(User $user){
        $user->roles()->attach(request('role'));
        return back();

    }
    public function detach(User $user){
        $user->roles()->detach(request('role'));
        return back();

    }
}
