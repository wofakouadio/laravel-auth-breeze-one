<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function index(){
        if(Auth::user() && Auth::user()->role_type === 1){
            return view('super-admin.dashboard');
        }
           return redirect('/');
    }
}
