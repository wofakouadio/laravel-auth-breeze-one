<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function __construct(){
        if(Auth::user()){
            return $this->UserRedirection();
        }
        return redirect('/');
    }
    public function create(){
        if(Auth::user()){
            return $this->UserRedirection();
        }
        return view('login',
        ['title' => 'Login']);
    }

    public function UserRedirection(){
        if(Auth::user() && Auth::user()->role_type === 1){
            return redirect('/super-admin/dashboard');
        }elseif(Auth::user() && Auth::user()->role_type === 2){
            return redirect('/admin/dashboard');
        }elseif(Auth::user() && Auth::user()->role_type === 3){
            return redirect('/sales/dashboard');
        }elseif(Auth::user() && Auth::user()->role_type === 4){
            return redirect('/vendor/dashboard');
        }elseif(Auth::user() && Auth::user()->role_type === 5){
            return redirect('/customer/dashboard');
        }else{
            return redirect('/');
        }
    }

    public function store(Request $request){
        $LoginForm = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($LoginForm)){
            $request->session()->regenerate();
            return $this->UserRedirection();
        }
        else{
            return back()->withErrors(['error', 'Invalid Credentials'])->withInput(['password', 'Invalid credentials']);
        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
