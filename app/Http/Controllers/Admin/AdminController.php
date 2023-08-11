<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::user() && Auth::user()->role_type === 2){
            return view('admin.dashboard');
        }
        return redirect('/');
    }
}
