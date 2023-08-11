<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function index(){
        if(Auth::user() && Auth::user()->role_type === 4){
            return view('vendor.dashboard');
        }
        return redirect('/');
    }
}
