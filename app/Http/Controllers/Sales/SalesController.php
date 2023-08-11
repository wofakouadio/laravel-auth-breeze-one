<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function index(){
        if(Auth::user() && Auth::user()->role_type === 3){
            return view('sales.dashboard');
        }
        return redirect('/');
    }
}
