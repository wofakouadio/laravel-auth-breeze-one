<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(){
        if(Auth::user() && Auth::user()->role_type === 5){
            return view('customer.dashboard');
        }
        return redirect('/');
    }
}
