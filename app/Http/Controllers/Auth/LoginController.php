<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('pages.auth.login');
    }

    public function login(LoginRequest $request){
        $user = User::with('role')->where('email', $request->email)->first();
        if(!$user){
            return back()->with('errorMessage', 'We dont recognize your email. Try again!');
        }else{
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('user', $user);
                return redirect()->route('home');
            }else{
                return back()->with('errorMessage', 'Your password is wrong. Try again!');
            }
        }
    }

    public function logout(){
        if(session()->has('user')){
            session()->pull('user');
            return redirect('/');
        }
    }
}
