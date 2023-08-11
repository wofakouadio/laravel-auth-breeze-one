<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index(){
        if (Auth::user() && Auth::user()->role_type === 1){
            $users = DB::table('users')->join('roles', 'roles.id', '=', 'users.role_type')->select('users.name as user_name', 'users.email as user_mail', 'roles.name as role')->get();
            return view('super-admin.view-users', [
                'ListUsers' => $users
            ]);
        }
        return redirect('/');
    }

    public function create(){
        if (Auth::user() && Auth::user()->role_type === 1){
            return view('super-admin.new-user', [
                'roles' => Role::all()
            ]);
        }
        return redirect('/');
    }

    public function store(Request $request){
        if(Auth::user() && Auth::user()->role_type === 1){
            $NewUserReg = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:'.User::class,
                'role_type' => 'required'
            ]);
            $NewUserReg['password'] = Hash::make('password');
            User::create($NewUserReg);
            return redirect('/super-admin/new-user');
        }
        return redirect('/');
    }
}
